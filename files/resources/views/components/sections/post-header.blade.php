@props([
    'backText' => 'All posts',
    'backUrl' => '/blog',
    'category' => 'Engineering',
    'date' => 'Sep 29, 2026',
    'readTime' => '7 min',
    'title' => 'Why every section is plain Blade',
    'excerpt' => 'We could have stored pages in a database and rendered them from JSON. We chose files you can open in your editor, and it has paid for itself every week since.',
    'author' => 'Marcus Bell',
    'authorRole' => 'Co-founder and CTO',
    'avatar' => '/images/team/marcus.svg',
    'image' => '/images/post-cards.jpg',
    'imageAlt' => 'A stack of plain white index cards held by a brass binder clip on an oak desk',
])
<!--
    The top of a blog post: a link back to the index, the category, date and reading time, the title as the
    page's h1, the excerpt as a standfirst, the author, then the cover photograph at full container width.
    On /blog/{slug} every value comes from that post's row in resources/data/collections/posts.json.
-->
<section class="pt-12 pb-10 sm:pt-16 sm:pb-14">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="max-w-3xl">
            <a href="{{ $backUrl }}" class="group inline-flex items-center gap-1.5 text-[14px] font-medium text-muted-foreground transition-colors duration-200 hover:text-foreground" data-reveal>
                <svg viewBox="0 0 24 24" class="size-4 transition-transform duration-200 group-hover:-translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                {{ $backText }}
            </a>
            <div class="reveal-1 mt-8 flex flex-wrap items-center gap-x-3 gap-y-2 text-[14px] text-muted-foreground" data-reveal>
                <span class="inline-flex items-center rounded-full border border-border bg-card px-2.5 py-0.5 text-[12px] font-medium text-muted-foreground">{{ $category }}</span>
                <time>{{ $date }}</time>
                <span aria-hidden="true">·</span>
                <span>{{ $readTime }} read</span>
            </div>
            <h1 class="reveal-2 mt-5 text-[2.5rem]/[1.08] font-semibold tracking-[-0.035em] text-balance text-foreground sm:text-[3.25rem]/[1.05]" data-reveal>{{ $title }}</h1>
            <p class="reveal-3 mt-6 max-w-[58ch] text-lg/8 text-pretty text-muted-foreground" data-reveal>{{ $excerpt }}</p>
            <div class="reveal-4 mt-8 flex items-center gap-3" data-reveal>
                <img src="{{ $avatar }}" alt="" width="44" height="44" class="size-11 rounded-full bg-muted object-cover">
                <div class="text-[14px]">
                    <p class="font-medium text-foreground">{{ $author }}</p>
                    <p class="text-muted-foreground">{{ $authorRole }}</p>
                </div>
            </div>
        </div>
        <div class="reveal-5 mt-12 overflow-hidden rounded-3xl outline-1 -outline-offset-1 outline-foreground/10 sm:mt-14" data-reveal>
            <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1067" fetchpriority="high" class="aspect-[3/2] w-full object-cover sm:aspect-[2/1]">
        </div>
    </div>
</section>
