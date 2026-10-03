@props([
    'content' => '<p>The post itself, as HTML from the posts collection.</p>',
    'moreHeading' => 'Keep reading',
    'moreLinkText' => 'All posts',
    'moreLinkUrl' => '/blog',
    'more' => [],
])
<!--
    The body of a blog post: the stored HTML from the post's row, styled by .prose in site.css and kept on
    the same left edge as the header, then up to three more posts as cards. On /blog/{slug} the page passes
    every other post as "more"; clear the heading to hide that row.
-->
<section class="pt-14 pb-20 sm:pt-20 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="prose max-w-[65ch]" data-reveal>{!! $content !!}</div>

        @if ($moreHeading)
        <div class="mt-20 border-t border-border pt-12 sm:mt-24 sm:pt-14">
            <div class="flex flex-wrap items-end justify-between gap-4" data-reveal>
                <h2 class="text-2xl/8 font-semibold tracking-tight text-foreground">{{ $moreHeading }}</h2>
                <a href="{{ $moreLinkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-foreground">
                    {{ $moreLinkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
            <div class="mt-10 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($more as $post)
                @if ($loop->index < 3)
                <article class="group" data-reveal>
                    <a href="{{ $post->url }}" class="block">
                        <div class="overflow-hidden rounded-2xl outline-1 -outline-offset-1 outline-foreground/10">
                            <img src="{{ $post->image }}" alt="" width="1200" height="800" loading="lazy" decoding="async" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]">
                        </div>
                        <p class="mt-5 text-[13px] text-muted-foreground"><time>{{ $post->date }}</time> · {{ $post->readTime }} read</p>
                        <h3 class="mt-2 text-lg/7 font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                    </a>
                </article>
                @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
