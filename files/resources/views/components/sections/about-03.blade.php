@props([
    'image' => '/images/blocks/workspace-02.jpg',
    'imageAlt' => 'Two Umber founders working through the spring plan at a whiteboard',
    'caption' => 'The Minneapolis office, Mar 2026',
    'quote' => 'We started Umber because a garden center’s busiest 11 weeks were being run out of a three-ring binder.',
    'name' => 'Morgan Hayes',
    'role' => 'Co-founder and CEO, Umber',
    'paragraph' => 'I managed my family’s nursery in Minneapolis for a decade; Kai ran operations for a chain of hardware stores in Denver. In 2020 we counted 312 independent garden centers within a day’s drive of one of us that still tracked perennials on paper, and built Umber over one winter. It runs the counts at 590 of them now.',
    'linkText' => 'Read the founders’ letter',
    'linkUrl' => '/letter',
])
<!--
    About, photo and quote: a 4:3 photograph with a small caption on the left; on the right a large
    founder quote, the name and role, then a hairline, one paragraph and a text link. Clear the caption,
    the paragraph or the link text to hide it.
-->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid items-center gap-y-12 lg:grid-cols-2 lg:gap-x-20">
            <figure data-reveal>
                <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1200" height="900" loading="lazy" decoding="async" class="aspect-[4/3] w-full rounded-3xl object-cover outline-1 -outline-offset-1 outline-ink/10">
                @if ($caption)
                <figcaption class="mt-3 font-mono text-[12px] text-faint">{{ $caption }}</figcaption>
                @endif
            </figure>

            <div class="reveal-1" data-reveal>
                <blockquote class="max-w-[30ch] text-2xl font-medium tracking-tight text-balance text-ink sm:text-3xl">{{ $quote }}</blockquote>
                <div class="mt-6">
                    <p class="text-[15px] font-medium text-ink">{{ $name }}</p>
                    <p class="mt-0.5 text-[14px] text-muted">{{ $role }}</p>
                </div>
                @if ($paragraph)
                <p class="mt-8 max-w-[52ch] border-t border-line pt-8 text-[15px]/6 text-pretty text-muted">{{ $paragraph }}</p>
                @endif
                @if ($linkText)
                <a href="{{ $linkUrl }}" class="arrow-link mt-6 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-muted">
                    {{ $linkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
