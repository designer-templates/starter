@props([
    'eyebrow' => 'Compare plans',
    'heading' => 'Every plan, row by row',
    'intro' => 'Three plans for shops that answer their own tickets. Start on Shop and move up when the inbox does.',
    'period' => 'per month',
    'moreLabel' => 'Compare everything',
    'lessLabel' => 'Show fewer rows',
    'plans' => [
        (object) ['name' => 'Shop', 'price' => '$27', 'ctaText' => 'Start a trial', 'ctaLink' => '#', 'featured' => 'no'],
        (object) ['name' => 'Growth', 'price' => '$79', 'ctaText' => 'Start a trial', 'ctaLink' => '#', 'featured' => 'yes'],
        (object) ['name' => 'Scale', 'price' => '$214', 'ctaText' => 'Talk to sales', 'ctaLink' => '#', 'featured' => 'no'],
    ],
    'rows' => [
        (object) ['group' => 'Inbox', 'feature' => 'Shared inbox for email and chat', 'plan1' => 'yes', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Inbox', 'feature' => 'Order lookup inside a ticket', 'plan1' => 'yes', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Inbox', 'feature' => 'Seats', 'plan1' => '3', 'plan2' => '10', 'plan3' => 'Unlimited'],
        (object) ['group' => 'Automation', 'feature' => 'Saved replies', 'plan1' => '25', 'plan2' => 'Unlimited', 'plan3' => 'Unlimited'],
        (object) ['group' => 'Automation', 'feature' => 'Rules and routing', 'plan1' => 'no', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Automation', 'feature' => 'Auto-tagging by order status', 'plan1' => 'no', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Support', 'feature' => 'Email support', 'plan1' => 'yes', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Support', 'feature' => 'Phone support, 9 AM to 6 PM ET', 'plan1' => 'no', 'plan2' => 'no', 'plan3' => 'yes'],
    ],
    'moreRows' => [
        (object) ['group' => 'Channels', 'feature' => 'Instagram and Facebook messages', 'plan1' => 'no', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Channels', 'feature' => 'SMS replies', 'plan1' => 'no', 'plan2' => 'no', 'plan3' => 'yes'],
        (object) ['group' => 'Reporting', 'feature' => 'Reply-time reports', 'plan1' => 'yes', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Reporting', 'feature' => 'CSV export', 'plan1' => 'no', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Security', 'feature' => 'Two-factor sign-in', 'plan1' => 'yes', 'plan2' => 'yes', 'plan3' => 'yes'],
        (object) ['group' => 'Security', 'feature' => 'SAML SSO', 'plan1' => 'no', 'plan2' => 'no', 'plan3' => 'yes'],
    ],
])
<!--
    Comparison table: a left opener, then one table — feature names down the first column grouped under a mono
    label, a column per plan with its price and a compact button in the head row (sticky under a 64px header on
    desktop), and cells that show a check, a dash or a value. Eight rows show; a "Compare everything" button reveals
    six more in place. Plan columns come from the plans collection; the feature rows and the extra rows are two lists
    whose plan1 / plan2 / plan3 values map to the columns in order (yes = check, no = dash, anything else as written).
    The featured plan's column is tinted and carries the filled button. On phones the table scrolls sideways with the
    feature column pinned. Clear the eyebrow or intro to hide them.
-->
@php
    $cols = 1; $featuredCols = [];
    foreach ($plans as $plan) { if (($plan->featured ?? 'no') == 'yes') { $featuredCols[] = $cols; } $cols++; }
@endphp
<section class="px-6 py-16 sm:py-28" data-pricing-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="reveal-1 -mx-6 mt-12 overflow-x-auto sm:mt-14 lg:mx-0 lg:overflow-visible" data-reveal>
            <table class="w-full min-w-[45rem] table-fixed border-collapse text-left lg:min-w-0">
                <thead>
                    <tr class="border-b border-line-strong">
                        <th scope="col" class="sticky left-0 z-30 w-[11.5rem] bg-canvas p-0 align-bottom lg:top-16 lg:w-[34%]"><span class="sr-only">Feature</span></th>
                        @foreach ($plans as $plan)
                        <th scope="col" class="bg-canvas p-0 align-bottom last:pr-3 lg:sticky lg:top-16 lg:z-20 lg:last:pr-0">
                            <div class="px-3 pt-6 pb-5 lg:px-4 {{ $plan->featured == 'yes' ? 'rounded-t-2xl bg-raised/60' : '' }}">
                                <p class="text-[14px] font-medium text-ink">{{ $plan->name }}</p>
                                <p class="mt-2 flex items-baseline gap-1.5">
                                    <span class="text-3xl font-semibold tracking-tight text-ink tabular-nums">{{ $plan->price }}</span>
                                    <span class="text-[13px] font-normal whitespace-nowrap text-muted">{{ $period }}</span>
                                </p>
                                @if ($plan->featured == 'yes')
                                <a href="{{ $plan->ctaLink }}" class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2 text-[14px] font-medium text-canvas shadow-lg lg:whitespace-nowrap shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $plan->ctaText }}</a>
                                @else
                                <a href="{{ $plan->ctaLink }}" class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-4 py-2 text-[14px] font-medium text-lede transition-colors lg:whitespace-nowrap duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $plan->ctaText }}</a>
                                @endif
                            </div>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-line border-b border-line">
                    @php $group = null; @endphp
                    @foreach ($rows as $row)
                    @if ($row->group && $row->group !== $group)
                    @php $group = $row->group; @endphp
                    <tr>
                        <th scope="row" class="sticky left-0 z-10 bg-canvas pt-8 pb-3 pl-6 text-left font-mono text-[11px] font-medium tracking-[0.12em] text-faint uppercase lg:pl-0">{{ $row->group }}</th>
                        @for ($i = 1; $i < $cols; $i++)
                        <td class="last:pr-3 lg:last:pr-0 {{ in_array($i, $featuredCols) ? 'bg-raised/60' : '' }}"></td>
                        @endfor
                    </tr>
                    @endif
                    <tr>
                        <th scope="row" class="sticky left-0 z-10 bg-canvas py-3.5 pr-3 pl-6 text-left text-[15px] font-normal text-ink lg:pr-4 lg:pl-0">{{ $row->feature }}</th>
                        @for ($i = 1; $i < $cols; $i++)
                        @php $value = trim((string) ($row->{'plan' . $i} ?? '')); @endphp
                        <td class="px-3 py-3.5 text-[15px] text-lede last:pr-6 lg:px-4 lg:last:pr-4 {{ in_array($i, $featuredCols) ? 'bg-raised/60' : '' }}">
                            @if (strtolower($value) === 'yes')
                            <svg viewBox="0 0 24 24" class="size-5 text-ink" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg><span class="sr-only">Included</span>
                            @elseif ($value === '' || strtolower($value) === 'no')
                            <span class="text-faint" aria-hidden="true">—</span><span class="sr-only">Not included</span>
                            @else
                            {{ $value }}
                            @endif
                        </td>
                        @endfor
                    </tr>
                    @endforeach
                    @php $group = null; @endphp
                    @foreach ($moreRows as $row)
                    @if ($row->group && $row->group !== $group)
                    @php $group = $row->group; @endphp
                    <tr data-more>
                        <th scope="row" class="sticky left-0 z-10 bg-canvas pt-8 pb-3 pl-6 text-left font-mono text-[11px] font-medium tracking-[0.12em] text-faint uppercase lg:pl-0">{{ $row->group }}</th>
                        @for ($i = 1; $i < $cols; $i++)
                        <td class="last:pr-3 lg:last:pr-0 {{ in_array($i, $featuredCols) ? 'bg-raised/60' : '' }}"></td>
                        @endfor
                    </tr>
                    @endif
                    <tr data-more>
                        <th scope="row" class="sticky left-0 z-10 bg-canvas py-3.5 pr-3 pl-6 text-left text-[15px] font-normal text-ink lg:pr-4 lg:pl-0">{{ $row->feature }}</th>
                        @for ($i = 1; $i < $cols; $i++)
                        @php $value = trim((string) ($row->{'plan' . $i} ?? '')); @endphp
                        <td class="px-3 py-3.5 text-[15px] text-lede last:pr-6 lg:px-4 lg:last:pr-4 {{ in_array($i, $featuredCols) ? 'bg-raised/60' : '' }}">
                            @if (strtolower($value) === 'yes')
                            <svg viewBox="0 0 24 24" class="size-5 text-ink" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg><span class="sr-only">Included</span>
                            @elseif ($value === '' || strtolower($value) === 'no')
                            <span class="text-faint" aria-hidden="true">—</span><span class="sr-only">Not included</span>
                            @else
                            {{ $value }}
                            @endif
                        </td>
                        @endfor
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="{{ $cols }}" class="pt-6 pl-6 lg:pl-0">
                            <button type="button" aria-expanded="false" class="sticky left-0 inline-flex cursor-pointer items-center gap-2 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-muted" data-more-toggle>
                                <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current text-muted" data-more-glyph aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                                <span data-more-label>{{ $moreLabel }}</span>
                                <span data-less-label>{{ $lessLabel }}</span>
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<style>
.js [data-pricing-04]:not([data-expanded]) [data-more] { display: none; }
[data-pricing-04] [data-less-label], [data-pricing-04][data-expanded] [data-more-label] { display: none; }
[data-pricing-04][data-expanded] [data-less-label] { display: inline; }
html:not(.js) [data-pricing-04] [data-more-toggle] { display: none; }
[data-pricing-04] [data-more-glyph] { transition: rotate .3s var(--ease-out-quart, ease); }
[data-pricing-04][data-expanded] [data-more-glyph] { rotate: 45deg; }
[data-pricing-04][data-expanded] [data-more] { animation: pricing-04-in .3s ease both; }
@keyframes pricing-04-in { from { opacity: 0; } }
@media (prefers-reduced-motion: reduce) {
    [data-pricing-04] [data-more-glyph] { transition: none; }
    [data-pricing-04][data-expanded] [data-more] { animation: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-pricing-04]:not([data-pricing-04-ready])').forEach(function (root) {
        root.setAttribute('data-pricing-04-ready', '');
        var button = root.querySelector('[data-more-toggle]');
        if (!button) return;
        button.addEventListener('click', function () {
            var open = !root.hasAttribute('data-expanded');
            if (open) { root.setAttribute('data-expanded', ''); } else { root.removeAttribute('data-expanded'); }
            button.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });
})();
</script>
