@props([
    'brand' => 'Brindle',
    'links' => [
        (object) ['text' => 'Platform', 'url' => '#', 'children' => [
            (object) ['text' => 'Scheduling', 'url' => '/platform/scheduling', 'description' => 'Build the week in minutes, publish once', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>'],
            (object) ['text' => 'Time clock', 'url' => '/platform/time-clock', 'description' => 'Punch in from any phone, geofenced', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>'],
            (object) ['text' => 'Shift swaps', 'url' => '/platform/swaps', 'description' => 'Staff trade, managers approve in one tap', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>'],
            (object) ['text' => 'Payroll sync', 'url' => '/platform/payroll', 'description' => 'Approved hours flow to payroll nightly', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375C2.25 4.9 2.9 4.25 3.75 4.25h16.5c.83 0 1.5.65 1.5 1.375V6m-19.5 0h19.5m0 0v9a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V6m9 4.5a2.25 2.25 0 1 1 0 4.5 2.25 2.25 0 0 1 0-4.5Z"/></svg>'],
            (object) ['text' => 'Compliance', 'url' => '/platform/compliance', 'description' => 'Break and overtime rules, by state', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 12 12 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286Z"/></svg>'],
            (object) ['text' => 'Reports', 'url' => '/platform/reports', 'description' => 'Labor cost against sales, by the hour', 'icon' => '<svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>'],
        ]],
        (object) ['text' => 'Pricing', 'url' => '/pricing'],
        (object) ['text' => 'Customers', 'url' => '/customers'],
        (object) ['text' => 'Company', 'url' => '/about'],
    ],
    'latestLabel' => 'Latest',
    'latestImage' => '/images/blocks/cover-03.jpg',
    'latestTitle' => 'Brindle 3.1: shift swaps from the phone',
    'latestLinkText' => 'Read the release notes',
    'latestLinkUrl' => '/changelog',
    'showLatest' => '1',
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Book a demo',
    'ctaLink' => '/contact',
])
<!--
    Header — the mega panel: brand, then the links beside it, Log in and one compact action on
    the right. Links come from site.nav_links; a link with children opens a wide panel of rows in
    two columns (icon tile, title, description) with a "latest" card on the right (image, title,
    link — the Latest fields; switch it off with the toggle). Opens on hover intent, toggles on
    tap, closes on Escape or an outside click; the caret turns while it is open. On phones the
    links move into a sheet under the bar. Clear Log in or the button text to hide either.
-->
<header data-navbar-03 class="sticky top-0 z-50">
    <div class="relative border-b border-line bg-canvas/85 backdrop-blur-md">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center gap-8 px-6">

            <div class="flex items-center" data-reveal>
                <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path d="M3 4h12v4.5H3zM9 9.75h12v4.5H9zM3 15.5h12V20H3z"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
            </div>

            <nav class="flex-1 max-lg:hidden" aria-label="Main" data-reveal>
                <ul role="list" class="flex items-center gap-1 text-[15px] font-medium text-lede">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="relative" data-nav-item>
                        <button type="button" data-nav-trigger aria-expanded="false" class="flex cursor-pointer items-center gap-1 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-expanded:text-ink">
                            {{ $link->text }}
                            <svg viewBox="0 0 20 20" class="nav-caret size-3.5 fill-current text-faint" aria-hidden="true"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                        </button>
                        <!-- The panel's rows line up with the trigger's text; its bar-to-panel gap is padding so the pointer never crosses dead space. -->
                        <div data-nav-panel class="absolute top-full left-0 -ml-1.5 w-[42rem] pt-5">
                            <div class="flex overflow-hidden rounded-2xl border border-line bg-panel shadow-xl shadow-black/5">
                                <div class="grid flex-1 grid-cols-2 gap-1 p-2">
                                    @foreach ($link->children as $child)
                                    <a href="{{ $child->url }}" class="group flex gap-3 rounded-xl p-2.5 transition-colors duration-150 hover:bg-raised">
                                        <span class="flex size-9 shrink-0 items-center justify-center rounded-lg border border-line bg-panel text-lede">
                                            @if ($child->icon ?? false)
                                            {!! $child->icon !!}
                                            @else
                                            <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.456-2.456L14.25 6l1.035-.259a3.375 3.375 0 0 0 2.456-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z"/></svg>
                                            @endif
                                        </span>
                                        <span class="flex min-w-0 flex-col pt-0.5">
                                            <span class="text-[14px] font-medium text-ink">{{ $child->text }}</span>
                                            @if ($child->description ?? false)
                                            <span class="mt-0.5 text-[13px] leading-snug font-normal text-muted">{{ $child->description }}</span>
                                            @endif
                                        </span>
                                    </a>
                                    @endforeach
                                </div>
                                @if ($showLatest)
                                <aside class="flex w-[13rem] shrink-0 flex-col border-l border-line bg-raised/70 p-4">
                                    <div class="aspect-[16/10] overflow-hidden rounded-lg bg-raised">
                                        <img src="{{ $latestImage }}" alt="" width="320" height="200" class="size-full object-cover" loading="lazy">
                                    </div>
                                    <p class="mt-3 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $latestLabel }}</p>
                                    <p class="mt-1.5 text-[14px]/5 font-medium text-pretty text-ink">{{ $latestTitle }}</p>
                                    <a href="{{ $latestLinkUrl }}" class="arrow-link mt-auto inline-flex items-center gap-1.5 pt-3 text-[13px] font-medium text-ink">
                                        {{ $latestLinkText }}
                                        <svg viewBox="0 0 24 24" class="arrow size-3.5 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </a>
                                </aside>
                                @endif
                            </div>
                        </div>
                    </li>
                    @else
                    <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-[current]:text-ink">{{ $link->text }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </nav>

            <div class="flex items-center justify-end gap-2.5 max-lg:ml-auto" data-reveal>
                @if ($signInText)
                <a href="{{ $signInLink }}" class="rounded-xl px-4 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:text-ink max-lg:hidden">{{ $signInText }}</a>
                @endif
                @if ($ctaText)
                <a href="{{ $ctaLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] max-lg:hidden">{{ $ctaText }}</a>
                @endif
                <!-- The toggle is a 44px box; the two glyphs are stacked and cross-fade. -->
                <button type="button" data-nav-toggle aria-expanded="false" aria-label="Toggle menu" class="grid size-11 cursor-pointer place-items-center rounded-lg text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-menu size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-close size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- The sheet hangs under the bar and scrolls inside itself; a link with children flattens into a label and its rows. -->
        <div data-nav-sheet class="absolute inset-x-0 top-full max-h-[calc(100dvh-4rem)] overflow-y-auto border-b border-line bg-canvas lg:hidden">
            <nav class="mx-auto w-full max-w-6xl px-6 py-4" aria-label="Mobile">
                <ul role="list" class="flex flex-col gap-0.5 text-base font-medium">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="px-3 pt-4 pb-1.5 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $link->text }}</li>
                    @foreach ($link->children as $child)
                    <li><a href="{{ $child->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $child->text }}</a></li>
                    @endforeach
                    @else
                    <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $link->text }}</a></li>
                    @endif
                    @endforeach
                </ul>
                <div class="mt-4 flex flex-col gap-2 border-t border-line pt-4">
                    @if ($signInText)
                    <a href="{{ $signInLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-line bg-panel px-4 py-3 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $signInText }}</a>
                    @endif
                    @if ($ctaText)
                    <a href="{{ $ctaLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-ink px-4 py-3 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:opacity-90 active:scale-[.98]">{{ $ctaText }}</a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>
<style>
/* The panel: in the DOM at full size, faded and moved 3px above its place so it settles down out of the bar. Exits are faster. */
[data-navbar-03] [data-nav-panel] { opacity: 0; translate: 0 -3px; scale: .98; visibility: hidden; transform-origin: top left; transition: opacity .18s ease-in, translate .18s ease-in, scale .18s ease-in, visibility 0s linear .18s; }
[data-navbar-03] [data-nav-trigger][aria-expanded="true"] + [data-nav-panel] { opacity: 1; translate: 0 0; scale: 1; visibility: visible; transition: opacity .24s var(--ease-out-quart), translate .24s var(--ease-out-quart), scale .24s var(--ease-out-quart), visibility 0s; }
[data-navbar-03] .nav-caret { transition: rotate .25s var(--ease-out-quart); }
[data-navbar-03] [aria-expanded="true"] .nav-caret { rotate: 180deg; }
/* The sheet comes down from under the bar. */
[data-navbar-03] [data-nav-sheet] { opacity: 0; translate: 0 -8px; visibility: hidden; transition: opacity .28s var(--ease-out-quart), translate .28s var(--ease-out-quart), visibility 0s linear .28s; }
[data-navbar-03][data-open] [data-nav-sheet] { opacity: 1; translate: 0 0; visibility: visible; transition: opacity .32s var(--ease-out-quart), translate .32s var(--ease-out-quart), visibility 0s; }
/* Menu and close glyphs share one cell and cross-fade. */
[data-navbar-03] .nav-glyph { grid-area: 1 / 1; transition: opacity .2s ease, scale .2s ease; }
[data-navbar-03] [data-nav-toggle][aria-expanded="true"] .nav-glyph-menu, [data-navbar-03] [data-nav-toggle][aria-expanded="false"] .nav-glyph-close { opacity: 0; scale: .8; }
@media (prefers-reduced-motion: reduce) {
    [data-navbar-03] [data-nav-panel], [data-navbar-03] [data-nav-sheet], [data-navbar-03] .nav-caret, [data-navbar-03] .nav-glyph { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-navbar-03]:not([data-navbar-03-ready])').forEach(function (root) {
        root.setAttribute('data-navbar-03-ready', '');
        var items = root.querySelectorAll('[data-nav-item]');
        var toggle = root.querySelector('[data-nav-toggle]');
        var sheet = root.querySelector('[data-nav-sheet]');
        function set(item, open) { item.querySelector('[data-nav-trigger]').setAttribute('aria-expanded', open ? 'true' : 'false'); }
        function isOpen(item) { return item.querySelector('[data-nav-trigger]').getAttribute('aria-expanded') === 'true'; }
        function closeAll(except) { items.forEach(function (item) { if (item !== except) set(item, false); }); }
        items.forEach(function (item) {
            var trigger = item.querySelector('[data-nav-trigger]');
            var openTimer, closeTimer, hovering = false;
            function open() { clearTimeout(closeTimer); closeAll(item); set(item, true); }
            /* Hover intent: open after 50ms, close after 180ms, so diagonal travel into the panel never slams it shut. */
            item.addEventListener('pointerenter', function (e) { if (e.pointerType !== 'mouse') return; hovering = true; clearTimeout(closeTimer); openTimer = setTimeout(open, 50); });
            item.addEventListener('pointerleave', function (e) { if (e.pointerType !== 'mouse') return; hovering = false; clearTimeout(openTimer); closeTimer = setTimeout(function () { if (!item.contains(document.activeElement)) set(item, false); }, 180); });
            /* Click toggles for touch and keyboard; a mouse that already opened it by hovering keeps it open. */
            trigger.addEventListener('click', function () { if (isOpen(item)) { if (!hovering) set(item, false); } else open(); });
            item.addEventListener('focusout', function (e) { if (!item.contains(e.relatedTarget)) set(item, false); });
        });
        function setSheet(open) {
            root.toggleAttribute('data-open', open);
            if (toggle) toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            document.documentElement.style.overflow = open ? 'hidden' : '';
        }
        if (toggle) toggle.addEventListener('click', function () { setSheet(!root.hasAttribute('data-open')); });
        if (sheet) sheet.addEventListener('click', function (e) { if (e.target.closest('a')) setSheet(false); });
        window.matchMedia('(min-width: 64rem)').addEventListener('change', function (e) { if (e.matches) setSheet(false); });
        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            items.forEach(function (item) { if (isOpen(item) && item.contains(document.activeElement)) item.querySelector('[data-nav-trigger]').focus(); });
            closeAll();
            if (root.hasAttribute('data-open')) { setSheet(false); if (toggle) toggle.focus(); }
        });
        document.addEventListener('pointerdown', function (e) { items.forEach(function (item) { if (!item.contains(e.target)) set(item, false); }); });
        /* aria-current on the link that matches this page. */
        var path = window.location.pathname.replace(/\/$/, '') || '/';
        root.querySelectorAll('nav a[href]').forEach(function (a) { if ((a.getAttribute('href').replace(/\/$/, '') || '/') === path) a.setAttribute('aria-current', 'page'); });
    });
})();
</script>
