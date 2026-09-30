@props([
    'heading' => 'Ready when you are',
    'text' => 'Start on the free plan and invite your team when it clicks. Most teams have a page live by the end of the day.',
    'buttonText' => 'Create your workspace',
    'buttonLink' => '/pricing',
    'buttonText2' => 'Talk to sales',
    'buttonLink2' => '/contact',
    'footnote' => 'Setup takes about four minutes.',
])
<!-- The closing ask, kept quiet: a heading, one line of copy, two buttons, and a footnote. Clear the secondary text or the footnote to hide them. -->
<section id="cta" class="py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="mx-auto w-full max-w-2xl text-center">
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-foreground" data-reveal>{{ $heading }}</h2>
            <p class="reveal-1 mx-auto mt-5 max-w-[52ch] text-lg/8 text-pretty text-muted-foreground" data-reveal>{{ $text }}</p>
            <div class="reveal-2 mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row" data-reveal>
                <a href="{{ $buttonLink }}" class="inline-flex w-full items-center justify-center rounded-xl bg-primary px-7 py-3.5 text-[15px] font-medium text-primary-foreground shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $buttonText }}</a>
                @if ($buttonText2)
                <a href="{{ $buttonLink2 }}" class="inline-flex w-full items-center justify-center rounded-xl border border-border bg-card px-7 py-3.5 text-[15px] font-medium text-foreground/78 transition-colors duration-200 hover:border-border-strong hover:bg-muted active:scale-[.98] sm:w-auto">{{ $buttonText2 }}</a>
                @endif
            </div>
            @if ($footnote)
            <p class="reveal-3 mt-6 text-[14px] text-muted-foreground/80" data-reveal>{{ $footnote }}</p>
            @endif
        </div>
    </div>
</section>
