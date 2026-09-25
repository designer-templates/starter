@props([
    'eyebrow' => 'Customers',
    'heading' => 'Shops that count on Ferrule',
    'intro' => '1,140 independent bike shops, from one-bench repair rooms to three-store chains.',
    'testimonials' => [
        (object) [
            'quote' => 'Counted 4,300 SKUs in a weekend with the scanner. The old spreadsheet took a month.',
            'name' => 'Jamie Rivera',
            'role' => 'Owner, Paddock Cycles',
            'avatar' => 'https://assets.ui.sh/avatars/2.webp?size=160',
        ],
        (object) [
            'quote' => 'Special orders stopped falling through the cracks. Every one has a status the customer can see.',
            'name' => 'Alex Chen',
            'role' => 'Service manager, Tamarack & Spoke',
            'avatar' => 'https://assets.ui.sh/avatars/4.webp?size=160',
        ],
        (object) [
            'quote' => 'Ferrule flags a tire we sell 30 of a month before we run out. Reorders write themselves.',
            'name' => 'Morgan Brooks',
            'role' => 'Co-owner, Rook Bikes',
            'avatar' => 'https://assets.ui.sh/avatars/6.webp?size=160',
        ],
        (object) [
            'quote' => 'Work orders, parts, and the register in one tab. Our Saturday line moves twice as fast.',
            'name' => 'Casey Okafor',
            'role' => 'Shop lead, Tenor Cyclery',
            'avatar' => 'https://assets.ui.sh/avatars/8.webp?size=160',
        ],
        (object) [
            'quote' => 'Three stores, one stock count. I can see the Boise inventory from the Tucson bench.',
            'name' => 'Parker Hayes',
            'role' => 'General manager, Foundry Bike Co.',
            'avatar' => 'https://assets.ui.sh/avatars/10.webp?size=160',
        ],
        (object) [
            'quote' => 'Moved 11 years of history over in an afternoon. Nothing was lost, not one serial number.',
            'name' => 'Riley Patel',
            'role' => 'Owner, Wheelhouse',
            'avatar' => 'https://assets.ui.sh/avatars/12.webp?size=160',
        ],
        (object) [
            'quote' => 'The margin report told us to stop stocking 2 brands. Best decision we made last year.',
            'name' => 'Sage Kim',
            'role' => 'Owner, Crank Works',
            'avatar' => 'https://assets.ui.sh/avatars/14.webp?size=160',
        ],
        (object) [
            'quote' => 'Support picked up on the second ring and fixed it while I watched.',
            'name' => 'Drew Alvarez',
            'role' => 'Buyer, Pannier Supply',
            'avatar' => 'https://assets.ui.sh/avatars/16.webp?size=160',
        ],
    ],
])
<!--
    Auto-scrolling testimonials: a centred opener, then one full-bleed row of quote cards (avatar, name and
    role, a short quote) that drifts left, fades at both edges, pauses on hover and stands still under reduced
    motion; the script clones the row once so the loop is seamless. Rows live in collections.testimonials
    (quote, name, role, avatar). Clear the eyebrow or the intro to hide each.
-->
<section class="overflow-hidden px-6 py-16 sm:py-28" data-testimonial-05>
    <div class="mx-auto w-full max-w-6xl text-center">
        @if ($eyebrow)
        <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
        @endif
        <h2 class="reveal-1 mx-auto mt-3 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
        @if ($intro)
        <p class="reveal-2 mx-auto mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        @endif
    </div>

    <div class="reveal-3 -mx-6 mt-12 overflow-hidden [mask-image:linear-gradient(to_right,transparent,var(--color-ink)_10%,var(--color-ink)_90%,transparent)] sm:mt-16" data-reveal data-marquee>
        <div class="flex w-max pl-5" data-marquee-track>
            @foreach ($testimonials as $item)
            <figure class="mr-5 flex w-[20rem] shrink-0 flex-col rounded-2xl border border-line bg-panel p-6 transition-colors duration-200 hover:border-line-strong sm:w-[22rem]">
                <figcaption class="flex items-center gap-3">
                    <img src="{{ $item->avatar }}" alt="" width="40" height="40" class="size-10 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
                    <div class="min-w-0">
                        <p class="text-[14px] font-semibold text-ink">{{ $item->name }}</p>
                        <p class="mt-0.5 text-[13px] text-muted">{{ $item->role }}</p>
                    </div>
                </figcaption>
                <blockquote class="mt-5">
                    <p class="text-[15px]/6 text-pretty text-lede">{{ $item->quote }}</p>
                </blockquote>
            </figure>
            @endforeach
        </div>
    </div>
    <style>
        [data-testimonial-05] [data-marquee-track][data-cloned] { animation: testimonial-05-drift var(--marquee-duration, 48s) linear infinite; }
        [data-testimonial-05] [data-marquee]:hover [data-marquee-track] { animation-play-state: paused; }
        @keyframes testimonial-05-drift { to { translate: -50% 0; } }
        @media (prefers-reduced-motion: reduce) {
            [data-testimonial-05] [data-marquee-track] { animation: none; }
        }
    </style>
    <script>
    (function () {
        document.querySelectorAll('[data-testimonial-05]:not([data-testimonial-05-ready])').forEach(function (root) {
            root.setAttribute('data-testimonial-05-ready', '');
            var track = root.querySelector('[data-marquee-track]');
            if (!track || !track.children.length) return;
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            Array.prototype.slice.call(track.children).forEach(function (item) {
                var copy = item.cloneNode(true);
                copy.setAttribute('aria-hidden', 'true');
                track.appendChild(copy);
            });
            track.style.setProperty('--marquee-duration', Math.round(track.scrollWidth / 2 / 52) + 's');
            track.setAttribute('data-cloned', '');
        });
    })();
    </script>
</section>
