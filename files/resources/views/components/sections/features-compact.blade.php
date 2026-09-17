@props([
    'heading' => 'Built for the floor, not the back office',
    'subheading' => 'Small details that save a manager a few minutes every single day.',
    'features' => [],
])
<!-- Left-aligned heading over a compact grid of icon features without cards. Rows live in resources/data/collections/features.json. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mt-5 max-w-[52ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-x-8 gap-y-10 border-t border-line pt-10 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($features as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }}" data-reveal>
                <div class="text-ink">
                    {!! $item->icon !!}
                </div>
                <h3 class="mt-4 text-[15px] font-semibold tracking-tight text-ink">{{ $item->title }}</h3>
                <p class="mt-1.5 text-[15px]/6 text-pretty text-muted">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
