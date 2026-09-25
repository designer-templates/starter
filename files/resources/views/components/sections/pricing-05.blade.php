@props([
    'eyebrow' => 'Pricing',
    'heading' => 'Pay for the invoices you send',
    'intro' => 'Slide to your volume. Every tier has the same features; only the number of invoices changes.',
    'sliderHint' => 'Drag to set your volume',
    'period' => 'per month',
    'note' => 'Overage is $0.04 an invoice, never a forced upgrade.',
    'ctaText' => 'Start with 500 free',
    'ctaLink' => '#',
    'questionsHeading' => 'Before you pick a tier',
    'contactText' => 'Over 25,000 a month? Talk to us',
    'contactLink' => '#',
    'tiers' => [
        (object) ['volume' => '500', 'label' => 'Up to 500 invoices a month', 'price' => '$31', 'start' => 'no'],
        (object) ['volume' => '1k', 'label' => 'Up to 1,000 invoices a month', 'price' => '$52', 'start' => 'no'],
        (object) ['volume' => '2.5k', 'label' => 'Up to 2,500 invoices a month', 'price' => '$94', 'start' => 'yes'],
        (object) ['volume' => '5k', 'label' => 'Up to 5,000 invoices a month', 'price' => '$161', 'start' => 'no'],
        (object) ['volume' => '10k', 'label' => 'Up to 10,000 invoices a month', 'price' => '$268', 'start' => 'no'],
        (object) ['volume' => '25k', 'label' => 'Up to 25,000 invoices a month', 'price' => '$497', 'start' => 'no'],
    ],
    'included' => [
        (object) ['title' => 'Card, ACH and wire', 'text' => 'Processor fees pass through at cost. We add nothing on top.'],
        (object) ['title' => 'Sales tax on every line', 'text' => 'Rates for 11,400 US jurisdictions, filed by you or by us.'],
        (object) ['title' => 'Reminders that know when to stop', 'text' => 'Three nudges over 21 days, then a pause, never a fourth.'],
    ],
    'questions' => [
        (object) ['question' => 'What counts as an invoice?', 'answer' => 'One document sent to one customer, whether it is paid, voided or resent. Drafts and previews are free.'],
        (object) ['question' => 'What happens when I go over?', 'answer' => 'Nothing stops. Each invoice past your tier is $0.04, itemized on your next bill, and we email you at 80 percent.'],
        (object) ['question' => 'Can I change tiers mid-month?', 'answer' => 'Yes. Moving up applies at once and is prorated; moving down takes effect on the first of the next month.'],
    ],
])
<!--
    Usage slider: a left opener, then a card with a range input over the tiers — the volume line and the price
    update as it moves — three included-feature rows and one button; beside it a short list of three questions in
    native details and an arrow link. Tiers are rows (volume is the tick label, start marks the tier shown first);
    the included rows and the questions are their own lists. Clear the eyebrow, intro, hint, note or contact link to hide them.
-->
@php
    $start = null; $startIndex = 0; $tierCount = 0;
    foreach ($tiers as $tier) {
        if ($start === null || ($tier->start ?? 'no') === 'yes') { $start = $tier; $startIndex = $tierCount; }
        $tierCount++;
    }
    $fill = $tierCount > 1 ? round($startIndex / ($tierCount - 1) * 100, 1) : 0;
