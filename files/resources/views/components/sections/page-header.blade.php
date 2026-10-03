@props([
    'eyebrow' => 'Features',
    'heading' => 'One editor, plain Blade underneath',
    'intro' => 'Edit on the page, keep lists in collections, and ship sections as files in your own repository. Here is how the pieces fit.',
    'linkText' => 'See pricing',
    'linkUrl' => '/pricing',
    'align' => 'left',
])
<!--
    The opener for an inner page: an eyebrow, the page's one h1, a line of intro and an optional arrow link.
    Left-aligned on the container's edge by default (the same edge as the nav); set Alignment to centered for
    a page whose next section is centred too. Clear the eyebrow or the link text to hide them.
-->
@php $centered = $align === 'center'; @endphp
<section class="pt-16 pb-12 sm:pt-24 sm:pb-16">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div @class(['max-w-3xl', 'mx-auto text-center' => $centered])>
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-muted-foreground uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h1 @class(['reveal-1 mt-4 text-hero font-semibold tracking-[-0.04em] text-balance text-foreground', 'mx-auto' => $centered]) data-reveal>{{ $heading }}</h1>
            @if ($intro)
            <p @class(['reveal-2 mt-6 max-w-[54ch] text-lg/8 text-pretty text-muted-foreground sm:text-xl/8', 'mx-auto' => $centered]) data-reveal>{{ $intro }}</p>
            @endif
            @if ($linkText)
            <p class="reveal-3 mt-8" data-reveal>
                <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-foreground">
                    {{ $linkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </p>
            @endif
        </div>
    </div>
</section>
