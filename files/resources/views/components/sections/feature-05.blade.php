@props([
    'eyebrow' => 'Month-end close',
    'heading' => 'Close the books by the third',
    'intro' => 'Hearth pulls every receipt, matches it to the bank feed, and writes the audit trail as you go — so the close is a report, not a hunt.',
    'tabs' => [
        (object) ['title' => 'Report', 'description' => 'The profit and loss updates as receipts are matched. What you see on the 3rd is what the accountant gets.', 'image' => '/images/blocks/dashboard-report.jpg', 'imageAlt' => 'The September profit and loss, 94% matched'],
        (object) ['title' => 'Inbox', 'description' => 'Receipts arrive by email, photo, or card feed and wait in one queue, each with a suggested category.', 'image' => '/images/blocks/dashboard-receipts.jpg', 'imageAlt' => 'The receipts queue: five waiting, each with a suggested category'],
        (object) ['title' => 'Audit log', 'description' => 'Every match, split, and override is stamped with who, when, and why — and exports in one file for the auditor.', 'image' => '/images/blocks/dashboard-audit.jpg', 'imageAlt' => 'The September audit log, one stamped line per change'],
    ],
])
<!--
    Tabbed previews: a centred opener, then a row of pill tabs; each tab's panel holds a line of copy and a product
    screenshot framed as a window on a raised stage. Tabs are one repeater in the yml (each row is its tab, its
    copy and its image — 16:9 works best). Arrow keys move between tabs; panels cross-fade in 150ms. Clear the
    eyebrow to hide it.
-->
@php $uid = 'f5-' . uniqid(); @endphp
<section class="px-6 py-16 sm:py-28" data-feature-05>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h2 class="reveal-1 mx-auto mt-4 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-2 mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        </div>

        <div class="reveal-3 mt-12 flex flex-wrap justify-center gap-2 sm:mt-14" role="tablist" aria-label="{{ $heading }}" data-reveal>
            @foreach ($tabs as $tab)
            <button type="button" role="tab" id="{{ $uid }}-tab-{{ $loop->index }}" aria-controls="{{ $uid }}-panel-{{ $loop->index }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}" class="order-1 inline-flex min-h-11 items-center justify-center rounded-full border border-line bg-panel px-4 py-2 text-[14px] font-medium text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink aria-selected:border-ink aria-selected:bg-ink aria-selected:text-canvas" data-tab>{{ $tab->title }}</button>
            <div role="tabpanel" id="{{ $uid }}-panel-{{ $loop->index }}" aria-labelledby="{{ $uid }}-tab-{{ $loop->index }}" tabindex="0" class="order-2 mt-6 w-full basis-full sm:mt-8" data-panel {{ $loop->first ? '' : 'hidden' }}>
                <p class="mx-auto max-w-[50ch] text-center text-[15px]/6 text-pretty text-muted">{{ $tab->description }}</p>
                <div class="mx-auto mt-8 max-w-4xl rounded-3xl bg-raised p-1 sm:p-2">
                    <div class="overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5">
                        <img src="{{ $tab->image }}" alt="{{ $tab->imageAlt }}" width="1600" height="900" class="block h-auto w-full" loading="lazy">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    /* Panels cross-fade in 150ms; a hidden panel is out of the tab order and out of flow. */
    [data-feature-05] [data-panel] { opacity: 0; transition: opacity .15s ease; }
    [data-feature-05] [data-panel].is-active { opacity: 1; }
    [data-feature-05] [data-panel][hidden] { display: none; }
    html:not(.js) [data-feature-05] [data-panel] { opacity: 1; }
    @media (prefers-reduced-motion: reduce) {
        [data-feature-05] [data-panel] { transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-feature-05]:not([data-feature-05-ready])').forEach(function (root) {
        root.setAttribute('data-feature-05-ready', '');
        var tabs = Array.prototype.slice.call(root.querySelectorAll('[data-tab]'));
        var panels = Array.prototype.slice.call(root.querySelectorAll('[data-panel]'));
        if (!tabs.length) return;
        function show(i, focus) {
            tabs.forEach(function (tab, n) {
                var on = n === i;
                tab.setAttribute('aria-selected', on ? 'true' : 'false');
                tab.setAttribute('tabindex', on ? '0' : '-1');
                if (!panels[n]) return;
                if (on) {
                    panels[n].hidden = false;
                    requestAnimationFrame(function () { panels[n].classList.add('is-active'); });
                } else {
                    panels[n].classList.remove('is-active');
                    panels[n].hidden = true;
                }
            });
            if (focus) tabs[i].focus();
        }
        tabs.forEach(function (tab, i) {
            tab.addEventListener('click', function () { show(i, false); });
            tab.addEventListener('keydown', function (e) {
                var next = e.key === 'ArrowRight' ? i + 1 : e.key === 'ArrowLeft' ? i - 1 : e.key === 'Home' ? 0 : e.key === 'End' ? tabs.length - 1 : null;
                if (next === null) return;
                e.preventDefault();
                show((next + tabs.length) % tabs.length, true);
            });
        });
        show(Math.max(0, tabs.findIndex(function (t) { return t.getAttribute('aria-selected') === 'true'; })), false);
    });
})();
</script>