@endphp
<section class="px-6 py-16 sm:py-28" data-pricing-05>
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

        <div class="mt-12 grid gap-10 sm:mt-14 lg:grid-cols-[1.35fr_1fr] lg:gap-16">
            <div class="reveal-1 rounded-2xl border border-line bg-panel p-6 transition-[border-color,box-shadow] duration-200 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:p-8" data-reveal>
                <div class="flex flex-wrap items-baseline justify-between gap-x-6 gap-y-1">
                    <p class="text-[15px] font-medium text-ink" data-volume>{{ $start->label ?? '' }}</p>
                    @if ($sliderHint)
                    <p class="text-[13px] text-faint">{{ $sliderHint }}</p>
                    @endif
                </div>
                <input type="range" min="0" max="{{ max($tierCount - 1, 0) }}" step="1" value="{{ $startIndex }}" aria-label="Invoices a month" aria-valuetext="{{ $start->label ?? '' }}" class="mt-4 w-full" style="--fill: {{ $fill }}%" data-range>
                <ol class="mt-2 flex justify-between px-1 font-mono text-[11px] text-faint" aria-hidden="true">
                    @foreach ($tiers as $tier)
                    <li class="transition-colors duration-200" data-tier data-tier-price="{{ $tier->price }}" data-tier-label="{{ $tier->label }}" {{ $loop->index === $startIndex ? 'data-active' : '' }}>{{ $tier->volume }}</li>
                    @endforeach
                </ol>

                <div class="mt-8 flex items-baseline gap-2">
                    <span class="text-[3rem]/none font-semibold tracking-[-0.03em] text-ink tabular-nums sm:text-[3.5rem]/none" data-price>{{ $start->price ?? '' }}</span>
                    <span class="text-[15px] text-muted">{{ $period }}</span>
                </div>
                @if ($note)
                <p class="mt-3 text-[13px] text-faint">{{ $note }}</p>
                @endif

                <ul role="list" class="mt-8 divide-y divide-line border-t border-line">
                    @foreach ($included as $item)
                    <li class="flex items-start gap-3 py-4">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-ink" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <div>
                            <p class="text-[15px] font-medium text-ink">{{ $item->title }}</p>
                            <p class="mt-0.5 text-[14px]/6 text-pretty text-muted">{{ $item->text }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <a href="{{ $ctaLink }}" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $ctaText }}</a>
            </div>

            <div class="reveal-2 lg:pt-2" data-reveal>
                <h3 class="text-base font-medium text-ink">{{ $questionsHeading }}</h3>
                <div class="mt-4 divide-y divide-line border-y border-line">
                    @foreach ($questions as $item)
                    <details class="faq-item group">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-4 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-muted">
                            {{ $item->question }}
                            <svg viewBox="0 0 16 16" class="faq-plus size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                        </summary>
                        <p class="max-w-[52ch] pb-5 text-[14px]/6 text-pretty text-muted">{{ $item->answer }}</p>
                    </details>
                    @endforeach
                </div>
                @if ($contactText)
                <a href="{{ $contactLink }}" class="arrow-link mt-6 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-muted">
                    {{ $contactText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
<style>
[data-pricing-05] [data-range] { -webkit-appearance: none; appearance: none; height: 28px; background: transparent; cursor: pointer; }
[data-pricing-05] [data-range]::-webkit-slider-runnable-track { height: 4px; border-radius: 9999px; background: linear-gradient(to right, var(--color-ink) var(--fill, 0%), var(--color-line) var(--fill, 0%)); }
[data-pricing-05] [data-range]::-moz-range-track { height: 4px; border-radius: 9999px; background: var(--color-line); }
[data-pricing-05] [data-range]::-moz-range-progress { height: 4px; border-radius: 9999px; background: var(--color-ink); }
[data-pricing-05] [data-range]::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 22px; height: 22px; margin-top: -9px; border-radius: 9999px; background: var(--color-panel); border: 1.5px solid var(--color-ink); box-shadow: 0 1px 3px var(--color-line-strong); transition: scale .2s var(--ease-out-quart, ease); }
[data-pricing-05] [data-range]::-moz-range-thumb { width: 22px; height: 22px; border-radius: 9999px; background: var(--color-panel); border: 1.5px solid var(--color-ink); box-shadow: 0 1px 3px var(--color-line-strong); transition: scale .2s var(--ease-out-quart, ease); }
[data-pricing-05] [data-range]:hover::-webkit-slider-thumb, [data-pricing-05] [data-range]:active::-webkit-slider-thumb { scale: 1.1; }
[data-pricing-05] [data-range]:hover::-moz-range-thumb, [data-pricing-05] [data-range]:active::-moz-range-thumb { scale: 1.1; }
[data-pricing-05] [data-tier][data-active] { color: var(--color-ink); font-weight: 500; }
@media (prefers-reduced-motion: reduce) {
    [data-pricing-05] [data-range]::-webkit-slider-thumb, [data-pricing-05] [data-range]::-moz-range-thumb, [data-pricing-05] [data-tier] { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-pricing-05]:not([data-pricing-05-ready])').forEach(function (root) {
        root.setAttribute('data-pricing-05-ready', '');
        var range = root.querySelector('[data-range]');
        var tiers = root.querySelectorAll('[data-tier]');
        var price = root.querySelector('[data-price]');
        var volume = root.querySelector('[data-volume]');
        if (!range || !tiers.length || !price || !volume) return;
        range.max = tiers.length - 1;
        function paint() {
            var i = Math.max(0, Math.min(Number(range.value) || 0, tiers.length - 1));
            var tier = tiers[i];
            tiers.forEach(function (t, n) { if (n === i) { t.setAttribute('data-active', ''); } else { t.removeAttribute('data-active'); } });
            range.style.setProperty('--fill', (tiers.length > 1 ? (i / (tiers.length - 1)) * 100 : 0) + '%');
            range.setAttribute('aria-valuetext', tier.getAttribute('data-tier-label') || '');
            price.textContent = tier.getAttribute('data-tier-price') || '';
            volume.textContent = tier.getAttribute('data-tier-label') || '';
        }
        range.addEventListener('input', paint);
        tiers.forEach(function (t, n) {
            t.style.cursor = 'pointer';
            t.addEventListener('click', function () { range.value = n; paint(); });
        });
    });
})();
</script>
