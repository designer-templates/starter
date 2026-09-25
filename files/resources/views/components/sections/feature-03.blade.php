@props([
    'eyebrow' => 'How it works',
    'heading' => 'Move your help desk in four steps',
    'intro' => 'Pebble copies tickets, contacts, and attachments between help desks with the history intact — and lets you rehearse the whole move before anyone notices.',
    'steps' => [
        (object) ['title' => 'Connect both desks', 'text' => 'A read-only key for the source, a scoped key for the destination. Nothing is written yet.'],
        (object) ['title' => 'Map the fields', 'text' => 'Pebble matches statuses, tags, and custom fields, then shows you the 6 it could not guess.'],
        (object) ['title' => 'Run a rehearsal', 'text' => 'A full dry run on a copy. Every mismatch lands in a list you can fix before the real thing.'],
        (object) ['title' => 'Cut over on a Sunday', 'text' => 'Pick the hour. Pebble moves the backlog, replays anything that arrived mid-move, and hands you the report.'],
    ],
    'image' => '/images/blocks/dashboard-activity.jpg',
    'imageAlt' => 'The finished migration report: tickets moved, contacts matched, attachments copied, and the run log',
])
<!--
    Numbered steps: a centred opener, four steps on a horizontal rail joined by a hairline that runs behind the
    number chips, and under it one wide product screenshot framed as a window showing the outcome. Steps are a
    repeater in the yml; swap the image for your own screenshot (a wide 21:9 crop works best). Clear the eyebrow
    to hide it. The number chips fill one after another as the rail scrolls into view.
-->
<section class="px-6 py-16 sm:py-28" data-feature-03>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h2 class="reveal-1 mx-auto mt-4 max-w-2xl text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-2 mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        </div>

        <ol class="relative mt-14 grid gap-10 sm:mt-16 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8" data-rail>
            <div class="absolute top-4 right-0 left-0 hidden h-px bg-line lg:block" aria-hidden="true"></div>
            @foreach ($steps as $step)
            <li class="reveal-{{ min($loop->iteration, 6) }} relative" data-reveal>
                <span class="relative z-10 flex size-8 items-center justify-center rounded-full border border-line bg-panel font-mono text-[12px] text-muted transition-[background-color,color,border-color] duration-500" data-chip style="--i: {{ $loop->index }}">{{ $loop->iteration }}</span>
                <h3 class="mt-5 text-base font-medium text-ink">{{ $step->title }}</h3>
                <p class="mt-2 max-w-[34ch] text-[14px]/6 text-pretty text-muted">{{ $step->text }}</p>
            </li>
            @endforeach
        </ol>

        <div class="reveal-4 mt-16 overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5 sm:mt-20" data-reveal>
            <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="686" class="block h-auto w-full" loading="lazy">
        </div>
    </div>
</section>
<style>
    /* Chips fill in sequence once the rail is on screen. */
    [data-feature-03] [data-rail].is-in [data-chip] { background-color: var(--color-ink); border-color: var(--color-ink); color: var(--color-canvas); transition-delay: calc(var(--i, 0) * 220ms); }
    @media (prefers-reduced-motion: reduce) {
        [data-feature-03] [data-chip] { transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-feature-03]:not([data-feature-03-ready])').forEach(function (root) {
        root.setAttribute('data-feature-03-ready', '');
        var rail = root.querySelector('[data-rail]');
        if (!rail) return;
        if (!('IntersectionObserver' in window)) { rail.classList.add('is-in'); return; }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                rail.classList.add('is-in');
                io.disconnect();
            });
        }, { threshold: 0.5 });
        io.observe(rail);
    });
})();
</script>
