@props([
    'people' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/3.webp?size=160', 'name' => 'Morgan Alvarez'],
        (object) ['image' => 'https://assets.ui.sh/avatars/7.webp?size=160', 'name' => 'Riley Chen'],
        (object) ['image' => 'https://assets.ui.sh/avatars/11.webp?size=160', 'name' => 'Jordan Okafor'],
        (object) ['image' => 'https://assets.ui.sh/avatars/2.webp?size=160', 'name' => 'Sage Patel'],
        (object) ['image' => 'https://assets.ui.sh/avatars/14.webp?size=160', 'name' => 'Parker Hayes'],
    ],
    'heading' => 'Join the 1,400 shops on Rill',
    'text' => 'The week’s schedule, swaps and payroll hours in one place. Most owners publish their first week in about 40 minutes.',
    'primaryText' => 'Start free',
    'primaryUrl' => '/signup',
    'showSecondary' => '1',
    'secondaryText' => 'See pricing',
    'secondaryUrl' => '/pricing',
    'note' => 'No card. Cancel in one click.',
])
<!-- The team CTA, centered: five overlapping portraits, a heading, one line, two buttons and a small note. The portraits are the People repeater; the toggle hides the second button; clear the text or the note to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-2xl text-center">
        <ul class="flex justify-center -space-x-3" data-reveal>
            @foreach ($people as $person)
            <li class="relative transition-[translate] duration-200 hover:z-10 hover:-translate-y-1">
                <img src="{{ $person->image }}" alt="{{ $person->name }}" width="56" height="56" class="size-14 rounded-full border-2 border-canvas object-cover" loading="lazy">
            </li>
            @endforeach
        </ul>
        <h2 class="reveal-1 mx-auto mt-8 max-w-[24ch] font-display text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
        @if ($text)
        <p class="reveal-2 mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $text }}</p>
        @endif
        <div class="reveal-3 mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
            <a href="{{ $primaryUrl }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $primaryText }}</a>
            @if ($showSecondary)
            <a href="{{ $secondaryUrl }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">{{ $secondaryText }}</a>
            @endif
        </div>
        @if ($note)
        <p class="reveal-4 mt-6 text-[13px] text-faint" data-reveal>{{ $note }}</p>
        @endif
    </div>
</section>
