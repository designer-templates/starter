@props([
    'heading' => 'Two plans. One number for everything else.',
    'intro' => 'Every plan checks from 11 US regions every 30 seconds and hosts a status page on your own domain.',
    'period' => 'per month',
    'showEnterprise' => '1',
    'enterpriseTitle' => 'Enterprise',
    'enterpriseText' => 'Single sign-on, a signed DPA, private status pages and a 99.99% commitment you can hold us to.',
    'enterpriseCtaText' => 'Talk to sales',
    'enterpriseCtaLink' => '#',
    'enterpriseFeatures' => [
        (object) ['text' => 'SAML SSO and SCIM'],
        (object) ['text' => 'Signed DPA, 99.99% SLA'],
        (object) ['text' => 'Private status pages'],
        (object) ['text' => 'A named engineer in Slack'],
    ],
    'plans' => [
        (object) [
            'name' => 'Team',
            'description' => 'For one product and the people who wake up for it.',
            'price' => '$23',
            'note' => 'Billed monthly. First 14 days free.',
            'features' => "25 monitors, 30-second checks\nStatus page on your domain\nAlerts by text, email and Slack\n3 on-call schedules\nEmail support",
            'ctaText' => 'Start free',
            'ctaLink' => '#',
            'featured' => 'no',
        ],
        (object) [
            'name' => 'Business',
            'description' => 'For a few products, with rotations and an audit trail.',
            'price' => '$74',
            'note' => 'Billed monthly. First 14 days free.',
            'features' => "Everything in Team\n150 monitors, 10-second checks\nUnlimited status pages and subscribers\nEscalation rotations and overrides\nPhone support, around the clock",
            'ctaText' => 'Start free',
            'ctaLink' => '#',
            'featured' => 'yes',
        ],
    ],
])
<!--
    Two plans and an enterprise band: a centred heading with no eyebrow, two plan cards side by side in a narrow
    column, then a full-width bordered band — the enterprise name and a line on the left, a four-item checklist in the
    middle, a secondary button on the right. Plan rows come from the plans collection (features one per line); the
    band's checklist is its own list. Clear the enterprise toggle to drop the band; clear the intro to hide it.
-->
<section class="px-6 py-16 sm:py-28" data-pricing-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            <h2 class="mx-auto max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="mx-auto mt-14 grid w-full max-w-3xl gap-5 sm:mt-16 sm:grid-cols-2 lg:max-w-4xl lg:grid-cols-[repeat(auto-fit,minmax(16rem,1fr))]">
            @foreach ($plans as $plan)
            <div class="reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,box-shadow] duration-200 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:p-8" data-reveal>
                <h3 class="text-base font-medium text-ink">{{ $plan->name }}</h3>
                <p class="mt-2 min-h-12 text-[14px]/6 text-pretty text-muted">{{ $plan->description }}</p>
                <div class="mt-6 flex items-baseline gap-1.5">
                    <span class="text-[2.75rem]/none font-semibold tracking-tight text-ink tabular-nums">{{ $plan->price }}</span>
                    <span class="text-[14px] text-muted">{{ $period }}</span>
                </div>
                <p class="mt-3 text-[13px] text-faint">{{ $plan->note }}</p>
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

        @if ($showEnterprise)
        <div class="reveal-3 mt-5 flex flex-col gap-8 rounded-2xl border border-line bg-panel p-6 transition-[border-color,box-shadow] duration-200 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:p-8 lg:mt-6 lg:grid lg:grid-cols-[minmax(0,1fr)_minmax(0,1.5fr)_auto] lg:items-center lg:gap-12" data-reveal>
            <div>
                <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $enterpriseTitle }}</h3>
                <p class="mt-2 max-w-[40ch] text-[14px]/6 text-pretty text-muted">{{ $enterpriseText }}</p>
            </div>
            <ul role="list" class="grid gap-x-8 gap-y-3 text-[14px]/6 text-lede sm:grid-cols-2">
                @foreach ($enterpriseFeatures as $item)
                <li class="flex items-start gap-3">
                    <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    <span>{{ $item->text }}</span>
                </li>
                @endforeach
            </ul>
            <a href="{{ $enterpriseCtaLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium whitespace-nowrap text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">{{ $enterpriseCtaText }}</a>
        </div>
        @endif
    </div>
</section>
