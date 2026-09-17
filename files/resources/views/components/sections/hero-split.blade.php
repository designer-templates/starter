@props([
    'heading' => 'Schedules your team actually sees',
    'text' => 'Starter builds the week from the last one, publishes it to every phone, and approves the swaps that fit. Sunday nights go back to being Sunday nights.',
    'buttonText' => 'Start free',
    'buttonLink' => '/pricing',
    'buttonText2' => 'See how it works',
    'buttonLink2' => '/#features',
    'image' => '/images/schedule-week.svg',
    'imageAlt' => 'A weekly schedule with shifts for eight people',
])
<!-- Split hero: heading and buttons on the left, a 4:3 image on the right. Clear a button's text to hide it. -->
<section class="px-6 pt-32 pb-20 sm:pt-40 sm:pb-28">
    <div class="mx-auto grid w-full max-w-6xl items-center gap-12 lg:grid-cols-2 lg:gap-16">
        <div>
            <h1 class="max-w-[16ch] text-hero font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-1 mt-6 max-w-[50ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $text }}</p>
            <div class="reveal-2 mt-10 flex flex-col gap-3 sm:flex-row" data-reveal>
                @if ($buttonText)
                <a href="{{ $buttonLink }}" class="inline-flex items-center justify-center rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</a>
                @endif
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex items-center justify-center rounded-full border border-line-strong px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised active:scale-[.98]">{{ $buttonText2 }}</a>
                @endif
            </div>
        </div>
        <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1200" height="900" class="reveal-3 block aspect-[4/3] w-full rounded-2xl border border-line bg-panel object-cover shadow-card" data-reveal>
    </div>
</section>
