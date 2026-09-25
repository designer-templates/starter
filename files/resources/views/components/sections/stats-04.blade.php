@props([
    'eyebrow' => 'Deliverability',
    'heading' => 'Delivered, and actually in the inbox',
    'intro' => 'Foxglove measures placement with seed inboxes at 14 mailbox providers, so the figure counts mail people can see, not mail a server accepted.',
    'chartTitle' => 'Inbox placement, last 90 days',
    'chartMeta' => 'Seed inboxes · 14 providers',
    'chartValue' => '98.6%',
    'chartDelta' => '+1.4 pt since June',
    'baselineLabel' => 'Industry average 84.1%',
    'axisStart' => 'Jun 15',
    'axisEnd' => 'Sep 12, 2026',
    'figures' => [
        (object) ['value' => '1.94M', 'label' => 'Messages delivered this month', 'note' => 'Across 2,140 sending domains'],
        (object) ['value' => '212 ms', 'label' => 'Median time to accepted', 'note' => 'p95 held under 900 ms all month'],
        (object) ['value' => '0.03%', 'label' => 'Hard bounce rate', 'note' => 'Suppression lists sync every 5 minutes'],
    ],
])
<!-- Stats with a chart: a split opener (heading left, intro right), then a three-column grid where a wide card holds a title, a headline figure and an inline SVG line chart with mono axis labels and a dashed baseline, and three small figure cards stack beside it. Rows come from collections.stats (value, label, note); the chart line draws once as it scrolls into view. Clear the eyebrow, intro, meta, figure note or baseline label to hide them. -->
<section class="px-6 py-16 sm:py-28" data-stats-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-5 lg:grid-cols-2 lg:items-end lg:gap-16" data-reveal>
            <div>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 max-w-[22ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            </div>
            @if ($intro)
            <p class="max-w-[50ch] text-lg/8 text-pretty text-muted lg:pb-1">{{ $intro }}</p>
            @endif
        </div>

        <div class="mt-12 grid gap-4 sm:mt-14 lg:grid-cols-3">
            <div class="reveal-1 rounded-2xl border border-line bg-panel p-6 sm:p-8 lg:col-span-2" data-reveal>
                <div class="flex flex-wrap items-baseline justify-between gap-x-6 gap-y-1">
                    <p class="text-[14px] font-medium text-muted">{{ $chartTitle }}</p>
                    @if ($chartMeta)
                    <p class="font-mono text-[12px] text-faint">{{ $chartMeta }}</p>
                    @endif
                </div>
                <div class="mt-3 flex flex-wrap items-baseline gap-x-3 gap-y-1">
                    <p class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $chartValue }}</p>
                    @if ($chartDelta)
                    <p class="text-[14px] text-muted tabular-nums">{{ $chartDelta }}</p>
                    @endif
                </div>

                <div class="mt-8 flex gap-3">
                    <div class="-my-2 flex w-9 shrink-0 flex-col justify-between text-right font-mono text-[11px]/4 text-faint tabular-nums" aria-hidden="true">
                        <span>100%</span>
                        <span>90%</span>
                        <span>80%</span>
                    </div>
                    <div class="relative min-w-0 flex-1" data-chart>
                        <svg viewBox="0 0 600 240" class="block h-auto w-full overflow-visible" aria-hidden="true">
                            <line x1="0" y1="0" x2="600" y2="0" stroke="currentColor" class="stroke-line" stroke-width="1"/>
                            <line x1="0" y1="120" x2="600" y2="120" stroke="currentColor" class="stroke-line" stroke-width="1"/>
                            <line x1="0" y1="240" x2="600" y2="240" stroke="currentColor" class="stroke-line-strong" stroke-width="1"/>
                            <path d="M0,69.6 L50,60 L100,64.8 L150,49.2 L200,43.2 L250,46.8 L300,36 L350,28.8 L400,31.2 L450,24 L500,20.4 L550,22.8 L600,16.8 L600,240 L0,240 Z" class="fill-raised" data-chart-area/>
                            <line x1="0" y1="190.8" x2="600" y2="190.8" stroke="currentColor" class="stroke-line-strong" stroke-width="1.5" stroke-dasharray="5 6"/>
                            <path d="M0,69.6 L50,60 L100,64.8 L150,49.2 L200,43.2 L250,46.8 L300,36 L350,28.8 L400,31.2 L450,24 L500,20.4 L550,22.8 L600,16.8" fill="none" stroke="currentColor" class="stroke-ink" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" pathLength="1" data-chart-line/>
                            <circle cx="600" cy="16.8" r="5" class="fill-ink" data-chart-dot/>
                        </svg>
                        @if ($baselineLabel)
                        <p class="absolute right-0 top-[79.5%] -translate-y-[calc(100%+5px)] font-mono text-[11px] text-faint">{{ $baselineLabel }}</p>
                        @endif
                    </div>
                </div>
                <div class="mt-3 flex justify-between pl-12 font-mono text-[11px] text-faint">
                    <span>{{ $axisStart }}</span>
                    <span>{{ $axisEnd }}</span>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-3 lg:auto-rows-fr lg:grid-cols-1">
                @foreach ($figures as $item)
                <div class="reveal-{{ min($loop->iteration + 1, 6) }} flex flex-col justify-between rounded-2xl border border-line bg-panel p-6" data-reveal>
                    <p class="text-[14px]/5 text-muted">{{ $item->label }}</p>
                    <div class="mt-5">
                        <p class="text-3xl font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</p>
                        @if ($item->note ?? '')
                        <p class="mt-1.5 text-[13px]/5 text-pretty text-faint">{{ $item->note }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<style>
    .js [data-stats-04] [data-chart-line] { stroke-dasharray: 1; stroke-dashoffset: 1; transition: stroke-dashoffset 1.4s var(--ease-out-quart); }
    .js [data-stats-04] [data-chart-area], .js [data-stats-04] [data-chart-dot] { opacity: 0; transition: opacity .5s ease 1.1s; }
    .js [data-stats-04] .is-drawn [data-chart-line] { stroke-dashoffset: 0; }
    .js [data-stats-04] .is-drawn [data-chart-area], .js [data-stats-04] .is-drawn [data-chart-dot] { opacity: 1; }
    @media (prefers-reduced-motion: reduce) {
        .js [data-stats-04] [data-chart-line] { stroke-dashoffset: 0; transition: none; }
        .js [data-stats-04] [data-chart-area], .js [data-stats-04] [data-chart-dot] { opacity: 1; transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-stats-04]:not([data-stats-04-ready])').forEach(function (root) {
        root.setAttribute('data-stats-04-ready', '');
        var chart = root.querySelector('[data-chart]');
        if (!chart) return;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) { chart.classList.add('is-drawn'); return; }
        var io = new IntersectionObserver(function (entries) {
            if (!entries[0].isIntersecting) return;
            io.disconnect();
            chart.classList.add('is-drawn');
        }, { threshold: 0.4 });
        io.observe(chart);
    });
})();
</script>
