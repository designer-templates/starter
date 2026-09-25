@props([
    'eyebrow' => 'Operations',
    'heading' => 'Every payment, counted the same way',
    'intro' => 'Clearfork reconciles each authorization against the processor and the bank, so the numbers here are the ones your finance close will see.',
    'colMetric' => 'Metric',
    'colValue' => 'Quarter to date',
    'colDelta' => 'vs. last quarter',
    'colTrend' => 'Last 12 weeks',
    'metrics' => [
        (object) ['label' => 'Authorizations', 'value' => '184,212', 'delta' => '+6.1%', 'points' => '61,64,63,68,70,69,74,76,75,79,82,84'],
        (object) ['label' => 'Approval rate', 'value' => '96.4%', 'delta' => '+0.8 pt', 'points' => '94.9,95.1,95.0,95.4,95.6,95.5,95.9,96.0,96.2,96.1,96.3,96.4'],
        (object) ['label' => 'Median latency', 'value' => '212 ms', 'delta' => '−14 ms', 'points' => '241,238,236,230,228,226,222,220,218,215,213,212'],
        (object) ['label' => 'Chargebacks', 'value' => '0.31%', 'delta' => '−0.05 pt', 'points' => '0.38,0.37,0.37,0.36,0.35,0.35,0.34,0.33,0.33,0.32,0.31,0.31'],
        (object) ['label' => 'Payouts settled', 'value' => '$2.84M', 'delta' => '+9.2%', 'points' => '2.31,2.36,2.40,2.44,2.49,2.55,2.58,2.63,2.69,2.74,2.79,2.84'],
        (object) ['label' => 'Active merchants', 'value' => '1,317', 'delta' => '+41', 'points' => '1204,1211,1219,1226,1240,1248,1257,1269,1281,1290,1305,1317'],
    ],
    'period' => 'Quarter to date, Jul 1–Sep 12, 2026 · refreshed nightly at 2:00 AM ET',
])
<!-- Stats as a ledger: a left opener, then one bordered card holding a mono header row, six metric rows (label, value, change with a drawn arrow, and a sparkline plotted from the row's points) and a reporting-period line. Rows come from collections.stats (label, value, delta, points); a row without a change or points shows a dash in its place. The sparklines draw in once as the card scrolls into view; the change column hides on phones. Clear the eyebrow, intro or period to hide them. -->
<section class="px-6 py-16 sm:py-28" data-stats-03>
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 max-w-[24ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="reveal-2 mt-12 overflow-hidden rounded-2xl border border-line bg-panel sm:mt-14" data-reveal>
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-line font-mono text-[11px] tracking-[0.12em] text-faint uppercase">
                        <th scope="col" class="py-3.5 pr-4 pl-5 font-normal whitespace-nowrap sm:pl-8">{{ $colMetric }}</th>
                        <th scope="col" class="w-px py-3.5 pl-6 text-right font-normal sm:pl-10 sm:whitespace-nowrap">{{ $colValue }}</th>
                        <th scope="col" class="hidden w-px py-3.5 pl-10 text-right font-normal whitespace-nowrap sm:table-cell">{{ $colDelta }}</th>
                        <th scope="col" class="w-px py-3.5 pr-5 pl-6 text-right font-normal whitespace-nowrap sm:pr-8 sm:pl-10"><span class="max-sm:sr-only">{{ $colTrend }}</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @foreach ($metrics as $item)
                    @php
                        $raw = array_values(array_filter(array_map('trim', explode(',', (string) ($item->points ?? ''))), 'strlen'));
                        $vals = array_map('floatval', $raw);
                        $n = count($vals);
                        $min = $n ? min($vals) : 0;
                        $span = ($n ? max($vals) - $min : 0) ?: 1;
                        $coords = [];
                        foreach ($vals as $i => $v) {
                            $coords[] = round($n > 1 ? $i * (92 / ($n - 1)) + 2 : 48, 1) . ',' . round(25 - (($v - $min) / $span) * 22, 1);
                        }
                        $last = $coords ? explode(',', end($coords)) : ['48', '14'];
                        $delta = trim((string) ($item->delta ?? ''));
                        $down = $delta !== '' && (str_starts_with($delta, '−') || str_starts_with($delta, '-'));
                    @endphp
                    <tr class="transition-colors duration-200 hover:bg-raised/60">
                        <th scope="row" class="py-4 pr-4 pl-5 text-[15px]/5 font-medium text-pretty text-ink sm:pl-8">{{ $item->label }}</th>
                        <td class="w-px py-4 pl-6 text-right text-[15px] text-ink tabular-nums whitespace-nowrap sm:pl-10">{{ $item->value }}</td>
                        <td class="hidden w-px py-4 pl-10 text-right font-mono text-[12px] text-muted tabular-nums whitespace-nowrap sm:table-cell">
                            @if ($delta !== '')
                            <span class="inline-flex items-center gap-1">
                                <svg viewBox="0 0 16 16" class="size-3 shrink-0 text-faint {{ $down ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 12L12 4M12 4H6M12 4v6"/></svg>
                                {{ $item->delta }}
                            </span>
                            @else
                            <span class="text-faint">—</span>
                            @endif
                        </td>
                        <td class="w-px py-4 pr-5 pl-6 text-right whitespace-nowrap sm:pr-8 sm:pl-10">
                            @if ($n > 1)
                            <svg viewBox="0 0 96 28" width="96" height="28" class="inline-block h-auto w-14 overflow-visible align-middle sm:w-24" data-spark aria-hidden="true">
                                <polyline points="{{ implode(' ', $coords) }}" pathLength="1" fill="none" stroke="currentColor" class="stroke-ink/60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="{{ $last[0] }}" cy="{{ $last[1] }}" r="2" class="fill-ink"/>
                            </svg>
                            @else
                            <span class="font-mono text-[12px] text-faint">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($period)
            <p class="border-t border-line px-5 py-3.5 text-[13px]/5 text-pretty text-faint sm:px-8">{{ $period }}</p>
            @endif
        </div>
    </div>
</section>
<style>
    .js [data-stats-03] [data-spark] polyline { stroke-dasharray: 1; stroke-dashoffset: 1; transition: stroke-dashoffset 1.1s var(--ease-out-quart) var(--spark-delay, 0ms); }
    .js [data-stats-03] [data-spark] circle { opacity: 0; transition: opacity .3s ease calc(var(--spark-delay, 0ms) + .85s); }
    .js [data-stats-03] [data-spark].is-drawn polyline { stroke-dashoffset: 0; }
    .js [data-stats-03] [data-spark].is-drawn circle { opacity: 1; }
    @media (prefers-reduced-motion: reduce) {
        .js [data-stats-03] [data-spark] polyline { stroke-dashoffset: 0; transition: none; }
        .js [data-stats-03] [data-spark] circle { opacity: 1; transition: none; }
        [data-stats-03] tr { transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-stats-03]:not([data-stats-03-ready])').forEach(function (root) {
        root.setAttribute('data-stats-03-ready', '');
        var sparks = root.querySelectorAll('[data-spark]');
        if (!sparks.length) return;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        function draw() {
            sparks.forEach(function (spark, i) {
                spark.style.setProperty('--spark-delay', (i * 90) + 'ms');
                spark.classList.add('is-drawn');
            });
        }
        if (reduce || !('IntersectionObserver' in window)) { draw(); return; }
        var table = root.querySelector('table') || root;
        var io = new IntersectionObserver(function (entries) {
            if (!entries[0].isIntersecting) return;
            io.disconnect();
            draw();
        }, { threshold: 0.2 });
        io.observe(table);
    });
})();
</script>
