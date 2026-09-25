@props([
    'eyebrow' => 'Customers',
    'heading' => 'Front desks that stopped chasing no-shows',
    'testimonials' => [
        (object) [
            'quote' => 'No-shows dropped from 14% to 6% in the first quarter. Corva texts the reminder, fills the gap from the waitlist, and nobody at the front desk touches it.',
            'name' => 'Morgan Ellis',
            'role' => 'Practice manager, Inkwell & Finch',
            'avatar' => 'https://assets.ui.sh/avatars/3.webp?size=160',
            'company' => 'Inkwell & Finch',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path fill-rule='evenodd' d='M12 2.5 21.5 12 12 21.5 2.5 12Zm0 5L7.5 12l4.5 4.5 4.5-4.5Z'/></svg>",
        ],
        (object) [
            'quote' => 'We run three locations on one calendar now. Moving a provider between our two Boise offices is one drag, and the confirmations go out on their own.',
            'name' => 'Jordan Okafor',
            'role' => 'Operations lead, Pell Family Medicine',
            'avatar' => 'https://assets.ui.sh/avatars/7.webp?size=160',
            'company' => 'Pell',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='2.25' stroke-linecap='round' aria-hidden='true'><circle cx='12' cy='12' r='9'/><path d='M12 7.5v9M7.5 12h9'/></svg>",
        ],
        (object) [
            'quote' => 'The waitlist alone paid for it. Corva filled 212 cancelled slots last year that we would simply have lost.',
            'name' => 'Riley Chen',
            'role' => 'Owner, Windrow Physical Therapy',
            'avatar' => 'https://assets.ui.sh/avatars/11.webp?size=160',
            'company' => 'Windrow',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='2.25' stroke-linecap='round' aria-hidden='true'><path d='M3 8.5c3 0 3 2.5 6 2.5s3-2.5 6-2.5 3 2.5 6 2.5M3 15.5c3 0 3 2.5 6 2.5s3-2.5 6-2.5 3 2.5 6 2.5'/></svg>",
        ],
        (object) [
            'quote' => 'Setup took an afternoon, including 9,400 patient records. The team in Raleigh answered every question the same day.',
            'name' => 'Avery Kim',
            'role' => 'Office administrator, Fairbanks Pediatrics',
            'avatar' => 'https://assets.ui.sh/avatars/14.webp?size=160',
            'company' => 'Fairbanks',
            'logo' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><rect x='3' y='3' width='8' height='8' rx='2'/><rect x='13' y='3' width='8' height='8' rx='4'/><rect x='3' y='13' width='8' height='8' rx='4'/><rect x='13' y='13' width='8' height='8' rx='2'/></svg>",
        ],
    ],
])
<!--
    Pull-quote carousel: a left opener with the prev/next buttons and a mono counter beside it, then one quote
    at a time in a scroll-snap row — the quote large in the display face, a 56px portrait with name and role,
    the company mark on the right. Rows live in collections.testimonials (quote, name, role, avatar, company,
    logo; the logo is inline SVG on currentColor). Clear the eyebrow to hide it.
-->
<section class="px-6 py-16 sm:py-28" data-testimonial-01>
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-col gap-8 sm:flex-row sm:items-end sm:justify-between">
            <div>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
                @endif
                <h2 class="reveal-1 mt-3 max-w-2xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            </div>
            <div class="reveal-2 flex shrink-0 items-center gap-3" data-reveal>
                <span class="mr-2 font-mono text-[12px] text-muted tabular-nums" data-counter>1 / 4</span>
                <button type="button" class="flex size-11 items-center justify-center rounded-full border border-line bg-panel text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] disabled:pointer-events-none disabled:opacity-40" data-prev aria-label="Previous quote">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="flex size-11 items-center justify-center rounded-full border border-line bg-panel text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] disabled:pointer-events-none disabled:opacity-40" data-next aria-label="Next quote">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <div class="reveal-3 mt-12 sm:mt-16" data-reveal>
            <div class="flex snap-x snap-mandatory overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden" data-track tabindex="0" aria-label="Customer quotes">
                @foreach ($testimonials as $item)
                <figure class="w-full shrink-0 snap-start">
                    <blockquote>
                        <p class="max-w-4xl font-display text-2xl/snug font-medium tracking-tight text-balance text-ink sm:text-3xl/snug">{{ $item->quote }}</p>
                    </blockquote>
                    <figcaption class="mt-10 flex items-center justify-between gap-6 border-t border-line pt-8">
                        <div class="flex items-center gap-4">
                            <img src="{{ $item->avatar }}" alt="" width="56" height="56" class="size-14 shrink-0 rounded-full object-cover outline-1 -outline-offset-1 outline-line" loading="lazy">
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
        </div>
    </div>
    <script>
    (function () {
        document.querySelectorAll('[data-testimonial-01]:not([data-testimonial-01-ready])').forEach(function (root) {
            root.setAttribute('data-testimonial-01-ready', '');
            var track = root.querySelector('[data-track]');
            if (!track || !track.children.length) return;
            var slides = track.children;
            var counter = root.querySelector('[data-counter]');
            var prev = root.querySelector('[data-prev]');
            var next = root.querySelector('[data-next]');
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var raf = null;
            function index() { return Math.round(track.scrollLeft / track.clientWidth); }
            function update() {
                var i = index();
                if (counter) counter.textContent = (i + 1) + ' / ' + slides.length;
                if (prev) prev.disabled = i === 0;
                if (next) next.disabled = i === slides.length - 1;
            }
            function go(step) {
                var i = Math.max(0, Math.min(slides.length - 1, index() + step));
                track.scrollTo({ left: i * track.clientWidth, behavior: reduce ? 'auto' : 'smooth' });
            }
            if (prev) prev.addEventListener('click', function () { go(-1); });
            if (next) next.addEventListener('click', function () { go(1); });
            track.addEventListener('keydown', function (event) {
                if (event.key === 'ArrowRight') { event.preventDefault(); go(1); }
                if (event.key === 'ArrowLeft') { event.preventDefault(); go(-1); }
            });
            track.addEventListener('scroll', function () {
                cancelAnimationFrame(raf);
                raf = requestAnimationFrame(update);
            }, { passive: true });
            window.addEventListener('resize', update);
            update();
        });
    })();
    </script>
</section>
