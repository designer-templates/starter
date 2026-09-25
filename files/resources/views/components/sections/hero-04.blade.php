@props([
    'image' => '/images/blocks/dashboard-inbox.jpg',
    'imageAlt' => 'The Plume shared inbox: the conversation list beside an open customer message',
    'toastText' => 'Sent · Reply to Jordan Rivera',
    'showPill' => '1',
    'pillText' => 'New: shared drafts',
    'heading' => 'One inbox your whole team can answer',
    'text' => 'Plume turns support@ and hello@ into one shared inbox with assignments, private notes and a promise: every customer hears back within one business day.',
    'buttonText' => 'Start free',
    'buttonLink' => '/signup',
    'buttonText2' => 'Watch the 2-minute tour',
    'buttonLink2' => '/tour',
])
<!--
    Product-first hero: a product screenshot framed as a window comes first, with a floating "Sent" toast
    overlapping its bottom-right corner that slides in once the window has arrived. Centered beneath: an
    announcement pill with a dot (toggle), the headline, intro, a primary button and a tour link with a play
    glyph. Swap the image for your own screenshot (3:2 or 16:10 works best). Clear the toast text to drop the
    toast; clear a button's text to hide it.
-->
<section class="px-6 pt-16 pb-12 sm:pt-20 sm:pb-16" data-hero-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="mb-16 text-center sm:mb-20">
            @if ($showPill)
            <a href="{{ $buttonLink2 }}" class="reveal-1 inline-flex items-center gap-2 rounded-full border border-line bg-panel px-3 py-1 text-[12px] font-medium text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink" data-reveal>
                <span class="size-1.5 rounded-full bg-ink" aria-hidden="true"></span>
                {{ $pillText }}
            </a>
            @endif
            <h1 class="reveal-2 mx-auto mt-6 max-w-[20ch] text-hero font-semibold tracking-[-0.04em] text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-3 mx-auto mt-6 max-w-[54ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>
            <div class="reveal-4 mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
                @if ($buttonText)
                <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
                @endif
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel py-3.5 pr-7 pl-5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">
                    <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
                    </svg>
                    {{ $buttonText2 }}
                </a>
                @endif
            </div>
        </div>
        <div class="relative mx-auto max-w-5xl" data-reveal>
            <div class="overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1067" class="block h-auto w-full">
            </div>
            @if ($toastText)
            <!-- The toast: slides in once after the window has arrived. -->
            <div class="absolute -bottom-5 right-4 flex items-center gap-2.5 rounded-xl border border-line bg-panel py-2.5 pr-4 pl-3 text-[13px] font-medium text-ink shadow-[var(--shadow-card)] sm:right-8" data-toast aria-hidden="true">
                <span class="flex size-5 items-center justify-center rounded-full bg-ink text-canvas">
                    <svg viewBox="0 0 20 20" class="size-3 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd"/></svg>
                </span>
                {{ $toastText }}
            </div>
            @endif
        </div>
    </div>
</section>
<style>
    .js [data-hero-04] [data-toast] { opacity: 0; translate: 0 14px; transition: opacity .55s var(--ease-spring), translate .55s var(--ease-spring); }
    .js [data-hero-04].is-sent [data-toast] { opacity: 1; translate: 0 0; }
    @media (prefers-reduced-motion: reduce) {
        .js [data-hero-04] [data-toast] { opacity: 1; translate: 0 0; transition: none; }
    }
</style>
<script>
(function () {
    document.querySelectorAll('[data-hero-04]:not([data-hero-04-ready])').forEach(function (root) {
        root.setAttribute('data-hero-04-ready', '');
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        function send() { root.classList.add('is-sent'); }
        if (reduce || !('IntersectionObserver' in window)) { send(); return; }
        var observer = new IntersectionObserver(function (entries) {
            if (!entries.some(function (e) { return e.isIntersecting; })) return;
            observer.disconnect();
            setTimeout(send, 1100);
        }, { threshold: 0.15 });
        observer.observe(root);
    });
})();
</script>
