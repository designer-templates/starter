@props([
    'heading' => 'The numbers from the first year',
    'stats' => [],
])
<!-- Four headline figures in a row with hairlines between them. Clear the heading to hide it. Rows live in resources/data/collections/stats.json. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        @if ($heading)
        <h2 class="mb-14 text-center text-h2 font-semibold tracking-tight text-balance text-ink sm:mb-16" data-reveal>{{ $heading }}</h2>
        @endif

        <dl class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-4 sm:gap-y-0 sm:divide-x sm:divide-line">
            @foreach ($stats as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }} px-4 text-center" data-reveal>
                <dd class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</dd>
                <dt class="mt-2 text-[14px] text-muted">{{ $item->label }}</dt>
            </div>
            @endforeach
        </dl>
    </div>
</section>
