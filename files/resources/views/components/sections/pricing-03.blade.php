@props([
    'eyebrow' => 'Pricing',
    'heading' => 'One plan, and every client is included',
    'intro' => 'Vellum is one flat price for the whole firm. No seats, no client caps, and no surprise line on the renewal.',
    'showToggle' => '1',
    'toggleLabel' => 'Billed yearly',
    'savingsText' => 'save $91',
    'planName' => 'Vellum for firms',
    'planText' => 'Document requests, e-signatures, messaging and invoicing in one portal your clients sign into once.',
    'price' => '$38',
    'priceYearly' => '$365',
    'periodMonthly' => 'per month',
    'periodYearly' => 'per year',
    'note' => 'Billed monthly. Cancel from the portal any time.',
    'noteYearly' => 'That’s $30.42 a month, paid once a year.',
    'ctaText' => 'Start a 30-day trial',
    'ctaLink' => '#',
    'includedLabel' => 'Everything included',
    'included' => [
        (object) ['title' => 'Unlimited clients and staff'],
        (object) ['title' => 'Secure document requests'],
        (object) ['title' => 'E-signed engagement letters'],
        (object) ['title' => 'Messaging with read receipts'],
        (object) ['title' => 'Invoices with card and ACH'],
        (object) ['title' => 'Deadline reminders by text'],
        (object) ['title' => 'Your domain and firm branding'],
        (object) ['title' => 'Phone support, 8 AM to 8 PM ET'],
    ],
])
<!--
    Single plan spotlight: a left opener, a small billed-yearly switch, then one bordered container — the plan name,
    a line, the price large with its period, the button and a note on the left; a recessed well on the right with a
    two-column grid of eight included features. Both prices and notes are rendered and the switch shows one.
    Clear the toggle to show the monthly price only; clear the eyebrow, intro or savings text to hide them.
-->
<section class="px-6 py-16 sm:py-28" data-pricing-03 data-billing="monthly">
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

        @if ($showToggle)
        <div class="reveal-1 mt-10 flex flex-wrap items-center gap-3" data-reveal>
            <button type="button" role="switch" aria-checked="false" aria-label="Yearly billing" class="relative h-7 w-12 shrink-0 cursor-pointer rounded-full border border-line bg-raised transition-colors duration-200 hover:border-line-strong" data-switch>
                <span class="absolute top-0.5 left-0.5 size-6 rounded-full bg-panel shadow-sm shadow-black/10" data-knob></span>
            </button>
            <button type="button" class="inline-flex cursor-pointer items-center gap-2 text-[14px] font-medium text-ink" data-set>
                {{ $toggleLabel }}
                @if ($savingsText)
                <span class="rounded-full border border-line bg-panel px-2.5 py-0.5 text-[12px] font-medium text-muted">{{ $savingsText }}</span>
                @endif
            </button>
        </div>
        @endif

        <div class="reveal-2 mt-8 grid overflow-hidden rounded-3xl border border-line bg-panel lg:grid-cols-[1fr_1.2fr]" data-reveal>
            <div class="flex flex-col p-6 sm:p-10">
                <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $planName }}</h3>
                <p class="mt-3 max-w-[44ch] text-[15px]/6 text-pretty text-muted">{{ $planText }}</p>

                <div class="mt-8 flex items-baseline gap-2" data-swap>
                    <span class="text-[3.5rem]/none font-semibold tracking-[-0.03em] text-ink tabular-nums sm:text-[4rem]/none" data-period="monthly">{{ $price }}</span>
                    <span class="text-[3.5rem]/none font-semibold tracking-[-0.03em] text-ink tabular-nums sm:text-[4rem]/none" data-period="yearly">{{ $priceYearly }}</span>
                    <span class="text-[15px] text-muted" data-period="monthly">{{ $periodMonthly }}</span>
                    <span class="text-[15px] text-muted" data-period="yearly">{{ $periodYearly }}</span>
                </div>

                <div class="mt-8 flex flex-col gap-4 sm:mt-auto sm:pt-10">
                    <a href="{{ $ctaLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto sm:self-start">{{ $ctaText }}</a>
                    <p class="text-[13px] text-faint" data-swap>
                        <span data-period="monthly">{{ $note }}</span>
                        <span data-period="yearly">{{ $noteYearly }}</span>
                    </p>
                </div>
            </div>

            <div class="border-t border-line bg-raised/70 p-6 sm:p-10 lg:border-t-0 lg:border-l">
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $includedLabel }}</p>
                <ul role="list" class="mt-6 grid gap-x-6 gap-y-3.5 text-[14px]/6 text-lede sm:grid-cols-2">
                    @foreach ($included as $item)
                    <li class="flex items-start gap-3">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-ink" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $item->title }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<style>
[data-pricing-03]:not([data-billing="yearly"]) [data-period="yearly"] { display: none; }
[data-pricing-03][data-billing="yearly"] [data-period="monthly"] { display: none; }
[data-pricing-03] [data-swap] { transition: opacity .15s ease; }
[data-pricing-03] [data-knob] { transition: translate .2s var(--ease-out-quart, ease); }
[data-pricing-03] [data-switch][aria-checked="true"] { background-color: var(--color-ink); border-color: var(--color-ink); }
[data-pricing-03] [data-switch][aria-checked="true"] [data-knob] { translate: 20px 0; }
@media (prefers-reduced-motion: reduce) {
    [data-pricing-03] [data-swap], [data-pricing-03] [data-knob] { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-pricing-03]:not([data-pricing-03-ready])').forEach(function (root) {
        root.setAttribute('data-pricing-03-ready', '');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var toggle = root.querySelector('[data-switch]');
        if (!toggle) return;
        var swaps = root.querySelectorAll('[data-swap]');
        var busy = false;
        function flip() {
            if (busy) return;
            var yearly = toggle.getAttribute('aria-checked') !== 'true';
            toggle.setAttribute('aria-checked', yearly ? 'true' : 'false');
            var apply = function () { root.setAttribute('data-billing', yearly ? 'yearly' : 'monthly'); };
            if (reduce) { apply(); return; }
            busy = true;
            swaps.forEach(function (el) { el.style.opacity = '0'; });
            setTimeout(function () {
                apply();
                swaps.forEach(function (el) { el.style.opacity = ''; });
                busy = false;
            }, 150);
        }
        toggle.addEventListener('click', flip);
        var label = root.querySelector('[data-set]');
        if (label) label.addEventListener('click', flip);
    });
})();
</script>
