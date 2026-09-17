@props([
    'heading' => 'The week, scheduled before Friday',
    'text' => 'Build next week from this week, publish it to every phone on the team, and let shift swaps sort themselves out.',
    'buttonText' => 'Start free',
    'buttonLink' => '/pricing',
    'buttonText2' => 'See how it works',
    'buttonLink2' => '/#features',
])
<!-- Centered hero: heading, one paragraph, two buttons. Clear a button's text to hide it. -->
<section class="px-6 pt-32 pb-20 sm:pt-40 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="text-hero font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-1 mx-auto mt-6 max-w-[54ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $text }}</p>
            <div class="reveal-2 mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
                @if ($buttonText)
                <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
                @endif
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center rounded-full border border-line-strong px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised active:scale-[.98] sm:w-auto">{{ $buttonText2 }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
