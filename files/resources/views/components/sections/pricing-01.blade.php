@props([
    'eyebrow' => 'Pricing',
    'heading' => 'One price per studio, not per seat',
    'intro' => 'Unlimited clients and invoices on every plan. Add people for free, and pay yearly for two months on us.',
    'showToggle' => '1',
    'monthlyLabel' => 'Monthly',
    'yearlyLabel' => 'Yearly',
    'savingsPill' => '2 months free',
    'periodMonthly' => 'per month',
    'periodYearly' => 'per year',
    'badgeText' => 'Most studios',
    'footnote' => 'Prices in US dollars. Card and ACH payments clear through your own processor at its rates. Cancel from settings in one click.',
    'plans' => [
        (object) [
            'name' => 'Solo',
            'description' => 'For one designer who bills a handful of clients a month.',
            'price' => '$17',
            'priceYearly' => '$170',
            'note' => 'or $170 a year — two months free',
            'noteYearly' => '$14.17 a month, billed yearly',
            'features' => "1 person\nUnlimited clients and invoices\nCard and ACH payments\nReminders on a schedule you set\nEmail support",
            'ctaText' => 'Start a 14-day trial',
            'ctaLink' => '#',
            'featured' => 'no',
        ],
        (object) [
            'name' => 'Studio',
            'description' => 'For a studio of two to eight with retainers to keep straight.',
            'price' => '$41',
            'priceYearly' => '$410',
            'note' => 'or $410 a year — two months free',
            'noteYearly' => '$34.17 a month, billed yearly',
            'features' => "Everything in Solo\nUp to 8 people\nRetainers and deposits\nTime tracking on every project\nSame-day support",
            'ctaText' => 'Start a 14-day trial',
            'ctaLink' => '#',
            'featured' => 'yes',
        ],
        (object) [
            'name' => 'Agency',
            'description' => 'For agencies that bill from several entities and offices.',
            'price' => '$113',
            'priceYearly' => '$1,130',
            'note' => 'or $1,130 a year — two months free',
            'noteYearly' => '$94.17 a month, billed yearly',
            'features' => "Everything in Studio\nUnlimited people\nBilling from several entities\nApprovals and a full audit history\nA named account lead",
            'ctaText' => 'Book a walkthrough',
            'ctaLink' => '#',
            'featured' => 'no',
        ],
    ],
])
<!--
    Three plans under a Monthly / Yearly switch: a centred opener, the switch with a savings pill, then three
    cards — the featured plan is outlined in ink, lifted on desktop, and carries the badge and the one filled button.
    Rows come from the plans collection (features one per line; both prices and notes are rendered and the switch
    shows one). Clear the toggle to show monthly prices only; clear the badge, pill, eyebrow or footnote to hide them.
