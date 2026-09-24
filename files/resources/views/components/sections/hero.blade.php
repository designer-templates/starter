@props([
    'heading' => 'Your next great idea starts right here',
    'text' => 'Build pages, edit content, and control layouts. All inside of our visual editor built for developers.',
    'buttonText' => 'Start building for free',
    'buttonLink' => '/pricing',
    'buttonText2' => 'Watch demo',
    'buttonLink2' => '/#features',
    'socialProofText' => 'Loved by 2,000+ developers',
    'showMockup' => '1',
    'mockupUrl' => 'app.starter.dev/dashboard',
])
<!--
    Centered hero: a two-line headline (the second line in the faint tier), one paragraph,
    two buttons, a row of avatars with five stars, and a drawn dashboard window. Clear a
    button's text to hide it; clear the social proof text to drop that row; the toggle hides the window.
-->
<section class="px-6 pt-20 pb-12 sm:pt-28 sm:pb-16">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8 text-center">
        <h1 class="mx-auto max-w-3xl text-hero font-semibold tracking-[-0.04em] text-faint first-line:text-ink" data-reveal>
            {{ $heading }}
        </h1>
        <p class="reveal-1 mx-auto mt-6 max-w-[500px] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>

        <div class="reveal-2 mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
            @if ($buttonText)
            <a href="{{ $buttonLink }}" class="arrow-link inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">
                {{ $buttonText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
            @if ($buttonText2)
            <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">
                <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
                </svg>
                {{ $buttonText2 }}
            </a>
            @endif
        </div>

        @if ($socialProofText)
        <div class="reveal-3 mt-14 flex items-center justify-center gap-4" data-reveal>
            <div class="flex -space-x-2" aria-hidden="true">
                <div class="flex size-8 items-center justify-center rounded-full border-2 border-canvas bg-raised text-[10px] font-bold text-muted">EK</div>
                <div class="flex size-8 items-center justify-center rounded-full border-2 border-canvas bg-line-strong text-[10px] font-bold text-lede">TM</div>
                <div class="flex size-8 items-center justify-center rounded-full border-2 border-canvas bg-raised text-[10px] font-bold text-muted">AR</div>
                <div class="flex size-8 items-center justify-center rounded-full border-2 border-canvas bg-panel text-[10px] font-bold text-faint ring-1 ring-line ring-inset">JW</div>
                <div class="flex size-8 items-center justify-center rounded-full border-2 border-canvas bg-ink text-[10px] font-bold text-canvas">2k+</div>
            </div>
            <div class="text-left">
                <div class="flex items-center gap-0.5 text-star" aria-label="Rated five out of five stars">
                    <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20" class="size-3.5 fill-current" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <p class="mt-0.5 text-[13px] text-muted">{{ $socialProofText }}</p>
            </div>
        </div>
        @endif

        @if ($showMockup)
        <div class="reveal-4 mt-14" data-reveal>
            <!-- The product window: drawn in markup, so it takes the palette and never blurs. -->
            <div class="w-full rounded-xl bg-raised p-10 lg:rounded-3xl lg:p-1">
                <div class="relative overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5">
                    
                    <div class="bg-canvas/60 text-left aspect-[16/10]" aria-hidden="true">
                        <img src="/images/mockup.png" class="w-full h-full" />
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
