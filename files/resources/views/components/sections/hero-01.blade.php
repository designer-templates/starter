@props([
    'showBadge' => '1',
    'badgeText' => 'Now syncing with QuickBooks',
    'heading' => 'Know what every job costs',
    'text' => 'Corbel pulls hours, materials and subs into one live margin per job, so you catch a job slipping on Tuesday, not at the final invoice.',
    'buttonText' => 'Start free',
    'buttonLink' => '/signup',
    'buttonText2' => 'Book a demo',
    'buttonLink2' => '/demo',
    'proofText' => '4.9 from 312 crews',
    'image' => '/images/blocks/dashboard-projects.jpg',
    'imageAlt' => 'The Corbel projects page: billed this month, and every open job with its margin',
    'statLabel' => 'Margin, all jobs',
    'statValue' => '31.4%',
    'statDelta' => '+2.1 pts since Aug',
])
<!--
    Split hero: badge, two-line headline, intro, two buttons and a proof row on the left (7 of 12 columns);
    on the right a product screenshot framed as a window that runs off the right edge on desktop (so the visible
    slice stays large), with a small stat card overlapping its bottom-left corner. Swap the image for your own
    screenshot (4:3 works best; keep what matters in the left two-thirds).
    Clear a button's text to hide it; clear the proof line to drop the avatar row; clear the stat figure to
    drop the card; the toggle hides the badge.
-->
<section class="overflow-x-clip px-6 pt-20 pb-12 sm:pt-28 sm:pb-16" data-hero-01>
    <div class="mx-auto grid w-full max-w-6xl items-center gap-y-16 lg:grid-cols-[7fr_5fr] lg:gap-x-12">
        <div>
            @if ($showBadge)
            <a href="{{ $buttonLink2 }}" class="arrow-link inline-flex items-center gap-1.5 rounded-full border border-line bg-panel px-3 py-1 text-[12px] font-medium text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink" data-reveal>
                <span class="size-1.5 rounded-full bg-ink" aria-hidden="true"></span>
                {{ $badgeText }}
                <svg viewBox="0 0 24 24" class="arrow size-3.5 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
            <h1 class="reveal-1 mt-6 max-w-[16ch] text-hero font-semibold tracking-[-0.04em] text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-2 mt-6 max-w-[46ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>

            <div class="reveal-3 mt-9 flex flex-col gap-3 sm:flex-row" data-reveal>
                @if ($buttonText)
                <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
                @endif
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">{{ $buttonText2 }}</a>
                @endif
            </div>

            @if ($proofText)
            <div class="reveal-4 mt-10 flex items-center gap-3.5" data-reveal>
                <div class="flex -space-x-2.5">
                    <img src="https://assets.ui.sh/avatars/3.webp?size=160" alt="" width="32" height="32" class="size-8 rounded-full border-2 border-canvas object-cover">
                    <img src="https://assets.ui.sh/avatars/8.webp?size=160" alt="" width="32" height="32" class="size-8 rounded-full border-2 border-canvas object-cover">
                    <img src="https://assets.ui.sh/avatars/12.webp?size=160" alt="" width="32" height="32" class="size-8 rounded-full border-2 border-canvas object-cover">
                </div>
                <div>
                    <div class="flex items-center gap-0.5 text-ink" aria-label="Rated five out of five stars">
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="mt-0.5 text-[13px] text-muted">{{ $proofText }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- The product image, framed as a window that runs off the right edge on desktop: the visible slice
             stays large and legible, and the stat card overlaps its bottom-left corner. -->
        <div class="reveal-3 relative mb-8 lg:w-[145%]" data-reveal>
            <div class="overflow-hidden rounded-xl border border-line bg-panel shadow-2xl shadow-ink/5 lg:rounded-r-none lg:border-r-0">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1200" class="block h-auto w-full">
            </div>
            @if ($statValue)
            <!-- The overlapping stat card: what makes the window read as an object in a room. -->
            <div class="absolute -bottom-7 -left-3 rounded-xl border border-line bg-panel px-5 py-4 shadow-[var(--shadow-card)] sm:-left-10">
                <p class="text-[12px] font-medium text-muted">{{ $statLabel }}</p>
                <div class="mt-1 flex items-baseline gap-2.5">
                    <p class="text-[26px]/none font-semibold tracking-tight text-ink tabular-nums">{{ $statValue }}</p>
                    <p class="text-[12px] font-medium text-ink tabular-nums">{{ $statDelta }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
