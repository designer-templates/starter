@props([
    'eyebrow' => 'How it works',
    'heading' => 'The schedule and the people on it, in one place',
    'description' => 'Availability, hours caps and training live next to the shifts, so the week you publish is one everyone can actually work.',
    'features' => [],
    'showButton' => '1',
    'buttonText' => 'See every feature',
    'buttonUrl' => '/#features',
    'image' => '/images/schedule-week.svg',
    'imageAlt' => 'A weekly schedule with shifts for eight people',
])
<!-- Heading and a checklist on the left, a 4:3 image on the right. The checklist reads the title of each row in resources/data/collections/features.json. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal>
                @if ($eyebrow)
                <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 max-w-[20ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($description)
                <p class="mt-5 max-w-[50ch] text-[17px]/7 text-pretty text-lede">{{ $description }}</p>
                @endif

                <ul role="list" class="mt-8 flex flex-col gap-3">
                    @foreach ($features as $item)
                    <li class="flex items-start gap-3 text-[15px]/6 text-lede">
                        <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-ink" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $item->title }}</span>
                    </li>
                    @endforeach
                </ul>

                @if ($showButton)
                <div class="mt-8">
                    <a href="{{ $buttonUrl }}" class="arrow-link inline-flex items-center gap-2 rounded-full border border-line-strong px-5 py-3 text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised">{{ $buttonText }} <span class="arrow" aria-hidden="true">→</span></a>
                </div>
                @endif
            </div>

            <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1200" height="900" class="reveal-1 block aspect-[4/3] w-full rounded-2xl border border-line bg-panel object-cover shadow-card" data-reveal>
        </div>
    </div>
</section>
