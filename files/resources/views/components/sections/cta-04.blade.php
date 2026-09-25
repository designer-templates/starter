@props([
    'heading' => 'Quote 14 carriers from one request',
    'text' => 'Fennel returns live rates, transit days and a label in one call. The first 500 labels a month are free.',
    'cards' => [
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25'/></svg>", 'title' => 'Read the docs', 'text' => 'Every endpoint with a request you can paste into a terminal, and a sandbox key that works in 40 seconds.', 'url' => '/docs'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155'/></svg>", 'title' => 'Talk to sales', 'text' => 'Volume pricing past 25,000 labels a month, and a migration plan from someone who has done one before.', 'url' => '/contact'],
    ],
])
<!-- A statement on the left and two linked cards on the right, each an icon tile, a title, one line and an arrow that nudges on hover; the whole card lifts. The cards are the Cards repeater (the icon column is inline SVG). Clear the supporting text to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-10 lg:grid-cols-[1fr_1.25fr] lg:items-center lg:gap-16">
            <div data-reveal>
                <h2 class="max-w-[22ch] font-display text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($text)
                <p class="mt-5 max-w-[46ch] text-lg/8 text-pretty text-muted">{{ $text }}</p>
                @endif
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ($cards as $card)
                <a href="{{ $card->url }}" class="arrow-link reveal-{{ min($loop->iteration, 6) }} group flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:p-8" data-reveal>
                    <div class="flex items-center justify-between">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-raised text-lede">{!! $card->icon !!}</span>
                        <svg viewBox="0 0 24 24" class="arrow size-5 text-faint group-hover:text-ink" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                    <h3 class="mt-6 text-base font-medium text-ink">{{ $card->title }}</h3>
                    <p class="mt-2 text-[15px]/6 text-pretty text-muted">{{ $card->text }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
