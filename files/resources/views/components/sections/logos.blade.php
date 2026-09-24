@props([
    'heading' => 'Trusted by these companies',
    'logos' => [],
])
<!-- One row: a short line of trust on the left, marks with wordmarks spread to the right. Rows live in resources/data/collections/logos.json; the icon column is inline SVG. -->
<section class="px-6 py-14 sm:py-16">
    <div class="mx-auto flex w-full max-w-6xl flex-col items-center gap-8 lg:flex-row lg:justify-between lg:gap-12 px-6 lg:px-8" data-reveal>
        @if ($heading)
        <p class="shrink-0 text-lg font-medium tracking-tight text-ink">{{ $heading }}</p>
        @endif
        <ul role="list" class="flex flex-wrap items-center justify-center gap-x-10 gap-y-5 lg:justify-end lg:gap-x-14">
            @foreach ($logos as $item)
            <li class="flex items-center gap-3 text-ink/85 transition-colors duration-200 hover:text-ink [&_svg]:size-7">
                {!! $item->icon !!}
                <span class="text-[19px] font-semibold tracking-tight">{{ $item->name }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</section>
