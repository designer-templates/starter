@props([
    'eyebrow' => 'By the numbers',
    'heading' => 'A year of Skiff on the road',
    'figures' => [
        (object) ['value' => '2,318', 'label' => 'Crews dispatched every weekday'],
        (object) ['value' => '14 min', 'label' => 'From the call to a truck on the way'],
        (object) ['value' => '99.97%', 'label' => 'Jobs kept on the day they were booked'],
        (object) ['value' => '4.9', 'label' => 'Average technician rating from customers'],
    ],
    'note' => 'Across every Skiff account from Sep 1, 2025 to Aug 31, 2026. Ratings from 61,412 completed jobs.',
])
<!-- Stats in a dark band: one rounded shade surface with a faint dot grid, an eyebrow and heading on the left, four giant figures divided by hairlines, and a source line under a rule. Rows come from collections.stats (value, label); the first figure counts up once when it scrolls in. Clear the eyebrow or the note to hide it. -->
<section class="px-6 py-16 sm:py-28" data-stats-01>
    <div class="mx-auto w-full max-w-6xl">
        <div class="relative overflow-hidden rounded-[2.5rem] bg-shade px-6 py-16 text-shade-ink sm:px-16 sm:py-24">
            <div class="pointer-events-none absolute inset-0 [background-image:radial-gradient(circle,var(--color-shade-line)_1px,transparent_1px)] [background-size:24px_24px]" aria-hidden="true"></div>

            <div class="relative">
                <div class="max-w-2xl" data-reveal>
                    @if ($eyebrow)
                    <p class="text-xs font-semibold tracking-[0.2em] text-shade-muted uppercase">{{ $eyebrow }}</p>
                    @endif
                    <h2 class="mt-4 max-w-[24ch] text-h2 font-semibold tracking-tight text-balance text-shade-ink">{{ $heading }}</h2>
                </div>

                <div class="mt-12 grid grid-cols-1 sm:mt-16 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($figures as $item)
                    <div class="reveal-{{ min($loop->iteration, 6) }} border-shade-line max-sm:border-t max-sm:py-7 max-sm:first:border-t-0 max-sm:first:pt-0 max-sm:last:pb-0 sm:max-lg:[&:nth-child(2n)]:border-l sm:max-lg:[&:nth-child(2n)]:pl-8 sm:max-lg:[&:nth-child(2n+1)]:pr-8 sm:max-lg:[&:nth-child(n+3)]:border-t sm:max-lg:[&:nth-child(n+3)]:pt-10 sm:max-lg:[&:nth-child(-n+2)]:pb-10 lg:border-l lg:px-6 lg:[&:nth-child(4n+1)]:border-l-0 lg:[&:nth-child(4n+1)]:pl-0 lg:[&:nth-child(4n)]:pr-0 lg:[&:nth-child(n+5)]:mt-14" data-reveal>
                        <p class="text-figure font-semibold tracking-[-0.03em] text-shade-ink tabular-nums lg:text-[3.5rem]/none" data-count="{{ $item->value }}">{{ $item->value }}</p>
                        <p class="mt-3 max-w-[22ch] text-[14px]/5 text-pretty text-shade-muted">{{ $item->label }}</p>
                    </div>
                    @endforeach
                </div>

                @if ($note)
                <p class="reveal-5 mt-14 border-t border-shade-line pt-6 text-[13px]/5 text-pretty text-shade-muted" data-reveal>{{ $note }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
<script>
(function () {
    document.querySelectorAll('[data-stats-01]:not([data-stats-01-ready])').forEach(function (root) {
        root.setAttribute('data-stats-01-ready', '');
        var el = root.querySelector('[data-count]');
        if (!el) return;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) return;
        var final = el.getAttribute('data-count') || '';
        var m = final.match(/\d[\d,]*(?:\.\d+)?/);
        if (!m) return;
        var target = parseFloat(m[0].replace(/,/g, ''));
        var decimals = (m[0].split('.')[1] || '').length;
        var grouped = m[0].indexOf(',') > -1;
        var prefix = final.slice(0, m.index);
        var suffix = final.slice(m.index + m[0].length);
        function format(n) {
            var parts = n.toFixed(decimals).split('.');
            if (grouped) parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            return prefix + parts.join('.') + suffix;
        }
        var io = new IntersectionObserver(function (entries) {
            if (!entries[0].isIntersecting) return;
            io.disconnect();
            var start = null;
            var duration = 1200;
            function step(now) {
                if (start === null) start = now;
                var p = Math.min((now - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 4);
                el.textContent = p < 1 ? format(target * eased) : final;
                if (p < 1) requestAnimationFrame(step);
            }
            el.textContent = format(0);
            requestAnimationFrame(step);
        }, { threshold: 0.5 });
        io.observe(el);
    });
})();
</script>
