@props([
    'heading' => 'The point of sale behind 2,340 cafés',
    'items' => [
        (object) ['name' => 'Upland', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm0 4a5 5 0 1 1 0 10 5 5 0 0 1 0-10Z'/></svg>"],
        (object) ['name' => 'Verity', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M9.4 20.2 2.6 13.4l2.9-2.9 3.9 3.9L18.5 4.3l2.9 2.9Z'/></svg>"],
        (object) ['name' => 'Valence', 'icon' => "<svg viewBox='0 0 24 24' aria-hidden='true'><circle cx='12' cy='12' r='3.5' fill='currentColor'/><ellipse cx='12' cy='12' rx='9.5' ry='4' fill='none' stroke='currentColor' stroke-width='1.75' transform='rotate(-30 12 12)'/></svg>"],
        (object) ['name' => 'Granary', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='7.5' cy='7.5' r='3.75'/><circle cx='16.5' cy='7.5' r='3.75'/><circle cx='7.5' cy='16.5' r='3.75'/><circle cx='16.5' cy='16.5' r='3.75'/></svg>"],
        (object) ['name' => 'Rosewood', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 3 21 10.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9.5Z'/></svg>"],
        (object) ['name' => 'Cinder', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='9' width='13' height='6' rx='3'/><circle cx='19.5' cy='12' r='2.5'/></svg>"],
        (object) ['name' => 'Perch', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='5' y='5' width='14' height='14' rx='2.5' transform='rotate(45 12 12)'/></svg>"],
        (object) ['name' => 'Tallis', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='10.25' width='18' height='3.5' rx='1.75'/><rect x='3' y='10.25' width='18' height='3.5' rx='1.75' transform='rotate(60 12 12)'/><rect x='3' y='10.25' width='18' height='3.5' rx='1.75' transform='rotate(120 12 12)'/></svg>"],
    ],
])
<!-- Logo marquee: a left-aligned line of proof, then two rows of wordmarks drifting in opposite directions behind faded edges; the rows pause on hover and hold still under reduced motion. One loop renders the track — the script clones it for the seamless loop and the second row. Rows come from collections.logos; clear the heading to show the marquee alone. -->
<section class="px-6 py-16 sm:py-20" data-logos-02>
    <div class="mx-auto w-full max-w-6xl">
        @if ($heading)
        <p class="text-[15px] font-medium text-muted" data-reveal>{{ $heading }}</p>
        @endif
        <div class="reveal-1 mt-8 space-y-5 overflow-hidden [mask-image:linear-gradient(to_right,transparent,var(--color-ink)_14%,var(--color-ink)_86%,transparent)]" data-reveal data-logos-02-marquee>
            <div class="flex w-max" data-logos-02-row>
                <ul role="list" class="flex w-max items-center" data-logos-02-track>
                    @foreach ($items as $item)
                    <li class="flex items-center gap-2.5 px-7 text-faint transition-colors duration-200 hover:text-ink [&_svg]:size-6 [&_svg]:shrink-0">
                        {!! $item->icon !!}
                        <span class="whitespace-nowrap text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex w-max" data-logos-02-row="reverse" aria-hidden="true"></div>
        </div>
    </div>
</section>
<style>
    [data-logos-02-ready] [data-logos-02-row] { animation: logos-02-drift 42s linear infinite; }
    [data-logos-02-ready] [data-logos-02-row="reverse"] { animation-direction: reverse; }
    [data-logos-02-marquee]:hover [data-logos-02-row] { animation-play-state: paused; }
    @keyframes logos-02-drift { to { translate: -50% 0; } }
    @media (prefers-reduced-motion: reduce) {
        [data-logos-02-ready] [data-logos-02-row] { animation: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-logos-02]:not([data-logos-02-ready])').forEach(function (root) {
        var track = root.querySelector('[data-logos-02-track]');
        var rows = root.querySelectorAll('[data-logos-02-row]');
        if (!track || rows.length < 2 || !track.children.length) return;
        root.setAttribute('data-logos-02-ready', '');
        var copy = function (reverse) {
            var clone = track.cloneNode(true);
            clone.removeAttribute('data-logos-02-track');
            clone.removeAttribute('role');
            clone.setAttribute('aria-hidden', 'true');
            if (reverse) Array.prototype.slice.call(clone.children).reverse().forEach(function (item) { clone.appendChild(item); });
            return clone;
        };
        rows[0].appendChild(copy(false));
        rows[1].appendChild(copy(true));
        rows[1].appendChild(copy(true));
    });
})();
</script>
