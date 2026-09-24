@props([
    'eyebrow' => 'Testimonials',
    'heading' => 'What teams say about Starter',
    'subheading' => 'Developers use Starter to ship marketing pages faster and hand the content to the people who write it. Here is how it fits real Laravel workflows.',
    'testimonials' => [],
    'outcomes' => [],
])
<!--
    Left-aligned heading, then two wide quote cards (avatar and name left, the company mark right),
    then three outcome cards: a big figure, its caption, a drawn illustration, and a one-line story.
    Rows live in resources/data/collections/testimonials.json and outcomes.json; icon and logo columns are inline SVG.
-->
<section id="testimonials" class="scroll-mt-20 px-6 py-24 sm:py-32">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <x-heading
            :eyebrow="$eyebrow"
            :heading="$heading"
            :paragraph="$subheading"
        />

        <div class="mt-12 grid gap-5 lg:grid-cols-2">
            @foreach ($testimonials as $item)
            <figure class="reveal-{{ min($loop->iteration, 6) }} flex flex-col justify-between rounded-3xl bg-raised/70 p-8 sm:p-10" data-reveal>
                <blockquote>
                    <p class="text-[17px]/7 font-medium text-pretty text-ink sm:text-lg/8">{{ $item->quote }}</p>
                </blockquote>
                <figcaption class="mt-10 flex items-center justify-between gap-6">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ $item->avatar }}" alt="{{ $item->name }}" width="44" height="44" class="size-11 rounded-full object-cover" loading="lazy">
                        <div>
                            <p class="text-[15px] font-semibold text-ink">{{ $item->name }}</p>
                            <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-2.5 text-ink/80">
                        {!! $item->logo !!}
                        <span class="text-[17px] font-semibold tracking-tight max-sm:hidden">{{ $item->company }}</span>
                    </div>
                </figcaption>
            </figure>
            @endforeach
        </div>

        <div class="mt-5 grid gap-5 sm:grid-cols-3">
            @foreach ($outcomes as $item)
            <div class="reveal-{{ min($loop->iteration + 2, 6) }} flex flex-col rounded-3xl bg-raised/70 p-8" data-reveal>
                <p class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $item->value }}</p>
                <p class="mt-2 text-[15px] text-muted">{{ $item->label }}</p>
                <div class="my-7 flex justify-center text-faint/70">{!! $item->icon !!}</div>
                <p class="mt-auto text-[19px]/7 font-semibold tracking-tight text-balance text-ink">{{ $item->title }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
