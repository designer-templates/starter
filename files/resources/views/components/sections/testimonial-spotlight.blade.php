@props([
    'quote' => 'We rebuilt our marketing site in a week and handed the keys to the content team. Six months later nobody has asked engineering to change a headline.',
    'name' => 'Marisol Vega',
    'role' => 'Head of Growth',
    'company' => 'Northwind',
    'avatar' => 'https://assets.ui.sh/avatars/8.webp?size=160',
])
<!-- One large five-star quote in a bordered card, with an avatar and attribution underneath. Clear the company to drop it from the role line. -->
<section id="testimonials" class="scroll-mt-20 px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <figure class="relative mx-auto w-full max-w-3xl overflow-hidden rounded-3xl border border-line bg-panel px-6 py-14 text-center sm:px-16 sm:py-16" data-reveal>
            <span class="pointer-events-none absolute -top-3 left-1/2 -translate-x-1/2 font-serif text-[11rem] leading-none text-raised select-none" aria-hidden="true">&ldquo;</span>

            <div class="relative">
                <div class="flex items-center justify-center gap-1 text-star" aria-label="Rated five out of five stars">
                    <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"/></svg>
                </div>

                <blockquote class="mx-auto mt-7 max-w-2xl text-2xl/snug font-medium tracking-tight text-balance text-ink sm:text-3xl/snug">
                    <p>{{ $quote }}</p>
                </blockquote>

                <figcaption class="mt-9 flex flex-col items-center gap-3">
                    <img src="{{ $avatar }}" alt="{{ $name }}" width="48" height="48" class="size-12 rounded-full object-cover" loading="lazy">
                    <div>
                        <p class="text-[14px] font-semibold text-ink">{{ $name }}</p>
                        <p class="mt-0.5 text-[14px] text-muted">{{ $role }}@if ($company), {{ $company }}@endif</p>
                    </div>
                </figcaption>
            </div>
        </figure>
    </div>
</section>
