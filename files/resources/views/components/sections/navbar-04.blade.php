@props([
    'brand' => 'Meadowlark',
    'links' => [
        (object) ['text' => 'Product', 'url' => '#', 'children' => [
            (object) ['text' => 'Rent collection', 'url' => '/product/rent', 'description' => 'ACH autopay, late fees by your rules'],
            (object) ['text' => 'Maintenance', 'url' => '/product/maintenance', 'description' => 'Tenants text a photo, you get a work order'],
            (object) ['text' => 'Leases', 'url' => '/product/leases', 'description' => 'Leases by state, signed on a phone'],
        ]],
        (object) ['text' => 'Pricing', 'url' => '/pricing'],
        (object) ['text' => 'Blog', 'url' => '/blog'],
        (object) ['text' => 'About', 'url' => '/about'],
    ],
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Book a demo',
    'ctaLink' => '/contact',
])
<!--
    Header — minimal: brand on the left, links on the right, Log in as a text link and one
    outlined compact button; nothing filled, so the hero's button stays the first primary on the
    page. A hairline slides under the hovered link (it leaves the way it came) and stays under
    the current page. Links come from site.nav_links; a link with children becomes a dropdown
    (hover intent, tap to toggle, Escape or an outside click to close). On phones the links move
    into a sheet under the bar. Clear Log in or the button text to hide either.
-->
<header data-navbar-04 class="sticky top-0 z-50">
    <div class="relative border-b border-line bg-canvas/85 backdrop-blur-md">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between gap-8 px-6">

            <div class="flex items-center" data-reveal>
                <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M12 2.5 22.5 12H19v9.5H5V12H1.5L12 2.5Zm0 4.1L8 10.2V18.5h8v-8.3l-4-3.6Z" clip-rule="evenodd"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
            </div>

            <div class="flex items-center gap-4" data-reveal>
                <nav class="max-lg:hidden" aria-label="Main">
                    <ul role="list" class="flex items-center gap-1 text-[15px] font-medium text-lede">
                        @foreach ($links as $link)
                        @if (count($link->children ?? []))
                        <li class="relative" data-nav-item>
                            <button type="button" data-nav-trigger aria-expanded="false" class="nav-link flex cursor-pointer items-center gap-1 px-3 py-2 transition-colors duration-200 hover:text-ink aria-expanded:text-ink">
                                {{ $link->text }}
                                <svg viewBox="0 0 20 20" class="nav-caret size-3.5 fill-current text-faint" aria-hidden="true"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                            </button>
                            <!-- Centered with left-1/2 and a negative margin of half its width: the open motion animates translate. -->
                            <div data-nav-panel class="absolute top-full left-1/2 -ml-[9.5rem] w-[19rem] pt-5">
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
                        <li><a href="{{ $link->url }}" class="nav-link flex px-3 py-2 transition-colors duration-200 hover:text-ink aria-[current]:text-ink">{{ $link->text }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </nav>

                <div class="flex items-center gap-2.5 lg:ml-2">
                    @if ($signInText)
                    <a href="{{ $signInLink }}" class="px-3 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:text-ink max-lg:hidden">{{ $signInText }}</a>
                    @endif
                    @if ($ctaText)
                    <a href="{{ $ctaLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-line bg-panel px-4 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] max-lg:hidden">{{ $ctaText }}</a>
                    @endif
                    <!-- The toggle is a 44px box; the two glyphs are stacked and cross-fade. -->
                    <button type="button" data-nav-toggle aria-expanded="false" aria-label="Toggle menu" class="grid size-11 cursor-pointer place-items-center rounded-lg text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-menu size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="nav-glyph nav-glyph-close size-5 stroke-current" aria-hidden="true"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
                    </button>
                </div>
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
                    <a href="{{ $signInLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-[15px] font-medium text-lede transition-colors duration-200 hover:bg-raised hover:text-ink active:scale-[.98]">{{ $signInText }}</a>
                    @endif
                    @if ($ctaText)
                    <a href="{{ $ctaLink }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-line bg-panel px-4 py-3 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $ctaText }}</a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>
<style>
/* The hairline under a link: grows from the left on hover, leaves toward the right, and stays under the current page. */
[data-navbar-04] .nav-link { position: relative; }
[data-navbar-04] .nav-link::after { content: ""; position: absolute; right: .75rem; bottom: .2rem; left: .75rem; height: 1px; background-color: currentColor; scale: 0 1; transform-origin: right center; transition: scale .25s var(--ease-out-quart); }
[data-navbar-04] .nav-link:hover::after, [data-navbar-04] .nav-link[aria-current]::after, [data-navbar-04] .nav-link[aria-expanded="true"]::after { scale: 1 1; transform-origin: left center; }
/* Dropdown: in the DOM at full size, faded and moved 3px above its place so it settles down out of the bar. Exits are faster. */
[data-navbar-04] [data-nav-panel] { opacity: 0; translate: 0 -3px; scale: .98; visibility: hidden; transform-origin: top center; transition: opacity .18s ease-in, translate .18s ease-in, scale .18s ease-in, visibility 0s linear .18s; }
[data-navbar-04] [data-nav-trigger][aria-expanded="true"] + [data-nav-panel] { opacity: 1; translate: 0 0; scale: 1; visibility: visible; transition: opacity .24s var(--ease-out-quart), translate .24s var(--ease-out-quart), scale .24s var(--ease-out-quart), visibility 0s; }
[data-navbar-04] .nav-caret { transition: rotate .25s var(--ease-out-quart); }
[data-navbar-04] [aria-expanded="true"] .nav-caret { rotate: 180deg; }
/* The sheet comes down from under the bar. */
[data-navbar-04] [data-nav-sheet] { opacity: 0; translate: 0 -8px; visibility: hidden; transition: opacity .28s var(--ease-out-quart), translate .28s var(--ease-out-quart), visibility 0s linear .28s; }
[data-navbar-04][data-open] [data-nav-sheet] { opacity: 1; translate: 0 0; visibility: visible; transition: opacity .32s var(--ease-out-quart), translate .32s var(--ease-out-quart), visibility 0s; }
/* Menu and close glyphs share one cell and cross-fade. */
[data-navbar-04] .nav-glyph { grid-area: 1 / 1; transition: opacity .2s ease, scale .2s ease; }
[data-navbar-04] [data-nav-toggle][aria-expanded="true"] .nav-glyph-menu, [data-navbar-04] [data-nav-toggle][aria-expanded="false"] .nav-glyph-close { opacity: 0; scale: .8; }
@media (prefers-reduced-motion: reduce) {
    [data-navbar-04] .nav-link::after, [data-navbar-04] [data-nav-panel], [data-navbar-04] [data-nav-sheet], [data-navbar-04] .nav-caret, [data-navbar-04] .nav-glyph { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-navbar-04]:not([data-navbar-04-ready])').forEach(function (root) {
        root.setAttribute('data-navbar-04-ready', '');
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
        /* aria-current on the link that matches this page keeps its hairline. */
        var path = window.location.pathname.replace(/\/$/, '') || '/';
        root.querySelectorAll('nav a[href]').forEach(function (a) { if ((a.getAttribute('href').replace(/\/$/, '') || '/') === path) a.setAttribute('aria-current', 'page'); });
    });
})();
</script>
