@props([
    'heading' => 'What store teams say after the first month',
    'intro' => 'Solace is the shared inbox for stores that answer on email, chat, and text. Here is what changed for four of them.',
    'testimonials' => [
        (object) [
            'featured' => 'yes',
            'quote' => 'Solace put every channel in one queue and our first-reply time went from 6 hours to 41 minutes. The team in Columbus stopped dreading Mondays.',
            'name' => 'Rowan Hayes',
            'role' => 'Head of support, Basil & Co',
            'avatar' => 'https://assets.ui.sh/avatars/2.webp?size=160',
            'company' => 'Basil & Co',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='2.25' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M4 20c0-9 5-14 16-16-2 11-7 16-16 16Z'/><path d='m4 20 10-10'/></svg>",
        ],
        (object) [
            'featured' => 'no',
            'quote' => 'Order details sit right beside the message. No more hopping between six tabs to answer one question.',
            'name' => 'Skyler Kim',
            'role' => 'Support lead, Tamsin Goods',
            'avatar' => 'https://assets.ui.sh/avatars/5.webp?size=160',
            'company' => 'Tamsin Goods',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><circle cx='12' cy='12' r='9.5'/></svg>",
        ],
        (object) [
            'featured' => 'no',
            'quote' => 'The saved replies picked up our tone within a week. Customers cannot tell which of us answered.',
            'name' => 'Reese Nakamura',
            'role' => 'Co-founder, Sequoia Outfitters',
            'avatar' => 'https://assets.ui.sh/avatars/10.webp?size=160',
            'company' => 'Sequoia Outfitters',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M12 2.5 20 20H4Z'/></svg>",
        ],
        (object) [
            'featured' => 'no',
            'quote' => 'Assignment rules cut our missed tickets to zero across 3 stores. Nothing waits in an inbox nobody owns.',
            'name' => 'Emery Alvarez',
            'role' => 'Operations manager, Wainwright Supply',
            'avatar' => 'https://assets.ui.sh/avatars/13.webp?size=160',
            'company' => 'Wainwright Supply',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><rect x='3' y='3' width='18' height='18' rx='5'/></svg>",
        ],
    ],
])
<!--
    Featured quote plus supporting: a left opener with no eyebrow, then a wide featured card (the quote large,
    a 64px portrait with name and role, the company mark) spanning the row, and three compact cards beneath
    with a shorter quote and an avatar row. Rows live in collections.testimonials (quote, name, role, avatar,
    company, logo); a row marked featured renders wide, the rest compact — with no row marked, the first one
    leads. Clear the intro to hide it.
-->
<section class="px-6 py-16 sm:py-28" data-testimonial-04>
    <div class="mx-auto w-full max-w-6xl">
        <div>
            <h2 class="max-w-2xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            @if ($intro)
            <p class="reveal-1 mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
            @endif
        </div>

        @php
            $hasFeatured = false;
            foreach ($testimonials as $row) {
                if (($row->featured ?? 'no') === 'yes') $hasFeatured = true;
            }
        @endphp
        <div class="mt-12 grid gap-5 sm:mt-16 lg:grid-cols-3">
            @foreach ($testimonials as $item)
            @if (($item->featured ?? 'no') === 'yes' || (! $hasFeatured && $loop->first))
            <figure class="reveal-{{ min($loop->iteration + 1, 6) }} grid gap-8 rounded-2xl border border-line bg-panel p-6 shadow-[var(--shadow-card)] transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong motion-reduce:transition-none motion-reduce:hover:translate-y-0 sm:p-10 lg:col-span-3 lg:grid-cols-[1fr_16rem] lg:gap-16" data-reveal>
                <blockquote class="flex items-center">
                    <p class="max-w-[44ch] font-display text-xl/8 font-medium text-pretty text-ink sm:text-2xl/9">{{ $item->quote }}</p>
                </blockquote>
                <figcaption class="flex flex-col justify-between gap-8 border-t border-line pt-6 lg:border-t-0 lg:border-l lg:pt-0 lg:pl-12">
                    <div class="flex items-center gap-4 lg:flex-col lg:items-start">
                        <img src="{{ $item->avatar }}" alt="" width="64" height="64" class="size-16 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
                        <div>
                            <p class="text-[15px] font-semibold text-ink">{{ $item->name }}</p>
                            <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 text-ink/80 max-lg:hidden">
                        {!! $item->logo !!}
                        <span class="text-[17px] font-semibold tracking-tight">{{ $item->company }}</span>
                    </div>
                </figcaption>
            </figure>
            @else
            <figure class="reveal-{{ min($loop->iteration + 1, 6) }} flex flex-col justify-between rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)] motion-reduce:transition-none motion-reduce:hover:translate-y-0 sm:p-8" data-reveal>
                <blockquote>
                    <p class="text-[15px]/6 text-pretty text-lede">{{ $item->quote }}</p>
                </blockquote>
                <figcaption class="mt-8 flex items-center gap-3">
                    <img src="{{ $item->avatar }}" alt="" width="40" height="40" class="size-10 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
                    <div class="min-w-0">
                        <p class="text-[14px] font-semibold text-ink">{{ $item->name }}</p>
                        <p class="mt-0.5 text-[13px] text-muted">{{ $item->role }}</p>
                    </div>
                </figcaption>
            </figure>
            @endif
            @endforeach
        </div>
    </div>
</section>
