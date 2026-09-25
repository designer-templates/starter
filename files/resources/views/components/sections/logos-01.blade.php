@props([
    'heading' => 'Runs the schedules at 1,400 shops',
    'items' => [
        (object) ['name' => 'Flint', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4Zm5 5a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z'/></svg>"],
        (object) ['name' => 'Pillar', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='3' y='8' width='4' height='13' rx='2'/><rect x='10' y='3' width='4' height='18' rx='2'/><rect x='17' y='8' width='4' height='13' rx='2'/></svg>"],
        (object) ['name' => 'Spire', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M11.1 3.6a1 1 0 0 1 1.8 0l7.6 14.7a1 1 0 0 1-.9 1.5H4.4a1 1 0 0 1-.9-1.5Z'/></svg>"],
        (object) ['name' => 'Rook', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='9' cy='12' r='7'/><circle cx='16' cy='12' r='7' opacity='.5'/></svg>"],
        (object) ['name' => 'Orchard', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M13.5 3a9 9 0 1 0 7.2 14.4A7.5 7.5 0 0 1 13.5 3Z'/></svg>"],
        (object) ['name' => 'Prism', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 2.5 20.2 7.25v9.5L12 21.5l-8.2-4.75v-9.5Z'/></svg>"],
        (object) ['name' => 'Lark', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M20.5 3.5c0 9.5-4.8 17-13.5 17-2.2 0-3.5-1.8-3.5-3.5C3.5 8.7 11 3.5 20.5 3.5Z'/></svg>"],
        (object) ['name' => 'Knoll', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3 21v-7a9 9 0 0 1 18 0v7h-4.5v-7a4.5 4.5 0 0 0-9 0v7Z'/></svg>"],
    ],
])
<!-- Logo row: one quiet line of proof centred over a single balanced row of marks and wordmarks (faint at rest, ink on hover). Rows come from collections.logos (name + inline-SVG icon); clear the heading to show the row alone. -->
<section class="px-6 py-16 sm:py-20" data-logos-01>
    <div class="mx-auto w-full max-w-6xl">
        @if ($heading)
        <p class="text-center text-[15px] font-medium text-muted" data-reveal>{{ $heading }}</p>
        @endif
        <ul role="list" class="reveal-1 mt-8 grid grid-cols-2 gap-y-6 text-center sm:-mx-7 sm:block sm:text-balance" data-reveal>
            @foreach ($items as $item)
            <li class="flex items-center justify-center gap-2.5 text-faint transition-colors duration-200 hover:text-ink sm:mx-7 sm:my-3 sm:inline-flex sm:align-middle [&_svg]:size-6 [&_svg]:shrink-0">
                {!! $item->icon !!}
                <span class="text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</section>
