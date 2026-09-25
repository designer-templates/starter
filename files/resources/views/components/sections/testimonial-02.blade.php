@props([
    'eyebrow' => 'Reviews',
    'heading' => 'Proposals that get signed',
    'intro' => 'Written by the people who send them. 212 reviews, a 4.9 average, none of them edited.',
    'ctaText' => 'Read all 212 reviews',
    'ctaLink' => '#',
    'testimonials' => [
        (object) [
            'quote' => 'Signed in 40 minutes. Our old average was 9 days.',
            'name' => 'Sam Rivera',
            'role' => 'Founder, Sundry Studio',
            'avatar' => 'https://assets.ui.sh/avatars/1.webp?size=160',
        ],
        (object) [
            'quote' => 'Clients open the proposal on a phone, tap the plan they want, and sign. We stopped exporting PDFs entirely in March.',
            'name' => 'Casey Nakamura',
            'role' => 'Managing partner, Kelso & Rowe',
            'avatar' => 'https://assets.ui.sh/avatars/4.webp?size=160',
        ],
        (object) [
            'quote' => 'We send about 60 proposals a month. Trellis shows which were opened, how long each section was read, and when to follow up. Close rate is up 11 points.',
            'name' => 'Reese Hayes',
            'role' => 'Studio director, Hollis Press',
            'avatar' => 'https://assets.ui.sh/avatars/6.webp?size=160',
        ],
        (object) [
            'quote' => 'The pricing table with optional add-ons is the best thing in it. Average deal size went from $4,200 to $5,900.',
            'name' => 'Drew Patel',
            'role' => 'Creative director, Coppice',
            'avatar' => 'https://assets.ui.sh/avatars/9.webp?size=160',
        ],
        (object) [
            'quote' => 'One layout for each of the 5 kinds of work we do. A new proposal takes 12 minutes instead of a morning.',
            'name' => 'Quinn Alvarez',
            'role' => 'Principal, Harrow Creative',
            'avatar' => 'https://assets.ui.sh/avatars/12.webp?size=160',
        ],
        (object) [
            'quote' => 'Reminders go out on our schedule and skip the client’s holidays. It reads the room better than I do on a Friday.',
            'name' => 'Taylor Brooks',
            'role' => 'Account lead, Juniper Works',
            'avatar' => 'https://assets.ui.sh/avatars/15.webp?size=160',
        ],
    ],
])
<!--
    Review wall: a centred opener, then a masonry of quote cards (five ink stars, the quote, avatar with name
    and role) in one, two or three columns; the wall dissolves into the canvas at its foot, and a link to the
    full list sits under it. Rows live in collections.testimonials (quote, name, role, avatar). Clear the eyebrow, the intro
    or the link text to hide each.
-->
<section class="px-6 py-16 sm:py-28" data-testimonial-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h2 class="reveal-1 mx-auto mt-3 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            @if ($intro)
            <p class="reveal-2 mx-auto mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
            @endif
        </div>

        <div class="relative mt-12 sm:mt-16">
            <div class="gap-5 pb-10 columns-1 sm:columns-2 lg:columns-3">
                @foreach ($testimonials as $item)
                <figure class="reveal-{{ min($loop->iteration, 6) }} mb-5 break-inside-avoid rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)] motion-reduce:transition-none motion-reduce:hover:translate-y-0 sm:p-8" data-reveal>
                    <div class="flex gap-0.5 text-ink" role="img" aria-label="5 out of 5 stars">
                        @for ($i = 0; $i < 5; $i++)
                        <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M10 1.5l2.6 5.4 5.9.8-4.3 4.1 1.1 5.9L10 14.9l-5.3 2.8 1.1-5.9L1.5 7.7l5.9-.8z"/></svg>
                        @endfor
                    </div>
                    <blockquote class="mt-5">
                        <p class="text-[15px]/6 text-pretty text-lede">{{ $item->quote }}</p>
                    </blockquote>
                    <figcaption class="mt-6 flex items-center gap-3">
                        <img src="{{ $item->avatar }}" alt="" width="40" height="40" class="size-10 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
                        <div class="min-w-0">
                            <p class="text-[14px] font-semibold text-ink">{{ $item->name }}</p>
                            <p class="mt-0.5 text-[13px] text-muted">{{ $item->role }}</p>
                        </div>
                    </figcaption>
                </figure>
                @endforeach
            </div>
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-linear-to-t from-canvas to-transparent" aria-hidden="true"></div>
        </div>
        @if ($ctaText)
        <div class="reveal-2 flex justify-center" data-reveal>
            <a href="{{ $ctaLink }}" class="arrow-link inline-flex min-h-11 items-center gap-1.5 text-[15px] font-medium text-ink">
                {{ $ctaText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>
