@props([
    'heading' => 'Latest from Crate',
    'intro' => 'Counting, ordering and the quiet math of a small grocery, from the people who build the shelf-count app.',
    'linkText' => 'View all',
    'linkUrl' => '/blog',
    'posts' => [
        (object) ['title' => 'Counting a walk-in cooler in 12 minutes', 'excerpt' => 'Shelf order, not alphabetical order. How one Boise store counts 340 SKUs before the morning delivery.', 'image' => '/images/blocks/cover-04.jpg', 'url' => '/blog/walk-in-cooler-count', 'date' => 'Sep 18, 2026', 'readTime' => '5 min', 'category' => 'Operations', 'author' => 'Sam Nakamura', 'avatar' => 'https://assets.ui.sh/avatars/3.webp?size=160'],
        (object) ['title' => 'Why shelf tags now print on a Tuesday cadence', 'excerpt' => 'Vendor price changes land Monday night. Printing once, the next morning, cut reprints by 71%.', 'image' => '/images/blocks/cover-02.jpg', 'url' => '/blog/shelf-tags-tuesday', 'date' => 'Sep 10, 2026', 'readTime' => '4 min', 'category' => 'Product', 'author' => 'Casey Alvarez', 'avatar' => 'https://assets.ui.sh/avatars/8.webp?size=160'],
        (object) ['title' => 'Shrink is a scheduling problem', 'excerpt' => 'Most of what a grocer throws away was ordered on the wrong day. A long look at the data from 212 stores.', 'image' => '/images/blocks/cover-05.jpg', 'url' => '/blog/shrink-scheduling', 'date' => 'Sep 2, 2026', 'readTime' => '8 min', 'category' => 'Essays', 'author' => 'Robin Hayes', 'avatar' => 'https://assets.ui.sh/avatars/11.webp?size=160'],
        (object) ['title' => 'Larkspur Market’s first year with automatic reorders', 'excerpt' => 'A single-location grocer in Tucson let Crate write the produce order for twelve months. Here is what it got wrong.', 'image' => '/images/blocks/workspace-01.jpg', 'url' => '/blog/larkspur-market', 'date' => 'Aug 25, 2026', 'readTime' => '6 min', 'category' => 'Customers', 'author' => 'Drew Kim', 'avatar' => 'https://assets.ui.sh/avatars/5.webp?size=160'],
        (object) ['title' => 'Vendor invoices, matched to deliveries by default', 'excerpt' => 'Every case that comes off the truck is checked against the invoice line before anyone signs.', 'image' => '/images/blocks/cover-01.jpg', 'url' => '/blog/invoices-matched-to-deliveries', 'date' => 'Aug 14, 2026', 'readTime' => '3 min', 'category' => 'Product', 'author' => 'Parker Ellis', 'avatar' => 'https://assets.ui.sh/avatars/14.webp?size=160'],
        (object) ['title' => 'The math behind a 2.4% shrink target', 'excerpt' => 'Where the number comes from, why 3% is not a failure, and the two categories that move it most.', 'image' => '/images/blocks/cover-03.jpg', 'url' => '/blog/shrink-target-math', 'date' => 'Aug 6, 2026', 'readTime' => '7 min', 'category' => 'Essays', 'author' => 'Sam Nakamura', 'avatar' => 'https://assets.ui.sh/avatars/3.webp?size=160'],
    ],
])
<!--
    Blog grid: heading and intro left with a "view all" arrow link on the right, then a three-column grid
    of posts — cover image, category pill and date, title, excerpt, author avatar and name.
    Rows live in collections/posts.json; clear the link text to hide the link.
-->
<section class="px-6 py-16 sm:py-28" data-blog-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-wrap items-end justify-between gap-x-8 gap-y-6" data-reveal>
            <div>
                <h2 class="max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            </div>
            @if ($linkText)
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-ink">
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
        </div>

        <div class="mt-14 grid gap-x-8 gap-y-14 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
            <article class="group reveal-{{ min($loop->iteration, 6) }} flex flex-col" data-reveal>
                <a href="{{ $post->url }}" class="flex flex-1 flex-col">
                    <div class="overflow-hidden rounded-2xl outline-1 -outline-offset-1 outline-ink/10">
                        <img src="{{ $post->image }}" alt="" width="1200" height="800" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]" loading="lazy">
                    </div>
                    <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] text-faint">
                        <span class="inline-flex items-center rounded-full border border-line bg-panel px-2.5 py-0.5 text-[12px] font-medium text-muted">{{ $post->category }}</span>
                        <time>{{ $post->date }}</time>
                    </div>
                    <h3 class="mt-3 text-lg/7 font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                    <p class="mt-2 text-[14px]/6 text-pretty text-muted">{{ $post->excerpt }}</p>
                    <div class="mt-auto flex items-center gap-2.5 pt-5">
                        <img src="{{ $post->avatar }}" alt="" width="28" height="28" class="size-7 rounded-full object-cover outline-1 -outline-offset-1 outline-ink/10" loading="lazy">
                        <span class="text-[13px] font-medium text-ink">{{ $post->author }}</span>
                        <span class="text-[13px] text-faint" aria-hidden="true">·</span>
                        <span class="text-[13px] text-faint">{{ $post->readTime }}</span>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
