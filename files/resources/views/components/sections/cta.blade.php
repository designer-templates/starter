@props([
    'heading' => 'Start on the free plan today',
    'body' => 'No card, no call. Import your first project and see the difference this afternoon.',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
    'secondaryText' => 'Talk to us',
    'secondaryLink' => 'mailto:hello@example.com',
])
<!--
    The closing band. It changes the rhythm on purpose: the one dark surface
    on a light page (or the one light surface on a dark one), a statement, and
    a single primary action. Rewrite the defaults for the product.
-->
<section id="cta" class="px-6 py-24 sm:py-32">
    <div class="mx-auto w-full max-w-6xl overflow-hidden rounded-3xl bg-shade px-8 py-16 text-center sm:px-16 sm:py-24" data-reveal>
        <h2 class="mx-auto max-w-[18ch] text-4xl leading-[1.05] tracking-[-0.03em] text-balance text-shade-ink sm:text-5xl">{{ $heading }}</h2>
        <p class="mx-auto mt-6 max-w-[46ch] text-lg/8 text-pretty text-shade-muted">{{ $body }}</p>
        <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ $ctaLink }}" class="rounded-full bg-accent px-6 py-3.5 text-[15px] font-medium text-accent-ink transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
            <a href="{{ $secondaryLink }}" class="rounded-full border border-shade-line px-6 py-3.5 text-[15px] font-medium text-shade-ink transition-colors duration-200 hover:bg-shade-line">{{ $secondaryText }}</a>
        </div>
    </div>
</section>
