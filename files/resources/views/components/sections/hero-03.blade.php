@props([
    'showBadge' => '1',
    'badgeText' => 'Now with retainers and deposits',
    'heading' => 'Run the studio, not the spreadsheet',
    'text' => 'Hollen keeps every project, hour and invoice for a design studio in one place, so Friday is for the work and not the books.',
    'buttonText' => 'Start free',
    'buttonLink' => '/signup',
    'buttonText2' => 'See a live studio',
    'buttonLink2' => '/demo',
    'logosLabel' => 'Used by 1,400 studios',
    'logos' => [
        (object) ['name' => 'Upland', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm0 4a5 5 0 1 1 0 10 5 5 0 0 1 0-10Z'/></svg>"],
        (object) ['name' => 'Verity', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M9.4 20.2 2.6 13.4l2.9-2.9 3.9 3.9L18.5 4.3l2.9 2.9Z'/></svg>"],
        (object) ['name' => 'Valence', 'icon' => "<svg viewBox='0 0 24 24' aria-hidden='true'><circle cx='12' cy='12' r='3.5' fill='currentColor'/><ellipse cx='12' cy='12' rx='9.5' ry='4' fill='none' stroke='currentColor' stroke-width='1.75' transform='rotate(-30 12 12)'/></svg>"],
        (object) ['name' => 'Granary', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='7.5' cy='7.5' r='3.75'/><circle cx='16.5' cy='7.5' r='3.75'/><circle cx='7.5' cy='16.5' r='3.75'/><circle cx='16.5' cy='16.5' r='3.75'/></svg>"],
        (object) ['name' => 'Rosewood', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 3 21 10.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9.5Z'/></svg>"],
        (object) ['name' => 'Cinder', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='9' width='13' height='6' rx='3'/><circle cx='19.5' cy='12' r='2.5'/></svg>"],
        (object) ['name' => 'Perch', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='5' y='5' width='14' height='14' rx='2.5' transform='rotate(45 12 12)'/></svg>"],
        (object) ['name' => 'Tallis', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='10.25' width='18' height='3.5' rx='1.75'/><rect x='3' y='10.25' width='18' height='3.5' rx='1.75' transform='rotate(60 12 12)'/><rect x='3' y='10.25' width='18' height='3.5' rx='1.75' transform='rotate(120 12 12)'/></svg>"],
    ],
    'images' => [
        (object) ['image' => '/images/blocks/workspace-01.jpg', 'alt' => 'People at desks in a bright studio'],
        (object) ['image' => '/images/blocks/cover-01.jpg', 'alt' => 'A notebook and pencil on an oak desk'],
        (object) ['image' => '/images/blocks/portrait-01.jpg', 'alt' => 'A designer at her desk'],
        (object) ['image' => '/images/blocks/cover-03.jpg', 'alt' => 'White concrete stairs in sunlight'],
        (object) ['image' => '/images/blocks/workspace-02.jpg', 'alt' => 'Two people at a whiteboard'],
        (object) ['image' => '/images/blocks/cover-05.jpg', 'alt' => 'Green leaves against a white wall'],
        (object) ['image' => '/images/blocks/portrait-02.jpg', 'alt' => 'A designer reviewing work at a desk'],
        (object) ['image' => '/images/blocks/cover-04.jpg', 'alt' => 'Ceramic cups on a shelf'],
    ],
])
<!--
    Hero — a centred statement over a drifting strip of wordmarks and a row of photographs. A pill
    badge with a dot, the headline, the intro, the primary and secondary buttons (both with an
    up-right arrow). Beneath, the wordmarks drift slowly to the left with the edges faded out, and a
    row of tall photo tiles drifts the other way, staggered in height and cut off by the bottom of the
    section. Both rows are doubled by the script for a seamless loop, pause on hover and stand still
    under reduced motion. Wordmarks come from collections.logos; the tiles are the images repeater.
    The toggle hides the badge; clear the secondary button text or the strip label to hide them.
-->
<section class="overflow-hidden pt-20 sm:pt-28" data-hero-03>
    <div class="mx-auto flex w-full max-w-6xl flex-col items-center px-6 text-center">
        @if ($showBadge)
        <p class="reveal-1 inline-flex items-center gap-2 rounded-full border border-line bg-panel px-3.5 py-1.5 text-[13px] font-medium text-ink" data-reveal>
            <span class="size-1.5 rounded-full bg-ink" aria-hidden="true"></span>
            {{ $badgeText }}
        </p>
        @endif
        <h1 class="reveal-2 mt-7 max-w-[18ch] text-hero font-semibold tracking-[-0.04em] text-balance text-ink" data-reveal>{{ $heading }}</h1>
        <p class="reveal-3 mt-6 max-w-[52ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>
        <div class="reveal-4 mt-9 flex w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-center" data-reveal>
            <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">
                {{ $buttonText }}
                <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-current opacity-80" aria-hidden="true"><path fill-rule="evenodd" d="M4.5 3.25a.75.75 0 0 1 .75-.75h7.25a.75.75 0 0 1 .75.75V10.5a.75.75 0 0 1-1.5 0V5.06l-7.22 7.22a.75.75 0 0 1-1.06-1.06L10.69 4H5.25a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/></svg>
            </a>
            @if ($buttonText2)
            <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">
                {{ $buttonText2 }}
                <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-current opacity-60" aria-hidden="true"><path fill-rule="evenodd" d="M4.5 3.25a.75.75 0 0 1 .75-.75h7.25a.75.75 0 0 1 .75.75V10.5a.75.75 0 0 1-1.5 0V5.06l-7.22 7.22a.75.75 0 0 1-1.06-1.06L10.69 4H5.25a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/></svg>
            </a>
            @endif
        </div>
    </div>

    <!-- The wordmark strip: one row drifting left, edges faded to the canvas -->
    <div class="reveal-5 mt-16 sm:mt-20" data-reveal>
        @if ($logosLabel)
        <p class="text-center text-[15px] font-medium text-muted">{{ $logosLabel }}</p>
        @endif
        <div class="mt-6 overflow-hidden [mask-image:linear-gradient(to_right,transparent,var(--color-ink)_12%,var(--color-ink)_88%,transparent)]" data-marquee>
            <ul role="list" class="flex w-max items-center" data-marquee-track data-speed="36">
                @foreach ($logos as $item)
                <li class="flex shrink-0 items-center gap-2.5 px-7 text-faint [&_svg]:size-6 [&_svg]:shrink-0">
                    {!! $item->icon !!}
                    <span class="whitespace-nowrap text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- The photographs: tall tiles drifting right, staggered, cut off by the section's edge -->
    <div class="mt-10 h-[15rem] overflow-hidden sm:mt-14 sm:h-[19rem]" data-marquee>
        <ul role="list" class="flex w-max items-start gap-3 pr-3 sm:gap-4 sm:pr-4" data-marquee-track data-marquee-reverse data-speed="28">
            @foreach ($images as $tile)
            <li class="w-[13rem] shrink-0 overflow-hidden rounded-2xl bg-raised sm:w-[17rem] {{ $loop->index % 3 == 1 ? 'mt-10 sm:mt-14' : ($loop->index % 3 == 2 ? 'mt-4 sm:mt-6' : '') }}">
                <img src="{{ $tile->image }}" alt="{{ $tile->alt }}" width="1600" height="1067" loading="{{ $loop->index < 4 ? 'eager' : 'lazy' }}" class="aspect-[4/5] w-full object-cover">
            </li>
            @endforeach
        </ul>
    </div>
</section>
<style>
/* Each doubled row travels half its width and starts over; the photo row runs the same path backwards. */
[data-hero-03] [data-marquee-track][data-marquee-on] { animation: hero-03-drift var(--marquee-duration, 40s) linear infinite; }
[data-hero-03] [data-marquee-track][data-marquee-reverse] { animation-direction: reverse; }
[data-hero-03] [data-marquee]:hover [data-marquee-track] { animation-play-state: paused; }
@keyframes hero-03-drift { to { translate: -50% 0; } }
@media (prefers-reduced-motion: reduce) {
    [data-hero-03] [data-marquee-track] { animation: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-hero-03]:not([data-hero-03-ready])').forEach(function (root) {
        root.setAttribute('data-hero-03-ready', '');
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        /* Each row is doubled so the loop is seamless; the speed is pixels a second from data-speed. */
        root.querySelectorAll('[data-marquee-track]').forEach(function (track) {
            if (!track.children.length) return;
            var width = track.scrollWidth;
            var speed = parseFloat(track.getAttribute('data-speed')) || 36;
            Array.prototype.slice.call(track.children).forEach(function (item) {
                var copy = item.cloneNode(true);
                copy.setAttribute('aria-hidden', 'true');
                track.appendChild(copy);
            });
            track.style.setProperty('--marquee-duration', Math.max(20, Math.round(width / speed)) + 's');
            track.setAttribute('data-marquee-on', '');
        });
    });
})();
</script>
