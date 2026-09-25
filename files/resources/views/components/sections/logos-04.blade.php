@props([
    'figure' => '1,180',
    'caption' => 'dental practices book through Slotwise',
    'text' => 'Recall reminders go out on each practice\'s own schedule, in 44 states, and the front desk stops making the Monday calls.',
    'items' => [
        (object) ['name' => 'Vireo', 'icon' => "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1.75' stroke-linecap='round' aria-hidden='true'><path d='M2.5 15c2.4-6 4.8-6 7.2 0s4.8 6 7.2 0 3.5-6 4.6-6'/></svg>"],
        (object) ['name' => 'Waypoint', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M12 22s-7.5-6.6-7.5-12a7.5 7.5 0 0 1 15 0c0 5.4-7.5 12-7.5 12Zm0-9a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z'/></svg>"],
        (object) ['name' => 'Yarrow', 'icon' => "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1.75' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M12 21v-8.5M12 12.5 4.5 5M12 12.5 19.5 5'/></svg>"],
        (object) ['name' => 'Ashlar', 'icon' => "<svg viewBox='0 0 24 24' aria-hidden='true'><rect x='3' y='3' width='18' height='18' rx='5' fill='none' stroke='currentColor' stroke-width='1.75'/><circle cx='12' cy='12' r='3' fill='currentColor'/></svg>"],
        (object) ['name' => 'Alder', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M8.5 3.5h7L21 20.5H3Z'/></svg>"],
        (object) ['name' => 'Jetty', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='4.5' width='18' height='3.5' rx='1.75'/><rect x='3' y='10.25' width='12' height='3.5' rx='1.75'/><rect x='3' y='16' width='6' height='3.5' rx='1.75'/></svg>"],
        (object) ['name' => 'Lodestar', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 2c.6 5.4 4.6 9.4 10 10-5.4.6-9.4 4.6-10 10-.6-5.4-4.6-9.4-10-10 5.4-.6 9.4-4.6 10-10Z'/></svg>"],
        (object) ['name' => 'Wharf', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3 13.5a9 9 0 0 1 18 0Z'/><rect x='3' y='16' width='18' height='4' rx='2'/></svg>"],
    ],
])
<!-- Stat + logos: a big figure that counts up once with its caption and one line of copy on the left, a hairline-ruled grid of wordmarks on the right. Rows come from collections.logos; the figure keeps its commas and any prefix or suffix, and the final value is what the markup holds. -->
<section class="px-6 py-16 sm:py-28" data-logos-04>
    <div class="mx-auto grid w-full max-w-6xl items-center gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5" data-reveal>
            <p class="text-figure font-semibold tracking-tight text-ink tabular-nums" data-logos-04-figure>{{ $figure }}</p>
            <p class="mt-3 text-base font-medium text-ink">{{ $caption }}</p>
            <p class="mt-3 max-w-[42ch] text-[15px]/6 text-pretty text-muted">{{ $text }}</p>
        </div>
        <div class="reveal-1 overflow-hidden lg:col-span-7" data-reveal>
            <ul role="list" class="-mt-px -ml-px grid grid-cols-2 sm:grid-cols-4">
                @foreach ($items as $item)
                <li class="flex h-20 items-center justify-center gap-2.5 border-t border-l border-line text-faint transition-colors duration-200 hover:text-ink sm:h-24 [&_svg]:size-6 [&_svg]:shrink-0">
                    {!! $item->icon !!}
                    <span class="text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<script>
(function () {
    document.querySelectorAll('[data-logos-04]:not([data-logos-04-ready])').forEach(function (root) {
        root.setAttribute('data-logos-04-ready', '');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var el = root.querySelector('[data-logos-04-figure]');
        if (!el || reduce) return;
        var final = el.textContent.trim();
        var m = final.match(/^([^\d]*)([\d,]+)(.*)$/);
        if (!m) return;
        var target = parseInt(m[2].replace(/,/g, ''), 10);
        var grouped = m[2].indexOf(',') > -1;
        var format = function (n) { var s = String(n); return grouped ? s.replace(/\B(?=(\d{3})+(?!\d))/g, ',') : s; };
        var run = function () {
            var start = performance.now(), duration = 1200;
            var step = function (now) {
                var p = Math.min(1, (now - start) / duration), eased = 1 - Math.pow(1 - p, 4);
                el.textContent = p < 1 ? m[1] + format(Math.round(target * eased)) + m[3] : final;
                if (p < 1) requestAnimationFrame(step);
            };
            el.textContent = m[1] + format(0) + m[3];
            requestAnimationFrame(step);
        };
        if (!('IntersectionObserver' in window)) return run();
        var io = new IntersectionObserver(function (entries) {
            if (entries.some(function (e) { return e.isIntersecting; })) { io.disconnect(); run(); }
        }, { threshold: 0.5 });
        io.observe(el);
    });
})();
</script>
