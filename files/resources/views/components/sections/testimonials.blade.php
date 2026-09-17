@props([
    'heading' => 'What managers are saying',
    'subheading' => 'Notes from people who moved their week off the spreadsheet.',
    'testimonials' => [],
])
<!-- Centered heading over a grid of quote cards with a name and role. Rows live in resources/data/collections/testimonials.json. -->
<section id="testimonials" class="scroll-mt-20 px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mx-auto mt-5 max-w-[50ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-5 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($testimonials as $item)
            <figure class="reveal-{{ min($loop->iteration, 6) }} flex flex-col justify-between rounded-2xl border border-line bg-panel p-6" data-reveal>
                <blockquote>
                    <p class="text-[15px]/7 text-pretty text-lede">&ldquo;{{ $item->quote }}&rdquo;</p>
                </blockquote>
                <figcaption class="mt-6 border-t border-line pt-4">
                    <p class="text-[15px] font-medium text-ink">{{ $item->name }}</p>
                    <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                </figcaption>
            </figure>
            @endforeach
        </div>
    </div>
</section>
