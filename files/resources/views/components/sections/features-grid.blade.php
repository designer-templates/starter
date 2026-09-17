@props([
    'eyebrow' => 'Features',
    'heading' => 'Everything a shift schedule needs',
    'subheading' => 'The whole week in one screen, on every phone, with the busywork handled before it reaches you.',
    'features' => [],
])
<!-- Centered heading over a grid of bordered feature cards. Rows live in resources/data/collections/features.json; the icon column is inline SVG. -->
<section id="features" class="scroll-mt-20 px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-2xl text-center" data-reveal>
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mx-auto mt-5 max-w-[52ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-5 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($features as $item)
            <div class="lift rounded-2xl border border-line bg-panel p-6 reveal-{{ min($loop->iteration, 6) }}" data-reveal>
                <div class="flex size-10 items-center justify-center rounded-lg border border-line bg-raised text-ink">
                    {!! $item->icon !!}
                </div>
                <h3 class="mt-5 text-[17px] font-semibold tracking-tight text-ink">{{ $item->title }}</h3>
                <p class="mt-2 text-[15px]/6 text-pretty text-muted">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
