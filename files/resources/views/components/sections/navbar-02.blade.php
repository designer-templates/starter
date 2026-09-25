@props([
    'brand' => 'Ambit',
    'links' => [
        (object) ['text' => 'Product', 'url' => '#', 'children' => [
            (object) ['text' => 'Monitors', 'url' => '/product/monitors', 'description' => '30-second checks from 14 US regions'],
            (object) ['text' => 'Status pages', 'url' => '/product/status', 'description' => 'A public page on your own domain'],
            (object) ['text' => 'Alerts', 'url' => '/product/alerts', 'description' => 'Slack, SMS and on-call rotations'],
        ]],
        (object) ['text' => 'Pricing', 'url' => '/pricing'],
        (object) ['text' => 'Changelog', 'url' => '/changelog'],
        (object) ['text' => 'Docs', 'url' => '/docs'],
    ],
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
])
<!--
    Header — the floating pill: a glass bar no wider than max-w-4xl, floating 16px below the top
    of the page, with the brand, the links and one compact filled action inside. Links come from
    site.nav_links; a link with children becomes a dropdown hanging under the pill. Once the page
    has scrolled 8px the pill tightens: a firmer hairline, a fuller surface and the page's soft
    shadow (the script sets data-scrolled). On phones the links move into a card under the pill.
    Clear Log in or the button text to hide either.
-->
<header data-navbar-02 class="sticky top-0 z-50 px-6 pt-4">
    <div class="relative mx-auto w-full max-w-4xl">
        <div data-nav-pill class="flex h-14 items-center justify-between gap-4 rounded-full border border-line bg-panel/80 pr-2.5 pl-5 shadow-sm shadow-black/5 backdrop-blur-md transition-[background-color,border-color,box-shadow] duration-300 data-scrolled:border-line-strong data-scrolled:bg-panel/95 data-scrolled:shadow-lg data-scrolled:shadow-black/5">

            <div class="flex flex-1 items-center" data-reveal>
                <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 3.2a6.8 6.8 0 1 1 0 13.6 6.8 6.8 0 0 1 0-13.6Z" clip-rule="evenodd"/><circle cx="12" cy="12" r="3"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
            </div>

            <nav class="max-lg:hidden" aria-label="Main" data-reveal>
                <ul role="list" class="flex items-center gap-1 text-[15px] font-medium text-lede">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="relative" data-nav-item>
                        <button type="button" data-nav-trigger aria-expanded="false" class="flex cursor-pointer items-center gap-1 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-expanded:text-ink">
                            {{ $link->text }}
                            <svg viewBox="0 0 20 20" class="nav-caret size-3.5 fill-current text-faint" aria-hidden="true"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                        </button>
                        <!-- Centered with left-1/2 and a negative margin of half its width: the open motion animates translate. -->
                        <div data-nav-panel class="absolute top-full left-1/2 -ml-[9.5rem] w-[19rem] pt-4">
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

            <div class="flex flex-1 items-center justify-end gap-1.5" data-reveal>
                @if ($signInText)
                <a href="{{ $signInLink }}" class="rounded-xl px-4 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:text-ink max-lg:hidden">{{ $signInText }}</a>
                @endif
                @if ($ctaText)
                <a href="{{ $ctaLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] max-lg:hidden">{{ $ctaText }}</a>
                @endif
                <!-- The toggle is a 44px box; the two glyphs are stacked and cross-fade. -->
                <button type="button" data-nav-toggle aria-expanded="false" aria-label="Toggle menu" class="grid size-11 cursor-pointer place-items-center rounded-full text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-menu size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-close size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- The sheet is a card hanging under the pill; a link with children flattens into a label and its rows. -->
        <div data-nav-sheet class="absolute inset-x-0 top-full mt-2 max-h-[calc(100dvh-6.5rem)] overflow-y-auto rounded-2xl border border-line bg-panel shadow-xl shadow-black/5 lg:hidden">
            <nav class="px-3 py-3" aria-label="Mobile">
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
                <div class="mt-3 flex flex-col gap-2 border-t border-line pt-3">
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
/* Dropdown: in the DOM at full size, faded and moved 3px above its place so it settles down out of the pill. Exits are faster. */
[data-navbar-02] [data-nav-panel] { opacity: 0; translate: 0 -3px; scale: .98; visibility: hidden; transform-origin: top center; transition: opacity .18s ease-in, translate .18s ease-in, scale .18s ease-in, visibility 0s linear .18s; }
[data-navbar-02] [data-nav-trigger][aria-expanded="true"] + [data-nav-panel] { opacity: 1; translate: 0 0; scale: 1; visibility: visible; transition: opacity .24s var(--ease-out-quart), translate .24s var(--ease-out-quart), scale .24s var(--ease-out-quart), visibility 0s; }
[data-navbar-02] .nav-caret { transition: rotate .25s var(--ease-out-quart); }
[data-navbar-02] [aria-expanded="true"] .nav-caret { rotate: 180deg; }
/* The sheet comes down from under the pill. */
[data-navbar-02] [data-nav-sheet] { opacity: 0; translate: 0 -8px; visibility: hidden; transition: opacity .28s var(--ease-out-quart), translate .28s var(--ease-out-quart), visibility 0s linear .28s; }
[data-navbar-02][data-open] [data-nav-sheet] { opacity: 1; translate: 0 0; visibility: visible; transition: opacity .32s var(--ease-out-quart), translate .32s var(--ease-out-quart), visibility 0s; }
/* Menu and close glyphs share one cell and cross-fade. */
[data-navbar-02] .nav-glyph { grid-area: 1 / 1; transition: opacity .2s ease, scale .2s ease; }
[data-navbar-02] [data-nav-toggle][aria-expanded="true"] .nav-glyph-menu, [data-navbar-02] [data-nav-toggle][aria-expanded="false"] .nav-glyph-close { opacity: 0; scale: .8; }
@media (prefers-reduced-motion: reduce) {
    [data-navbar-02] [data-nav-panel], [data-navbar-02] [data-nav-sheet], [data-navbar-02] [data-nav-pill], [data-navbar-02] .nav-caret, [data-navbar-02] .nav-glyph { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-navbar-02]:not([data-navbar-02-ready])').forEach(function (root) {
        root.setAttribute('data-navbar-02-ready', '');
        var items = root.querySelectorAll('[data-nav-item]');
        var toggle = root.querySelector('[data-nav-toggle]');
        var sheet = root.querySelector('[data-nav-sheet]');
        var pill = root.querySelector('[data-nav-pill]');
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
        /* The pill tightens once the page has scrolled 8px. */
        function scrolled() { if (pill) pill.toggleAttribute('data-scrolled', window.scrollY > 8); }
        scrolled();
        window.addEventListener('scroll', scrolled, { passive: true });
        /* aria-current on the link that matches this page. */
        var path = window.location.pathname.replace(/\/$/, '') || '/';
        root.querySelectorAll('nav a[href]').forEach(function (a) { if ((a.getAttribute('href').replace(/\/$/, '') || '/') === path) a.setAttribute('aria-current', 'page'); });
    });
})();
</script>
