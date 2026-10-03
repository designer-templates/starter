@props([
    'featuredLabel' => 'Latest',
    'posts' => [],
])
<!--
    The blog index: the newest post as a wide feature (cover left, title, excerpt and author right), then every
    other post in a three-column grid of cards. Posts live in resources/data/collections/posts.json, newest
    first; each card links to its own page at /blog/{slug}. Clear the label to hide it.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="grid gap-x-8 gap-y-14 pt-14 sm:grid-cols-2 sm:pt-16 lg:grid-cols-3">
            @foreach ($posts as $post)
            @if ($loop->first)
            <article class="group border-b border-border pb-14 sm:col-span-2 sm:pb-16 lg:col-span-3" data-reveal>
                <a href="{{ $post->url }}" class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
                    <div class="overflow-hidden rounded-3xl outline-1 -outline-offset-1 outline-foreground/10 lg:col-span-7">
                        <img src="{{ $post->image }}" alt="{{ $post->imageAlt }}" width="1600" height="1067" fetchpriority="high" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]">
                    </div>
                    <div class="lg:col-span-5">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] text-muted-foreground">
                            @if ($featuredLabel)
                            <span class="inline-flex items-center rounded-full bg-primary px-2.5 py-0.5 text-[12px] font-medium text-primary-foreground">{{ $featuredLabel }}</span>
                            @endif
                            <span class="inline-flex items-center rounded-full border border-border bg-card px-2.5 py-0.5 text-[12px] font-medium text-muted-foreground">{{ $post->category }}</span>
                            <time>{{ $post->date }}</time>
                        </div>
                        <h2 class="mt-4 text-[1.75rem]/[1.2] font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent sm:text-[2rem]/[1.15]">{{ $post->title }}</h2>
                        <p class="mt-4 max-w-[48ch] text-[16px]/7 text-pretty text-muted-foreground">{{ $post->excerpt }}</p>
                        <div class="mt-7 flex items-center gap-3">
                            <img src="{{ $post->avatar }}" alt="" width="40" height="40" class="size-10 rounded-full bg-muted object-cover">
                            <div class="text-[14px]">
                                <p class="font-medium text-foreground">{{ $post->author }}</p>
                                <p class="text-muted-foreground">{{ $post->authorRole }} · {{ $post->readTime }} read</p>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @else
            <article class="group flex flex-col" data-reveal>
                <a href="{{ $post->url }}" class="flex flex-1 flex-col">
                    <div class="overflow-hidden rounded-2xl outline-1 -outline-offset-1 outline-foreground/10">
                        <img src="{{ $post->image }}" alt="" width="1200" height="800" loading="lazy" decoding="async" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]">
                    </div>
                    <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] text-muted-foreground">
                        <span class="inline-flex items-center rounded-full border border-border bg-card px-2.5 py-0.5 text-[12px] font-medium text-muted-foreground">{{ $post->category }}</span>
                        <time>{{ $post->date }}</time>
                    </div>
                    <h2 class="mt-3 text-lg/7 font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h2>
                    <p class="mt-2 text-[14px]/6 text-pretty text-muted-foreground">{{ $post->excerpt }}</p>
                    <div class="mt-auto flex items-center gap-2.5 pt-5 text-[13px]">
                        <img src="{{ $post->avatar }}" alt="" width="28" height="28" loading="lazy" decoding="async" class="size-7 rounded-full bg-muted object-cover">
                        <span class="font-medium text-foreground">{{ $post->author }}</span>
                        <span class="text-muted-foreground" aria-hidden="true">·</span>
                        <span class="text-muted-foreground">{{ $post->readTime }} read</span>
                    </div>
                </a>
            </article>
            @endif
            @endforeach
        </div>
    </div>
</section>
