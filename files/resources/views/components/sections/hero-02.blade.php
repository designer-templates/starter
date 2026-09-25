@props([
    'eyebrow' => 'Dispatch for field-service teams',
    'heading' => "Every technician’s day, planned by 6 AM",
    'text' => "Fallow routes the day’s calls around drive time and skills, texts each customer a two-hour window, and re-plans the moment a job runs long.",
    'buttonText' => 'Start free',
    'buttonLink' => '/signup',
    'buttonText2' => 'See pricing',
    'buttonLink2' => '/pricing',
    'logosLabel' => 'Running the day at',
    'logos' => [
        (object) ['name' => 'Fairmont Air', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M12 2.5 21.5 21.5H2.5Z'/></svg>"],
        (object) ['name' => 'Bannock', 'icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='2.25' aria-hidden='true'><circle cx='12' cy='12' r='8.5'/><path d='M12 3.5v17'/></svg>"],
        (object) ['name' => 'Elmwood Plumbing', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><rect x='3' y='3' width='8' height='8' rx='2'/><rect x='13' y='13' width='8' height='8' rx='2'/><rect x='13' y='3' width='8' height='8' rx='4'/></svg>"],
        (object) ['name' => 'Redwood Electric', 'icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='2.25' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M13 2.5 5 13.5h6l-1 8 8-11h-6Z'/></svg>"],
        (object) ['name' => 'Wyeth & Co', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M3 5h4l3 10 2-6h3l2 6 3-10h4l-5 15h-4l-2-6-2 6H8Z'/></svg>"],
    ],
    'image' => '/images/blocks/dashboard-overview.jpg',
    'imageAlt' => 'The Fallow dashboard: today’s jobs, on-time rate and the dispatch list',
])
<!--
    Centered statement hero: eyebrow, a headline whose first line sets in ink and the rest in the faint tier,
    intro, two buttons, then a quiet row of five customer wordmarks (logos, bound to collections.logos). Beneath,
    a full-width product screenshot sits on a raised stage that is shorter than the image, so the window is
    clipped by the section's bottom edge. Swap the image for your own screenshot (16:10 or 16:9 works best).
    Clear a button's text to hide it; clear the eyebrow or the wordmarks label to drop that line.
-->
<section class="px-6 pt-20 pb-0 sm:pt-28" data-hero-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h1 class="reveal-1 mx-auto mt-5 max-w-[22ch] text-hero font-semibold tracking-[-0.04em] text-balance text-faint first-line:text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-2 mx-auto mt-6 max-w-[54ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>

            <div class="reveal-3 mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
                @if ($buttonText)
                <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
                @endif
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">{{ $buttonText2 }}</a>
                @endif
            </div>

            @if ($logosLabel)
            <div class="reveal-4 mt-12" data-reveal>
                <p class="text-[13px] text-faint">{{ $logosLabel }}</p>
                <ul role="list" class="mt-5 flex flex-wrap items-center justify-center gap-x-9 gap-y-4 text-faint">
                    @foreach ($logos as $logo)
                    <li class="inline-flex items-center gap-2 transition-colors duration-200 hover:text-ink">
                        {!! $logo->icon !!}
                        <span class="text-[17px] font-semibold tracking-tight whitespace-nowrap">{{ $logo->name }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <!-- The stage: shorter than the image inside it, so the section's edge crops the dashboard. -->
        <div class="reveal-5 mt-16 h-[26rem] overflow-hidden rounded-t-3xl bg-raised p-1.5 pb-0 sm:mt-20 sm:h-[30rem] sm:p-2 sm:pb-0" data-reveal>
            <div class="overflow-hidden rounded-t-[20px] border border-b-0 border-line bg-panel shadow-2xl shadow-ink/5">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1000" class="block h-auto w-full">
            </div>
        </div>
    </div>
</section>
