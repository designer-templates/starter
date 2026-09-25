@props([
    'eyebrow' => 'Uptime monitoring',
    'heading' => 'Find out before your customers do',
    'text' => 'Vessel checks every endpoint from 14 US cities every 30 seconds, pages whoever is on call, and keeps a status page your customers can trust.',
    'buttonText' => 'Start monitoring free',
    'buttonLink' => '/signup',
    'linkText' => 'See a live status page',
    'linkUrl' => '/status',
    'benefits' => [
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z'/><path stroke-linecap='round' stroke-linejoin='round' d='M3.6 9h16.8M3.6 15h16.8M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18'/></svg>", 'title' => 'Checks from 14 cities', 'description' => 'HTTP, TCP and heartbeat checks from Denver to Raleigh, every 30 seconds.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0'/></svg>", 'title' => 'Pages the right person', 'description' => 'Escalates through the on-call rota by text, phone and chat until someone acknowledges.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'/></svg>", 'title' => 'A status page that writes itself', 'description' => 'Incidents open, update and close from your alerts, on your own domain.'],
    ],
    'stats' => [
        (object) ['value' => '99.98%', 'label' => 'of checks delivered on schedule'],
        (object) ['value' => '31 s', 'label' => 'median time to first alert'],
        (object) ['value' => '2,140', 'label' => 'teams on call with Vessel'],
    ],
])
<!--
    Type-led hero with no visual: eyebrow, an oversized left-aligned headline, intro, one primary button and an
    arrow text link. Beneath, a hairline-divided strip of three benefits (icon tile, title, one line; rows in
    benefits, bound to collections.features) and a hairline-divided row of three figures (rows in stats, bound to
    collections.stats). The first figure counts up once when it scrolls into view; the final value is in the markup.
    Clear the eyebrow, the button text or the link text to hide each.
-->
<section class="px-6 pt-20 pb-12 sm:pt-28 sm:pb-16" data-hero-03>
    <div class="mx-auto w-full max-w-6xl">
        @if ($eyebrow)
        <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
        @endif
        <h1 class="reveal-1 mt-5 max-w-4xl text-hero font-semibold tracking-[-0.04em] text-balance text-ink" data-reveal>{{ $heading }}</h1>
        <p class="reveal-2 mt-6 max-w-[54ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>

        <div class="reveal-3 mt-9 flex flex-col gap-4 sm:flex-row sm:items-center sm:gap-7" data-reveal>
            @if ($buttonText)
            <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
            @endif
            @if ($linkText)
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center justify-center gap-1.5 py-2 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-lede sm:justify-start">
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
        </div>

        <!-- Three benefits, divided by hairlines: rules between siblings, none on the outer edges. -->
        <ul role="list" class="reveal-4 mt-20 grid border-t border-line sm:mt-24 lg:grid-cols-3" data-reveal>
            @foreach ($benefits as $item)
            <li class="flex gap-4 border-b border-line py-7 lg:border-b-0 lg:border-l lg:px-8 lg:py-9 lg:[&:nth-child(3n)]:pr-0 lg:[&:nth-child(3n+1)]:border-l-0 lg:[&:nth-child(3n+1)]:pl-0 lg:[&:nth-child(n+4)]:border-t">
                <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-raised text-lede">{!! $item->icon !!}</div>
                <div>
                    <h2 class="text-base font-medium text-ink">{{ $item->title }}</h2>
                    <p class="mt-1.5 text-[14px]/6 text-pretty text-muted">{{ $item->description }}</p>
                </div>
            </li>
            @endforeach
        </ul>

        <!-- Three figures on the same hairline grid; the first is the signature stat and counts up once. -->
        <dl class="reveal-5 grid border-t border-line lg:grid-cols-3" data-reveal>
            @foreach ($stats as $stat)
            <div class="border-b border-line py-7 lg:border-b-0 lg:border-l lg:px-8 lg:py-9 lg:[&:nth-child(3n)]:pr-0 lg:[&:nth-child(3n+1)]:border-l-0 lg:[&:nth-child(3n+1)]:pl-0 lg:[&:nth-child(n+4)]:border-t">
                @if ($loop->first)
                <dd class="text-figure font-semibold tracking-tight text-ink tabular-nums" data-count>{{ $stat->value }}</dd>
                @else
                <dd class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $stat->value }}</dd>
                @endif
                <dt class="mt-2 text-[15px] text-muted">{{ $stat->label }}</dt>
            </div>
            @endforeach
        </dl>
    </div>
</section>
<script>
(function () {
    document.querySelectorAll('[data-hero-03]:not([data-hero-03-ready])').forEach(function (root) {
        root.setAttribute('data-hero-03-ready', '');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var el = root.querySelector('[data-count]');
        if (!el || reduce || !('IntersectionObserver' in window)) return;
        var text = el.textContent.trim();
        var match = text.match(/[\d,]*\d(?:\.\d+)?/);
        if (!match) return;
        var target = parseFloat(match[0].replace(/,/g, ''));
        var decimals = (match[0].split('.')[1] || '').length;
        var grouped = match[0].indexOf(',') > -1;
        function format(n) {
            var s = n.toFixed(decimals);
            if (grouped) s = s.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            return text.replace(match[0], s);
        }
        function run() {
            var start = null, duration = 1200;
            function frame(now) {
                if (start === null) start = now;
                var t = Math.min((now - start) / duration, 1);
                var eased = 1 - Math.pow(1 - t, 4);
                el.textContent = format(target * eased);
                if (t < 1) requestAnimationFrame(frame); else el.textContent = text;
            }
            requestAnimationFrame(frame);
        }
        var observer = new IntersectionObserver(function (entries) {
            if (!entries.some(function (e) { return e.isIntersecting; })) return;
            observer.disconnect();
            el.textContent = format(0);
            setTimeout(run, 350);
        }, { threshold: 0.4 });
        observer.observe(el);
    });
})();
</script>
