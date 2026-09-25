@props([
    'heading' => 'Payroll that closes on Tuesday, not Friday',
    'body' => 'Elkhorn pulls every shift from the POS, splits the tip pool by the house rules, and files in all 50 states. Managers approve from a phone between the lunch and dinner rush.',
    'detail' => 'The figures are the average across 612 restaurant groups over the last four pay periods, not a launch-week best.',
    'linkText' => 'Read the customer stories',
    'linkUrl' => '/customers',
    'figures' => [
        (object) ['value' => '3.1 hrs', 'label' => 'To close a pay run', 'note' => 'Down from 11.4 hours on spreadsheets'],
        (object) ['value' => '$41,700', 'label' => 'Tips reconciled per location each month', 'note' => 'Split to the cent by the house rules'],
        (object) ['value' => '0.04%', 'label' => 'Pay runs corrected after filing', 'note' => 'Across 18,300 runs so far this year'],
        (object) ['value' => '6,120', 'label' => 'Workers paid in the last cycle', 'note' => 'Direct deposit lands by 6:00 AM ET Friday'],
    ],
])
<!-- Stats beside a paragraph: a five-column text side (heading, two paragraphs, an arrow link) and a seven-column two-by-two grid of figures separated by hairlines, each with a label and one line of context. Rows come from collections.stats (value, label, note). Clear the second paragraph or the link text to hide them. -->
<section class="px-6 py-16 sm:py-28" data-stats-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-14 lg:grid-cols-12 lg:gap-20">
            <div class="lg:col-span-5" data-reveal>
                <h2 class="max-w-[22ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $body }}</p>
                @if ($detail)
                <p class="mt-4 max-w-[50ch] text-[15px]/6 text-pretty text-muted">{{ $detail }}</p>
                @endif
                @if ($linkText)
                <a href="{{ $linkUrl }}" class="arrow-link mt-8 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink">
                    {{ $linkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:col-span-7">
                @foreach ($figures as $item)
                <div class="reveal-{{ min($loop->iteration, 6) }} border-t border-line py-7 first:border-t-0 first:pt-0 last:pb-0 sm:border-t-0 sm:py-0 sm:[&:nth-child(2n)]:border-l sm:[&:nth-child(2n)]:pl-10 sm:[&:nth-child(2n+1)]:pr-10 sm:[&:nth-child(n+3)]:border-t sm:[&:nth-child(n+3)]:pt-10 sm:[&:nth-child(-n+2)]:pb-10" data-reveal>
                    <p class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</p>
                    <p class="mt-3 max-w-[22ch] text-[15px]/6 text-pretty text-muted">{{ $item->label }}</p>
                    @if ($item->note ?? '')
                    <p class="mt-1 max-w-[26ch] text-[13px]/5 text-pretty text-faint">{{ $item->note }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
