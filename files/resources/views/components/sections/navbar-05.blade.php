@props([
    'brand' => 'Ferrous',
    'stripMessage' => 'Ferrous 2.4 is out: point-in-time restore on every plan.',
    'stripLinkText' => 'Read the changelog',
    'stripLinkUrl' => '/changelog',
    'stripDismissible' => '1',
    'links' => [
        (object) ['text' => 'Product', 'url' => '#', 'children' => [
            (object) ['text' => 'Postgres', 'url' => '/product/postgres', 'description' => 'Managed clusters in 6 US regions'],
            (object) ['text' => 'Branching', 'url' => '/product/branching', 'description' => 'A copy of production for every pull request'],
            (object) ['text' => 'Backups', 'url' => '/product/backups', 'description' => 'Restore to any second in the last 30 days'],
        ]],
        (object) ['text' => 'Pricing', 'url' => '/pricing'],
        (object) ['text' => 'Docs', 'url' => '/docs'],
        (object) ['text' => 'Customers', 'url' => '/customers'],
    ],
    'searchText' => 'Search',
    'searchShortcut' => '⌘K',
    'searchLink' => '/search',
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
])
<!--
    Header — a utility strip over the bar: a thin dark strip with a message, a link and a
    dismiss button (remembered for the visit in sessionStorage; clear the message to remove
    the strip, the toggle hides the button), then the bar with the brand, the links beside it,
    a search link with its shortcut chip, Log in and one compact filled action. The strip
    scrolls away and the bar sticks. Links come from site.nav_links; a link with children
    becomes a dropdown. On phones the links and the search move into a sheet under the bar.
    Clear Search, Log in or the button text to hide each.
