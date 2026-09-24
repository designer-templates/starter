@props([
    'eyebrow' => 'Features',
    'heading' => 'Everything a page needs, in one editor',
    'subheading' => 'Sections, content, and layout live side by side, so nobody waits on a developer to change a headline.',
    'features' => [],
])
<!-- Centered heading over a three-column grid of icon features. Rows live in resources/data/collections/features.json; the icon column is inline SVG. -->
<section id="features" class="scroll-mt-20 px-6 py-24 sm:py-32">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <x-heading
            :eyebrow="$eyebrow"
            :heading="$heading"
            :paragraph="$subheading"
        />

        <div class="mt-14 grid gap-x-8 gap-y-12 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($features as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }}" data-reveal>
                <div class="flex size-10 items-center justify-center rounded-xl bg-raised text-lede">
                    {!! $item->icon !!}
                </div>
                <h3 class="mt-4 text-base font-medium text-ink">{{ $item->title }}</h3>
                <p class="mt-2 text-[14px]/6 text-pretty text-muted">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
