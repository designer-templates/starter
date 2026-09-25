@props([
    'eyebrow' => 'Our story',
    'heading' => 'From four units to 28,400',
    'intro' => 'I bought a duplex in Columbus in 2018 and kept its books in a spreadsheet with 40 tabs. Penrose is what replaced it, one landlord at a time. Here is how it went.',
    'milestones' => [
        (object) ['year' => '2019', 'title' => 'A ledger for four units', 'description' => 'Sam and I built the first version for my own two buildings over a winter in Columbus.'],
        (object) ['year' => '2020', 'title' => 'Twelve landlords in a group text', 'description' => 'Rent, deposits and repairs reconciled every night. Our first paying customer owned six units in Dayton.'],
        (object) ['year' => '2022', 'title' => 'A second office in Denver', 'description' => 'Jamie joined from a property management firm and opened the Denver office. 3,100 units by December.'],
        (object) ['year' => '2024', 'title' => 'Tax season without the shoebox', 'description' => 'Schedule E ready by the first week of March, for 11,600 units.'],
        (object) ['year' => '2026', 'title' => '28,400 units, 21 people', 'description' => 'Still two offices, still one flat price, still no spreadsheet.'],
    ],
])
<!--
    About, timeline: eyebrow, heading and intro on the left (sticky on desktop); on the right the
    milestones run down a hairline spine with an ink dot each: year in mono, a title and one line.
    Milestones are a repeater (year, title, description). Clear the eyebrow or the intro to hide it.
    The spine draws itself in, once, when the timeline scrolls into view.
-->
<section class="px-6 py-16 sm:py-28" data-about-05>
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-y-14 lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:sticky lg:top-24 lg:col-span-5 lg:self-start" data-reveal>
                @if ($eyebrow)
                <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="max-w-[20ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($intro)
                <p class="mt-5 max-w-[46ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
                @endif
            </div>

            <div class="relative lg:col-span-6 lg:col-start-7">
                <span class="absolute top-2 bottom-2 left-[4px] w-px bg-line" aria-hidden="true"></span>
                <span class="absolute top-2 bottom-2 left-[4px] w-px bg-ink/30" data-spine aria-hidden="true"></span>
                <ol>
                    @foreach ($milestones as $milestone)
                    <li class="reveal-{{ min($loop->iteration, 6) }} relative pb-12 pl-10 last:pb-0" data-reveal>
                        <span class="absolute top-1 left-0 size-2.5 rounded-full bg-ink ring-4 ring-canvas" aria-hidden="true"></span>
                        <p class="font-mono text-[12px] text-faint tabular-nums">{{ $milestone->year }}</p>
                        <h3 class="mt-2 text-lg font-medium tracking-tight text-ink">{{ $milestone->title }}</h3>
                        <p class="mt-1.5 max-w-[48ch] text-[15px]/6 text-pretty text-muted">{{ $milestone->description }}</p>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
<style>
    .js [data-about-05] [data-spine] { transform: scaleY(0); transform-origin: top; transition: transform 1.4s var(--ease-out-quart); }
    .js [data-about-05] [data-spine].is-drawn { transform: scaleY(1); }
    @media (prefers-reduced-motion: reduce) {
        .js [data-about-05] [data-spine] { transform: none; transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-about-05]:not([data-about-05-ready])').forEach(function (root) {
        root.setAttribute('data-about-05-ready', '');
        var spine = root.querySelector('[data-spine]');
        if (!spine) return;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) { spine.classList.add('is-drawn'); return; }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                spine.classList.add('is-drawn');
                io.disconnect();
            });
        }, { rootMargin: '0px 0px -15% 0px', threshold: 0.05 });
        io.observe(spine);
    });
})();
</script>
