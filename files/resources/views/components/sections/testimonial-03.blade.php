@props([
    'eyebrow' => 'Customer story',
    'quote' => 'We onboard a new resident in 4 minutes at the leasing desk instead of a 3-day paper chase. Keys, parking, and the package room all switch on together.',
    'name' => 'Emery Rivera',
    'role' => 'Director of operations, Ridgely Properties',
    'avatar' => 'https://assets.ui.sh/avatars/8.webp?size=160',
    'company' => 'Ridgely Properties',
    'ctaText' => 'Read the Ridgely story',
    'ctaLink' => '#',
    'stats' => [
        (object) ['value' => '1,860', 'label' => 'units on Latch across 11 buildings'],
        (object) ['value' => '4 min', 'label' => 'to onboard a resident, down from 3 days'],
        (object) ['value' => '$38,400', 'label' => 'saved on rekeying in the first year'],
    ],
])
<!--
    Editorial case study: left, an eyebrow, one large quote with a hanging opening mark, the customer's portrait,
    name and role, and an arrow link to the full story; right, a recessed well with the company wordmark on top
    and three outcome figures stacked under hairlines — the first figure counts up once as it scrolls in.
    The quote and its person are fields; the figures live in collections.stats (value, label). Clear the eyebrow
    or the link text to hide each.
-->
<section class="px-6 py-16 sm:py-28" data-testimonial-03>
    <div class="mx-auto grid w-full max-w-6xl gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">
        <figure class="lg:col-span-7">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <blockquote class="reveal-1 relative mt-4" data-reveal>
                <p class="max-w-[32ch] font-display text-3xl/tight font-semibold tracking-tight text-balance text-ink before:absolute before:-translate-x-full before:content-['\201C'] after:content-['\201D'] sm:text-4xl/tight">{{ $quote }}</p>
            </blockquote>
            <figcaption class="reveal-2 mt-8 flex items-center gap-4" data-reveal>
                <img src="{{ $avatar }}" alt="" width="48" height="48" class="size-12 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
                <div>
                    <p class="text-[15px] font-semibold text-ink">{{ $name }}</p>
                    <p class="mt-0.5 text-[14px] text-muted">{{ $role }}</p>
                </div>
            </figcaption>
            @if ($ctaText)
            <div class="reveal-3 mt-8" data-reveal>
                <a href="{{ $ctaLink }}" class="arrow-link inline-flex min-h-11 items-center gap-1.5 text-[15px] font-medium text-ink">
                    {{ $ctaText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
            @endif
        </figure>

        <div class="reveal-3 rounded-3xl bg-raised/70 p-8 sm:p-10 lg:col-span-5" data-reveal>
            <p class="font-mono text-[13px] font-medium tracking-widest text-ink uppercase">{{ $company }}</p>
            <dl class="mt-8 divide-y divide-line">
                @foreach ($stats as $item)
                <div class="py-6 first:pt-0 last:pb-0">
                    <dd class="text-figure font-semibold tracking-tight text-ink tabular-nums" @if ($loop->first) data-count @endif>{{ $item->value }}</dd>
                    <dt class="mt-2 text-[15px] text-muted">{{ $item->label }}</dt>
                </div>
                @endforeach
            </dl>
        </div>
    </div>
    <script>
    (function () {
        document.querySelectorAll('[data-testimonial-03]:not([data-testimonial-03-ready])').forEach(function (root) {
            root.setAttribute('data-testimonial-03-ready', '');
            var el = root.querySelector('[data-count]');
            if (!el || window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
            var text = el.textContent.trim();
            var m = text.match(/^([^\d]*)(\d[\d,]*\.?\d*)(.*)$/);
            if (!m) return;
            var end = parseFloat(m[2].replace(/,/g, ''));
            var decimals = (m[2].split('.')[1] || '').length;
            function format(n) {
                var parts = n.toFixed(decimals).split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                return m[1] + parts.join('.') + m[3];
            }
            var io = new IntersectionObserver(function (entries) {
                if (!entries[0].isIntersecting) return;
                io.disconnect();
                var start = performance.now();
                (function tick(now) {
                    var t = Math.min(1, (now - start) / 1200);
                    var eased = 1 - Math.pow(1 - t, 4);
                    el.textContent = t < 1 ? format(end * eased) : text;
                    if (t < 1) requestAnimationFrame(tick);
                })(start);
            }, { threshold: 0.4 });
            io.observe(el);
        });
    })();
    </script>
</section>