-->
<section class="px-6 py-16 sm:py-28" data-pricing-01 data-billing="monthly">
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mx-auto mt-4 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        @if ($showToggle)
        <div class="reveal-1 mt-10 flex flex-wrap items-center justify-center gap-3" data-reveal>
            <button type="button" class="cursor-pointer text-[14px] font-medium text-ink transition-colors duration-200" data-label="monthly" data-set="monthly">{{ $monthlyLabel }}</button>
            <button type="button" role="switch" aria-checked="false" aria-label="Yearly billing" class="relative h-7 w-12 shrink-0 cursor-pointer rounded-full border border-line bg-raised transition-colors duration-200 hover:border-line-strong" data-switch>
                <span class="absolute top-0.5 left-0.5 size-6 rounded-full bg-panel shadow-sm shadow-black/10" data-knob></span>
            </button>
            <button type="button" class="inline-flex cursor-pointer items-center gap-2 text-[14px] font-medium text-muted transition-colors duration-200" data-label="yearly" data-set="yearly">
                {{ $yearlyLabel }}
                @if ($savingsPill)
                <span class="rounded-full border border-line bg-panel px-2.5 py-0.5 text-[12px] font-medium text-muted">{{ $savingsPill }}</span>
                @endif
            </button>
        </div>
        @endif

        <div class="mx-auto mt-14 grid w-full max-w-md gap-5 sm:mt-16 lg:max-w-none lg:grid-cols-3">
            @foreach ($plans as $plan)
            <div class="reveal-{{ min($loop->iteration + 1, 6) }} relative flex flex-col rounded-2xl border bg-panel p-6 transition-[border-color,box-shadow] duration-200 hover:shadow-[var(--shadow-card)] sm:p-8 {{ $plan->featured == 'yes' ? 'border-ink ring-1 ring-ink lg:-translate-y-2' : 'border-line hover:border-line-strong' }}" data-reveal>
                @if ($plan->featured == 'yes' && $badgeText)
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-ink px-3 py-1 text-[11px] font-semibold tracking-[0.08em] whitespace-nowrap text-canvas uppercase">{{ $badgeText }}</span>
                @endif
                <h3 class="text-base font-medium text-ink">{{ $plan->name }}</h3>
                <p class="mt-2 min-h-12 text-[14px]/6 text-pretty text-muted">{{ $plan->description }}</p>

                <div class="mt-6">
                    <div class="flex items-baseline gap-1.5" data-swap>
                        <span class="text-[2.75rem]/none font-semibold tracking-tight text-ink tabular-nums" data-period="monthly">{{ $plan->price }}</span>
                        <span class="text-[2.75rem]/none font-semibold tracking-tight text-ink tabular-nums" data-period="yearly">{{ $plan->priceYearly }}</span>
                        <span class="text-[14px] text-muted" data-period="monthly">{{ $periodMonthly }}</span>
                        <span class="text-[14px] text-muted" data-period="yearly">{{ $periodYearly }}</span>
                    </div>
                    <p class="mt-3 text-[13px] text-faint" data-swap>
                        <span data-period="monthly">{{ $plan->note }}</span>
                        <span data-period="yearly">{{ $plan->noteYearly }}</span>
                    </p>
                </div>

                <ul role="list" class="mt-7 mb-8 flex flex-col gap-3 border-t border-line pt-7 text-[14px]/6 text-lede">
                    @foreach (preg_split('/\R/', trim((string) $plan->features)) as $feature)
                    <li class="flex items-start gap-3">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                @if ($plan->featured == 'yes')
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $plan->ctaText }}</a>
                @else
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $plan->ctaText }}</a>
                @endif
            </div>
            @endforeach
        </div>

        @if ($footnote)
        <p class="reveal-5 mx-auto mt-10 max-w-[64ch] text-center text-[14px]/6 text-pretty text-faint" data-reveal>{{ $footnote }}</p>
        @endif
    </div>
</section>
<style>
[data-pricing-01]:not([data-billing="yearly"]) [data-period="yearly"] { display: none; }
[data-pricing-01][data-billing="yearly"] [data-period="monthly"] { display: none; }
[data-pricing-01] [data-swap] { transition: opacity .15s ease; }
[data-pricing-01] [data-knob] { transition: translate .2s var(--ease-out-quart, ease); }
[data-pricing-01] [data-switch][aria-checked="true"] { background-color: var(--color-ink); border-color: var(--color-ink); }
[data-pricing-01] [data-switch][aria-checked="true"] [data-knob] { translate: 20px 0; }
[data-pricing-01][data-billing="yearly"] [data-label="monthly"], [data-pricing-01]:not([data-billing="yearly"]) [data-label="yearly"] { color: var(--color-muted); }
[data-pricing-01][data-billing="yearly"] [data-label="yearly"], [data-pricing-01]:not([data-billing="yearly"]) [data-label="monthly"] { color: var(--color-ink); }
@media (prefers-reduced-motion: reduce) {
    [data-pricing-01] [data-swap], [data-pricing-01] [data-knob], [data-pricing-01] [data-label] { transition: none; }
}
</style>
<script>
(function () {
    document.querySelectorAll('[data-pricing-01]:not([data-pricing-01-ready])').forEach(function (root) {
        root.setAttribute('data-pricing-01-ready', '');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var toggle = root.querySelector('[data-switch]');
        if (!toggle) return;
        var swaps = root.querySelectorAll('[data-swap]');
        var busy = false;
        function set(yearly) {
            if (busy || (root.getAttribute('data-billing') === 'yearly') === yearly) return;
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
        toggle.addEventListener('click', function () { set(toggle.getAttribute('aria-checked') !== 'true'); });
        root.querySelectorAll('[data-set]').forEach(function (label) {
            label.addEventListener('click', function () { set(label.getAttribute('data-set') === 'yearly'); });
        });
    });
})();
</script>
