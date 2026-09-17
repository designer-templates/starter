@props([
    'heading' => 'One schedule for the whole crew',
    'text' => 'Starter puts the week, the swaps and the time clock in one place, so the schedule on the wall and the one in every pocket finally agree.',
    'buttonText' => 'Start free',
    'buttonLink' => '/pricing',
    'buttonText2' => 'Book a demo',
    'buttonLink2' => '/contact',
    'image' => '/images/schedule-panorama.svg',
    'imageAlt' => 'A wide view of a weekly schedule',
    'stats' => [],
])
<!-- Left-aligned hero over a wide 12:5 image and a row of figures. The figures come from resources/data/collections/stats.json. -->
<section class="px-6 pt-32 pb-20 sm:pt-40 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-8 lg:grid-cols-2 lg:items-end lg:gap-16">
            <h1 class="max-w-[16ch] text-hero font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <div data-reveal class="reveal-1">
                <p class="max-w-[50ch] text-lg/8 text-pretty text-lede">{{ $text }}</p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    @if ($buttonText)
                    <a href="{{ $buttonLink }}" class="inline-flex items-center justify-center rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</a>
                    @endif
                    @if ($buttonText2)
                    <a href="{{ $buttonLink2 }}" class="inline-flex items-center justify-center rounded-full border border-line-strong px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised active:scale-[.98]">{{ $buttonText2 }}</a>
                    @endif
                </div>
            </div>
        </div>

        <img src="{{ $image }}" alt="{{ $imageAlt }}" width="2400" height="1000" class="reveal-2 mt-14 block aspect-[12/5] w-full rounded-2xl border border-line bg-panel object-cover shadow-card" data-reveal>

        <dl class="reveal-3 mt-14 grid grid-cols-2 gap-x-8 gap-y-10 border-t border-line pt-10 sm:grid-cols-4" data-reveal>
            @foreach ($stats as $item)
            <div class="flex flex-col-reverse gap-1">
                <dt class="text-[14px] text-muted">{{ $item->label }}</dt>
                <dd class="text-[2rem] font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>
