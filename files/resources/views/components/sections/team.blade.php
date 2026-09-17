@props([
    'heading' => 'The team',
    'subheading' => 'Six people in Columbus, Ohio, most of whom have closed a store or a clinic on a Saturday night.',
    'members' => [],
])
<!-- Centered heading over a grid of people: photo, name, role. Rows live in resources/data/collections/team.json. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mx-auto mt-5 max-w-[50ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="mt-14 grid grid-cols-2 gap-x-6 gap-y-10 sm:mt-16 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ($members as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }} flex flex-col items-center text-center" data-reveal>
                <img src="{{ $item->image }}" alt="{{ $item->name }}" width="144" height="144" class="size-20 rounded-full bg-raised object-cover" loading="lazy">
                <p class="mt-4 text-[15px] font-medium text-ink">{{ $item->name }}</p>
                <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
