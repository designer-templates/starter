@props([
    'eyebrow' => 'Pricing',
    'heading' => 'Simple, per-location pricing',
    'subheading' => 'Three plans that grow with the roster. Switch or cancel from the billing page whenever you like.',
    'plans' => [],
])
<!-- Centered heading over three bordered tier cards. Rows live in resources/data/collections/plans.json; a plan's features are one per line, and featured: yes lifts the card. -->
<section id="pricing" class="scroll-mt-20 px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-2xl text-center" data-reveal>
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mx-auto mt-5 max-w-[52ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="mx-auto mt-14 grid w-full max-w-md gap-5 sm:mt-16 lg:max-w-none lg:grid-cols-3">
            @foreach ($plans as $plan)
            @if ($plan->featured == 'yes')
            <div class="reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-ink bg-panel p-8 shadow-card" data-reveal>
            @else
            <div class="reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-8" data-reveal>
            @endif
                <h3 class="text-[15px] font-semibold tracking-tight text-ink">{{ $plan->name }}</h3>
                <div class="mt-4 flex items-baseline gap-1">
                    <span class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $plan->price }}</span>
                    <span class="text-[14px] text-muted">{{ $plan->period }}</span>
                </div>
                <p class="mt-3 text-[15px]/6 text-pretty text-muted">{{ $plan->description }}</p>

                <ul role="list" class="mt-8 mb-8 flex flex-col gap-3 text-[15px]/6 text-lede">
                    @foreach (preg_split('/\R/', trim((string) $plan->features)) as $feature)
                    <li class="flex items-start gap-3">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-ink" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                @if ($plan->featured == 'yes')
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center rounded-full bg-accent px-5 py-3 text-[15px] font-medium text-accent-ink transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $plan->ctaText }}</a>
                @else
                <a href="{{ $plan->ctaLink }}" class="mt-auto inline-flex w-full items-center justify-center rounded-full bg-ink px-5 py-3 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $plan->ctaText }}</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