-->
<header data-navbar-05 class="sticky z-50">
    @if ($stripMessage)
    <div data-strip class="relative bg-shade">
        <div class="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-center gap-x-3 gap-y-0.5 px-12 py-2 text-center">
            <p class="text-[13px] text-shade-ink/80">{{ $stripMessage }}</p>
            @if ($stripLinkText)
            <a href="{{ $stripLinkUrl }}" class="arrow-link inline-flex items-center gap-1 text-[13px] font-medium text-shade-ink underline decoration-shade-ink/30 underline-offset-4 transition-colors duration-200 hover:decoration-shade-ink">
                {{ $stripLinkText }}
                <svg viewBox="0 0 24 24" class="arrow size-3.5 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
        </div>
        @if ($stripDismissible)
        <button type="button" data-strip-dismiss aria-label="Dismiss announcement" class="absolute top-1/2 right-3 flex size-8 -translate-y-1/2 cursor-pointer items-center justify-center rounded-lg text-shade-muted transition-colors duration-200 hover:bg-shade-line hover:text-shade-ink">
            <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
        </button>
        @endif
    </div>
    @endif

    <div class="relative border-b border-line bg-canvas/85 backdrop-blur-md">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center gap-6 px-6">

            <div class="flex items-center" data-reveal>
                <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="m12 1.75 8.9 5.1v10.3L12 22.25l-8.9-5.1V6.85L12 1.75Zm0 3.4L6.1 8.55v6.9l5.9 3.4 5.9-3.4v-6.9L12 5.15Z" clip-rule="evenodd"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
            </div>

            <nav class="flex-1 border-l border-line pl-6 max-lg:hidden" aria-label="Main" data-reveal>
                <ul role="list" class="flex items-center gap-1 text-[15px] font-medium text-lede">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="relative" data-nav-item>
                        <button type="button" data-nav-trigger aria-expanded="false" class="flex cursor-pointer items-center gap-1 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-expanded:text-ink">
                            {{ $link->text }}
                            <svg viewBox="0 0 20 20" class="nav-caret size-3.5 fill-current text-faint" aria-hidden="true"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                        </button>
                        <!-- Aligned to the trigger's text; the bar-to-panel gap is padding so the pointer never crosses dead space. -->
                        <div data-nav-panel class="absolute top-full left-0 -ml-1.5 w-[19rem] pt-5">
                            <div class="flex flex-col gap-0.5 rounded-xl border border-line bg-panel p-1.5 shadow-xl shadow-black/5">
                                @foreach ($link->children as $child)
                                <a href="{{ $child->url }}" class="flex flex-col rounded-lg px-3 py-2 transition-colors duration-150 hover:bg-raised">
                                    <span class="text-[14px] font-medium text-ink">{{ $child->text }}</span>
                                    @if ($child->description ?? false)
                                    <span class="mt-0.5 text-[13px] leading-snug font-normal text-muted">{{ $child->description }}</span>
                                    @endif
                                </a>
                                @endforeach
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
                @if ($searchText)
                <a href="{{ $searchLink }}" class="inline-flex items-center gap-2 rounded-xl border border-line bg-panel py-1.5 pr-1.5 pl-3 text-[14px] font-medium text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink max-lg:hidden">
                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    {{ $searchText }}
                    @if ($searchShortcut)
                    <kbd class="rounded-md border border-line bg-raised px-1.5 py-0.5 font-mono text-[11px] font-normal text-faint">{{ $searchShortcut }}</kbd>
                    @endif
                </a>
                @endif
                @if ($signInText)
                <a href="{{ $signInLink }}" class="rounded-xl px-3 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:text-ink max-lg:hidden">{{ $signInText }}</a>
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

        <!-- The sheet hangs under the bar and scrolls inside itself; search first, then the links, with a link's children flattened under a label. -->
        <div data-nav-sheet class="absolute inset-x-0 top-full max-h-[calc(100dvh-6.5rem)] overflow-y-auto border-b border-line bg-canvas lg:hidden">
            <nav class="mx-auto w-full max-w-6xl px-6 py-4" aria-label="Mobile">
                @if ($searchText)
                <a href="{{ $searchLink }}" class="flex items-center gap-2.5 rounded-xl border border-line bg-panel px-3.5 py-3 text-[15px] font-medium text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink">
                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    {{ $searchText }}
                </a>
                @endif
                <ul role="list" class="mt-2 flex flex-col gap-0.5 text-base font-medium">
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
/* The header sticks by its bar: the script writes the strip's height into --strip-h so the strip scrolls out and the bar stays. */
[data-navbar-05] { top: calc(-1 * var(--strip-h, 0px)); }
/* Dropdown: in the DOM at full size, faded and moved 3px above its place so it settles down out of the bar. Exits are faster. */
[data-navbar-05] [data-nav-panel] { opacity: 0; translate: 0 -3px; scale: .98; visibility: hidden; transform-origin: top left; transition: opacity .18s ease-in, translate .18s ease-in, scale .18s ease-in, visibility 0s linear .18s; }
[data-navbar-05] [data-nav-trigger][aria-expanded="true"] + [data-nav-panel] { opacity: 1; translate: 0 0; scale: 1; visibility: visible; transition: opacity .24s var(--ease-out-quart), translate .24s var(--ease-out-quart), scale .24s var(--ease-out-quart), visibility 0s; }
[data-navbar-05] .nav-caret { transition: rotate .25s var(--ease-out-quart); }
[data-navbar-05] [aria-expanded="true"] .nav-caret { rotate: 180deg; }
/* The sheet comes down from under the bar. */
[data-navbar-05] [data-nav-sheet] { opacity: 0; translate: 0 -8px; visibility: hidden; transition: opacity .28s var(--ease-out-quart), translate .28s var(--ease-out-quart), visibility 0s linear .28s; }
[data-navbar-05][data-open] [data-nav-sheet] { opacity: 1; translate: 0 0; visibility: visible; transition: opacity .32s var(--ease-out-quart), translate .32s var(--ease-out-quart), visibility 0s; }
/* Menu and close glyphs share one cell and cross-fade. */
[data-navbar-05] .nav-glyph { grid-area: 1 / 1; transition: opacity .2s ease, scale .2s ease; }
[data-navbar-05] [data-nav-toggle][aria-expanded="true"] .nav-glyph-menu, [data-navbar-05] [data-nav-toggle][aria-expanded="false"] .nav-glyph-close { opacity: 0; scale: .8; }
@media (prefers-reduced-motion: reduce) {
    [data-navbar-05] [data-nav-panel], [data-navbar-05] [data-nav-sheet], [data-navbar-05] .nav-caret, [data-navbar-05] .nav-glyph { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-navbar-05]:not([data-navbar-05-ready])').forEach(function (root) {
        root.setAttribute('data-navbar-05-ready', '');
        var items = root.querySelectorAll('[data-nav-item]');
        var toggle = root.querySelector('[data-nav-toggle]');
        var sheet = root.querySelector('[data-nav-sheet]');
        var strip = root.querySelector('[data-strip]');
        var dismiss = root.querySelector('[data-strip-dismiss]');
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
        /* The strip: its height lets the bar stick alone; dismissing it is remembered for the visit. */
        var key = 'navbar-05-strip-dismissed';
        function measure() { root.style.setProperty('--strip-h', (strip && !strip.hidden ? strip.offsetHeight : 0) + 'px'); }
        try { if (strip && sessionStorage.getItem(key)) strip.hidden = true; } catch (err) {}
        measure();
        window.addEventListener('resize', measure);
        if (dismiss) dismiss.addEventListener('click', function () { strip.hidden = true; measure(); try { sessionStorage.setItem(key, '1'); } catch (err) {} });
        /* aria-current on the link that matches this page. */
        var path = window.location.pathname.replace(/\/$/, '') || '/';
        root.querySelectorAll('nav a[href]').forEach(function (a) { if ((a.getAttribute('href').replace(/\/$/, '') || '/') === path) a.setAttribute('aria-current', 'page'); });
    });
})();
</script>
