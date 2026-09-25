@props([
    'items' => [
        (object) ['name' => 'Corvid', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3 4.5 11 12l-8 7.5Z'/><path d='M21 4.5 13 12l8 7.5Z' opacity='.5'/></svg>"],
        (object) ['name' => 'Fenner', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3.5 3h13.5L3.5 16.5Z'/><path d='M20.5 21H7l13.5-13.5Z'/></svg>"],
        (object) ['name' => 'Marlow', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M12 2.5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19Zm0 2.25a7.25 7.25 0 1 1 0 14.5 7.25 7.25 0 0 1 0-14.5Z'/><circle cx='12' cy='12' r='3.5'/></svg>"],
        (object) ['name' => 'Cassia', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='12' cy='7' r='4.5'/><circle cx='12' cy='17' r='4.5'/><circle cx='7' cy='12' r='4.5'/><circle cx='17' cy='12' r='4.5'/><circle cx='12' cy='12' r='3'/></svg>"],
        (object) ['name' => 'Norwood', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 2 16.5 12h-9Z'/><path d='M12 22 7.5 12h9Z' opacity='.45'/></svg>"],
        (object) ['name' => 'Thorne', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M10 3h4v7h7v4h-7v7h-4v-7H3v-4h7Z'/></svg>"],
        (object) ['name' => 'Oster', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 12V3a9 9 0 0 1 9 9Z'/><path d='M12 12h9a9 9 0 0 1-9 9Z' opacity='.5'/><path d='M12 12v9a9 9 0 0 1-9-9Z'/><path d='M12 12H3a9 9 0 0 1 9-9Z' opacity='.5'/></svg>"],
        (object) ['name' => 'Marston', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3 8.5 12 3.5l9 5-9 5Z'/><path d='m3 15.5 9 5 9-5' fill='none' stroke='currentColor' stroke-width='1.75' stroke-linejoin='round'/></svg>"],
    ],
    'caption' => 'Support teams at 860 software companies answer from Deskline.',
])
<!-- Logo grid: a bordered grid of cells ruled by hairlines, each a centred wordmark that fills on hover, with one caption of proof under it. Rows come from collections.logos; the grid runs two across on phones and four on larger screens for any count; clear the caption to show the grid alone. -->
<section class="px-6 py-16 sm:py-20" data-logos-03>
    <div class="mx-auto w-full max-w-6xl">
        <div class="overflow-hidden rounded-2xl border border-line" data-reveal>
            <ul role="list" class="-mt-px -ml-px grid grid-cols-2 sm:grid-cols-4">
                @foreach ($items as $item)
                <li class="flex h-24 items-center justify-center gap-2.5 border-t border-l border-line text-faint transition-colors duration-200 hover:bg-raised hover:text-ink sm:h-28 [&_svg]:size-6 [&_svg]:shrink-0">
                    {!! $item->icon !!}
                    <span class="text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @if ($caption)
        <p class="reveal-1 mt-6 text-center text-[13px] text-faint" data-reveal>{{ $caption }}</p>
        @endif
    </div>
</section>
