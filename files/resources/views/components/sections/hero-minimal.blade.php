@props([
    'eyebrow' => 'Pricing',
    'heading' => 'One flat price per location',
    'text' => 'Every plan includes the weekly schedule, swaps and the mobile app. Pay monthly, cancel any time.',
])
<!-- Page header: an eyebrow, a heading and one line of copy. Opens a page below the fixed nav. Clear the eyebrow or the text to hide it. -->
<section class="px-6 pt-32 pb-12 sm:pt-40 sm:pb-16">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-2xl text-center">
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h1 class="reveal-1 mt-4 text-hero font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h1>
            @if ($text)
            <p class="reveal-2 mx-auto mt-6 max-w-[50ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $text }}</p>
            @endif
        </div>
    </div>
</section>
