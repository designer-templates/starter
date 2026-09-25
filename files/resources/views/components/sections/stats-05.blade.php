@props([
    'heading' => 'Interviews on the calendar the same day',
    'intro' => 'Foxhollow finds a slot across every panelist’s calendar and holds it before the candidate closes the tab.',
    'figures' => [
        (object) ['value' => '11 days', 'label' => 'Shorter time to hire', 'note' => 'From application to signed offer, down from 34 days a year earlier.'],
        (object) ['value' => '4.9', 'label' => 'Candidate rating of the process', 'note' => 'From 12,318 surveys sent after the final round so far in 2026.'],
        (object) ['value' => '63%', 'label' => 'Fewer reschedules', 'note' => 'Booked only where every panelist is free, so the first slot holds.'],
    ],
    'sourceText' => 'As measured across',
    'sources' => [
        (object) ['name' => 'Greyhaven', 'icon' => "<svg viewBox='0 0 24 24' class='size-4 fill-current' aria-hidden='true'><path d='M12 2l9 5v10l-9 5-9-5V7l9-5zm0 2.3L5 8.2v7.6l7 3.9 7-3.9V8.2l-7-3.9z'/></svg>"],
        (object) ['name' => 'Bellhop', 'icon' => "<svg viewBox='0 0 24 24' class='size-4 fill-current' aria-hidden='true'><path d='M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zm0 2.2a6.8 6.8 0 1 1 0 13.6 6.8 6.8 0 0 1 0-13.6zM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6z'/></svg>"],
        (object) ['name' => 'Coldwater', 'icon' => "<svg viewBox='0 0 24 24' class='size-4 fill-current' aria-hidden='true'><path d='M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z'/></svg>"],
    ],
])
<!-- Stats, centered three: a centered heading and one line, then three figures each with a bold label and a two-line explanation, divided by hairlines on desktop and stacked with rules on phones, and a source line of three small wordmarks under a rule. Figures come from collections.stats (value, label, note), wordmarks from collections.logos (name, icon). Reveal only. Clear the intro or the source line to hide them. -->
<section class="px-6 py-16 sm:py-28" data-stats-05>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            <h2 class="mx-auto max-w-[24ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="mt-14 grid grid-cols-1 sm:mt-16 sm:grid-cols-3">
            @foreach ($figures as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }} border-t border-line py-8 text-center first:border-t-0 first:pt-0 last:pb-0 sm:border-t-0 sm:border-l sm:px-8 sm:py-0 sm:[&:nth-child(3n+1)]:border-l-0 sm:[&:nth-child(3n+1)]:pl-0 sm:[&:nth-child(3n)]:pr-0 sm:[&:nth-child(n+4)]:mt-14 lg:px-12" data-reveal>
                <p class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</p>
                <p class="mt-4 text-[15px] font-semibold text-ink">{{ $item->label }}</p>
                @if ($item->note ?? '')
                <p class="mx-auto mt-2 max-w-[34ch] text-[14px]/6 text-pretty text-muted">{{ $item->note }}</p>
                @endif
            </div>
            @endforeach
        </div>

        <div class="reveal-4 mt-14 flex flex-col items-center justify-center gap-x-6 gap-y-3 border-t border-line pt-8 sm:mt-16 sm:flex-row" data-reveal>
            @if ($sourceText)
            <p class="text-[13px] text-faint">{{ $sourceText }}</p>
            @endif
            <ul class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2">
                @foreach ($sources as $item)
                <li class="inline-flex items-center gap-1.5 text-[14px] font-semibold tracking-tight text-muted transition-colors duration-200 hover:text-ink">
                    <span class="flex text-faint [&>svg]:size-4 [&>svg]:fill-current">{!! $item->icon !!}</span>
                    <span>{{ $item->name }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
