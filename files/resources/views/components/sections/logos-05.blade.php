@props([
    'quote' => 'We moved 14 locations onto Crewbook in one weekend, and Monday\'s schedule was already posted. Managers stopped texting me at 6:00 AM, which is the only review that matters.',
    'name' => 'Morgan Okafor',
    'role' => 'Director of Operations, Sextant',
    'items' => [
        (object) ['name' => 'Sextant', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M3.5 20.5v-17a17 17 0 0 1 17 17Z'/></svg>"],
        (object) ['name' => 'Tundra', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='5' cy='5' r='2.25'/><circle cx='12' cy='5' r='2.25'/><circle cx='19' cy='5' r='2.25'/><circle cx='5' cy='12' r='2.25'/><circle cx='12' cy='12' r='2.25'/><circle cx='19' cy='12' r='2.25'/><circle cx='5' cy='19' r='2.25'/><circle cx='12' cy='19' r='2.25'/><circle cx='19' cy='19' r='2.25'/></svg>"],
        (object) ['name' => 'Bastion', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M12 2.5 20 5.5v6c0 5-3.5 8.6-8 10-4.5-1.4-8-5-8-10v-6Z'/></svg>"],
        (object) ['name' => 'Ingot', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M4.5 5h15A1.5 1.5 0 0 1 21 6.5v11a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 17.5v-11A1.5 1.5 0 0 1 4.5 5Zm2.5 4v6h10V9Z'/></svg>"],
        (object) ['name' => 'Mica', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><path d='M10.5 3a9 9 0 0 0 0 18Z'/><path d='M13.5 3a9 9 0 0 1 0 18Z' opacity='.5'/></svg>"],
        (object) ['name' => 'Ursa', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><circle cx='9' cy='14.5' r='6.5'/><circle cx='18' cy='6' r='3.5'/></svg>"],
        (object) ['name' => 'Bellwether', 'icon' => "<svg viewBox='0 0 24 24' aria-hidden='true'><path d='M12 3.5 21 19.5H3Z' fill='none' stroke='currentColor' stroke-width='1.75' stroke-linejoin='round'/><circle cx='12' cy='14' r='2.5' fill='currentColor'/></svg>"],
        (object) ['name' => 'Selkirk', 'icon' => "<svg viewBox='0 0 24 24' class='fill-current' aria-hidden='true'><rect x='2' y='10.25' width='20' height='3.5' rx='1.75' transform='rotate(45 12 12)'/><rect x='2' y='10.25' width='20' height='3.5' rx='1.75' transform='rotate(-45 12 12)'/></svg>"],
    ],
    'linkText' => 'Read the customer stories',
    'linkUrl' => '/customers',
])
<!-- Quote + logos: one customer line set large and centred with its attribution, a balanced row of wordmarks beneath, and an arrow link to the stories. Rows come from collections.logos; clear the link text to drop the link. -->
<section class="px-6 py-16 sm:py-28" data-logos-05>
    <div class="mx-auto w-full max-w-6xl text-center">
        <figure class="mx-auto max-w-3xl" data-reveal>
            <blockquote class="text-xl/8 font-medium text-balance text-ink sm:text-2xl/9">&ldquo;{{ $quote }}&rdquo;</blockquote>
            <figcaption class="mt-6 text-[14px]">
                <span class="font-medium text-ink">{{ $name }}</span>
                <span class="text-muted"> &middot; {{ $role }}</span>
            </figcaption>
        </figure>
        <ul role="list" class="reveal-1 mt-12 grid grid-cols-2 gap-y-6 sm:-mx-7 sm:block sm:text-balance" data-reveal>
            @foreach ($items as $item)
            <li class="flex items-center justify-center gap-2.5 text-faint transition-colors duration-200 hover:text-ink sm:mx-7 sm:my-3 sm:inline-flex sm:align-middle [&_svg]:size-6 [&_svg]:shrink-0">
                {!! $item->icon !!}
                <span class="text-[17px] font-semibold tracking-tight">{{ $item->name }}</span>
            </li>
            @endforeach
        </ul>
        @if ($linkText)
        <p class="reveal-2 mt-10" data-reveal>
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-ink">
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </p>
        @endif
    </div>
</section>
