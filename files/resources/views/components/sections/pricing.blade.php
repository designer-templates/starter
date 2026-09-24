@props([
    'eyebrow' => 'Pricing',
    'heading' => 'Simple, transparent pricing',
    'subheading' => 'Start free and build for as long as you like. Upgrade when you are ready to build without limits. Yearly billing gets two months free.',
    'showToggle' => '1',
    'monthlyLabel' => 'Monthly',
    'yearlyLabel' => 'Yearly',
    'yearlySavings' => '−17%',
    'periodMonthly' => 'per month',
    'periodYearly' => 'per year',
    'badgeText' => 'Most popular',
    'footnote' => 'Every plan includes the full section library, your code in your repo, and no lock-in. Secure checkout by Stripe. Cancel anytime.',
    'plans' => [],
])
<!--
    Centered heading, a Monthly / Yearly toggle, then three bordered tier cards: name, who it is for,
    the price with its period and a note, a checklist, and the button. The featured plan is outlined in ink
    with a badge. Rows live in resources/data/collections/plans.json; main.js flips data-billing on the section
    and site.css shows the matching price and note. Clear the toggle to show monthly prices only.
-->
<section id="pricing" class="scroll-mt-20 px-6 py-24 sm:py-32" data-pricing data-billing="monthly">
    <div class="mx-auto w-full max-w-6xl">
        <x-heading 
            :eyebrow="$eyebrow"
            :heading="$heading"
            :paragraph="$subheading"
        />

        @if ($showToggle)
        <div class="reveal-1 mt-9 flex justify-center" data-reveal>
            <div class="inline-flex items-center rounded-full border border-line bg-raised p-1" role="group" aria-label="Billing period">
                <button type="button" data-billing-option="monthly" aria-pressed="true" class="billing-option cursor-pointer rounded-full px-5 py-2 text-[14px] font-medium text-muted transition-colors duration-200 hover:text-ink">{{ $monthlyLabel }}</button>
                <button type="button" data-billing-option="yearly" aria-pressed="false" class="billing-option flex cursor-pointer items-center gap-2 rounded-full px-5 py-2 text-[14px] font-medium text-muted transition-colors duration-200 hover:text-ink">
                    {{ $yearlyLabel }}
                    @if ($yearlySavings)
                    <span class="rounded-full bg-up/10 px-2 py-0.5 text-[11px] font-semibold text-up tabular-nums">{{ $yearlySavings }}</span>
                    @endif
                </button>
            </div>
        </div>
        @endif

        <div class="mx-auto mt-14 grid w-full max-w-md gap-5 sm:mt-16 lg:max-w-none lg:grid-cols-3">
            @foreach ($plans as $plan)
            @if ($plan->featured == 'yes')
            <div class="reveal-{{ min($loop->iteration, 6) }} relative flex flex-col rounded-3xl border border-ink bg-panel p-8 ring-1 ring-ink" data-reveal>
                @if ($badgeText)
                <span class="absolute -top-3.5 right-7 rounded-full bg-ink px-3 py-1.5 text-[11px] font-semibold tracking-wider text-canvas uppercase">{{ $badgeText }}</span>
                @endif
            @else
            <div class="reveal-{{ min($loop->iteration, 6) }} relative flex flex-col rounded-3xl border border-line bg-panel p-8" data-reveal>
            @endif
                <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $plan->name }}</h3>
                <p class="mt-3 min-h-12 text-[15px]/6 text-pretty text-muted">{{ $plan->description }}</p>

                <div class="mt-7">
                    <div class="flex items-end gap-2">
                        <span data-price="monthly" class="text-[2.75rem]/none font-semibold tracking-tight text-ink tabular-nums">{{ $plan->price }}</span>
                        <span data-price="yearly" class="text-[2.75rem]/none font-semibold tracking-tight text-ink tabular-nums">{{ $plan->priceYearly }}</span>
                        <span data-price="monthly" class="pb-1 text-[13px]/4 text-muted">{{ $periodMonthly }}</span>
                        <span data-price="yearly" class="pb-1 text-[13px]/4 text-muted">{{ $periodYearly }}</span>
                    </div>
                    <p data-price="monthly" class="mt-3 text-[13px] text-faint">{{ $plan->note }}</p>
                    <p data-price="yearly" class="mt-3 text-[13px] text-faint">{{ $plan->noteYearly }}</p>
                </div>

                <ul role="list" class="mt-8 mb-10 flex flex-col gap-3.5 text-[15px]/6 text-lede">
                    @foreach (preg_split('/\R/', trim((string) $plan->features)) as $feature)
                    <li class="flex items-start gap-3">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                @if ($plan->featured == 'yes')
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center rounded-xl bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $plan->ctaText }}</a>
                @else
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center rounded-xl border border-line bg-panel px-6 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $plan->ctaText }}</a>
                @endif
            </div>
            @endforeach
        </div>

        @if ($footnote)
        <p class="mx-auto mt-10 max-w-[64ch] text-center text-[14px]/6 text-pretty text-faint" data-reveal>{{ $footnote }}</p>
        @endif
    </div>
</section>
