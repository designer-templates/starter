@props([
    'heading' => 'Ship the page this afternoon',
    'body' => 'Start on the free plan, drop in your sections, and hand the content to the people who write it.',
    'ctaText' => 'Start building for free',
    'ctaLink' => '/pricing',
    'secondaryText' => 'Watch a 3-minute demo',
    'secondaryLink' => '/contact',
])
<!-- The closing panel: the one dark surface on the page — a soft accent glow, a dot grid, a statement, and two actions. Clear the secondary text to show one button. -->
<section id="cta" class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="relative overflow-hidden rounded-[2.5rem] bg-shade px-6 py-20 sm:px-16 sm:py-24" data-reveal>
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <div class="absolute top-[-160px] left-1/2 h-[380px] w-[640px] -translate-x-1/2 rounded-full bg-accent opacity-25 blur-3xl"></div>
                <div class="dot-grid absolute inset-0"></div>
            </div>

            <div class="relative mx-auto max-w-2xl text-center">
                <h2 class="text-h2 font-semibold tracking-tight text-balance text-shade-ink sm:text-5xl/[1.05]">{{ $heading }}</h2>
                <p class="mx-auto mt-5 max-w-xl text-lg/8 text-pretty text-shade-muted">{{ $body }}</p>
                <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a href="{{ $ctaLink }}" class="inline-flex w-full items-center justify-center rounded-xl bg-shade-ink px-6 py-3 text-[15px] font-semibold text-shade shadow-lg shadow-shade-ink/10 transition-opacity duration-200 hover:opacity-90 active:scale-[.98] sm:w-auto">{{ $ctaText }}</a>
                    @if ($secondaryText)
                    <a href="{{ $secondaryLink }}" class="inline-flex w-full items-center justify-center rounded-xl border border-shade-line px-6 py-3 text-[15px] font-medium text-shade-ink transition-colors duration-200 hover:border-shade-ink/25 hover:bg-shade-line active:scale-[.98] sm:w-auto">{{ $secondaryText }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
