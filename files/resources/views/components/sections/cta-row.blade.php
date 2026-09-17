@props([
    'heading' => 'Ready when your roster is',
    'text' => 'Set up takes a few minutes. Invite the team when the first week looks right.',
    'primaryText' => 'Create an account',
    'primaryUrl' => '/pricing',
    'showSecondary' => '1',
    'secondaryText' => 'Talk to us',
    'secondaryUrl' => '/contact',
])
<!-- A split row between two hairlines: heading and copy on the left, buttons on the right. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-col gap-6 border-y border-line py-12 sm:flex-row sm:items-center sm:justify-between sm:gap-10" data-reveal>
            <div class="max-w-xl">
                <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($text)
                <p class="mt-3 text-[17px]/7 text-pretty text-lede">{{ $text }}</p>
                @endif
            </div>
            <div class="flex flex-wrap items-center gap-3 sm:shrink-0">
                <a href="{{ $primaryUrl }}" class="inline-flex items-center justify-center rounded-full bg-ink px-6 py-3.5 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $primaryText }}</a>
                @if ($showSecondary)
                <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center rounded-full border border-line-strong px-6 py-3.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised active:scale-[.98]">{{ $secondaryText }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
