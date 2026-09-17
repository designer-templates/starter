@props([
    'heading' => 'Start with the free plan',
    'text' => 'One location, ten people, the full schedule and swaps. Upgrade when the roster outgrows it.',
    'primaryText' => 'Start free',
    'primaryUrl' => '/pricing',
    'showSecondary' => '1',
    'secondaryText' => 'View pricing',
    'secondaryUrl' => '/pricing',
])
<!-- A bordered panel with a centered heading, one line of copy, and two buttons. Clear the text to hide it; the toggle hides the second button. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="rounded-3xl border border-line bg-panel px-6 py-16 text-center sm:px-16 sm:py-20" data-reveal>
            <h2 class="mx-auto max-w-[20ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($text)
            <p class="mx-auto mt-5 max-w-[48ch] text-[17px]/7 text-pretty text-lede">{{ $text }}</p>
            @endif
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ $primaryUrl }}" class="inline-flex items-center justify-center rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $primaryText }}</a>
                @if ($showSecondary)
                <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center rounded-full border border-line-strong px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised active:scale-[.98]">{{ $secondaryText }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
