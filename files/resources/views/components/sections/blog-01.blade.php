@props([
    'eyebrow' => 'Blog',
    'heading' => 'Writing on pay, tips and the back office',
    'intro' => 'What the Outset team learns running payroll for 1,140 restaurants, written down before we forget it.',
    'linkText' => 'View all posts',
    'linkUrl' => '/blog',
    'posts' => [
        (object) ['title' => 'Tip pooling, explained for the people doing the pooling', 'excerpt' => 'Every state draws the line somewhere different between who can share and who cannot. Here is the version we hand to a new manager on day one, with the three mistakes we see most.', 'image' => '/images/blocks/cover-01.jpg', 'url' => '/blog/tip-pooling-explained', 'date' => 'Sep 12, 2026', 'readTime' => '7 min', 'category' => 'Operations', 'author' => 'Jordan Rivera', 'avatar' => 'https://assets.ui.sh/avatars/4.webp?size=160'],
        (object) ['title' => 'What changed in Colorado overtime rules this fall', 'excerpt' => 'The daily threshold moved and the meal-break credit went away. What it means for a 28-person kitchen.', 'image' => '/images/blocks/cover-02.jpg', 'url' => '/blog/colorado-overtime-fall', 'date' => 'Sep 4, 2026', 'readTime' => '5 min', 'category' => 'Compliance', 'author' => 'Morgan Chen', 'avatar' => 'https://assets.ui.sh/avatars/7.webp?size=160'],
        (object) ['title' => 'How Pearl Street Diner cut payroll day to 40 minutes', 'excerpt' => 'Two locations, 61 people, one owner who used to lose every other Monday to a spreadsheet.', 'image' => '/images/blocks/cover-03.jpg', 'url' => '/blog/pearl-street-diner', 'date' => 'Aug 27, 2026', 'readTime' => '6 min', 'category' => 'Customers', 'author' => 'Avery Okafor', 'avatar' => 'https://assets.ui.sh/avatars/2.webp?size=160'],
        (object) ['title' => 'The case for a mid-week pay run', 'excerpt' => 'Tuesday deposits clear before the weekend rush, and the overtime math is already settled.', 'image' => '/images/blocks/cover-04.jpg', 'url' => '/blog/mid-week-pay-run', 'date' => 'Aug 19, 2026', 'readTime' => '4 min', 'category' => 'Product', 'author' => 'Reese Patel', 'avatar' => 'https://assets.ui.sh/avatars/9.webp?size=160'],
        (object) ['title' => 'Onboarding a line cook in nine fields, not thirty', 'excerpt' => 'We removed every question the I-9 already answers and the form now takes under four minutes on a phone.', 'image' => '/images/blocks/cover-05.jpg', 'url' => '/blog/onboarding-nine-fields', 'date' => 'Aug 11, 2026', 'readTime' => '5 min', 'category' => 'Product', 'author' => 'Jamie Brooks', 'avatar' => 'https://assets.ui.sh/avatars/12.webp?size=160'],
    ],
])
<!--
    Blog index: a left opener with a "view all" arrow link at the right, then the first post featured
    (cover, category, title, excerpt, author) in the left seven columns and the rest as a hairline list
    in the right five. Rows live in collections/posts.json; clear the eyebrow or the link text to hide them.
-->
<section class="px-6 py-16 sm:py-28" data-blog-01>
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-wrap items-end justify-between gap-x-8 gap-y-6" data-reveal>
            <div>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-3 max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            </div>
            @if ($linkText)
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-ink">
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
        </div>

        <div class="mt-14 grid gap-x-12 sm:mt-16 lg:grid-cols-12" style="--rows: {{ max(count($posts) - 1, 1) }}">
            @foreach ($posts as $post)
            @if ($loop->first)
            <article class="group reveal-1 lg:col-span-7 lg:[grid-row:span_var(--rows)]" data-reveal>
                <a href="{{ $post->url }}" class="block">
                    <div class="overflow-hidden rounded-2xl outline-1 -outline-offset-1 outline-ink/10">
                        <img src="{{ $post->image }}" alt="" width="1200" height="800" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]" loading="lazy">
                    </div>
                    <div class="mt-6 flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] text-faint">
                        <span class="inline-flex items-center rounded-full border border-line bg-panel px-2.5 py-0.5 text-[12px] font-medium text-muted">{{ $post->category }}</span>
                        <time>{{ $post->date }}</time>
                        <span aria-hidden="true">·</span>
                        <span>{{ $post->readTime }}</span>
                    </div>
                    <h3 class="mt-4 max-w-[28ch] text-2xl font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                    <p class="mt-3 max-w-[58ch] text-[15px]/6 text-pretty text-muted">{{ $post->excerpt }}</p>
                    <div class="mt-5 flex items-center gap-3">
                        <img src="{{ $post->avatar }}" alt="" width="32" height="32" class="size-8 rounded-full object-cover outline-1 -outline-offset-1 outline-ink/10" loading="lazy">
                        <span class="text-[14px] font-medium text-ink">{{ $post->author }}</span>
                    </div>
                </a>
            </article>
            @else
            <article class="group reveal-{{ min($loop->iteration, 6) }} border-t border-line py-5 lg:col-span-5 lg:col-start-8 lg:flex lg:items-center lg:py-0 {{ $loop->iteration === 2 ? 'max-lg:mt-10' : '' }}" data-reveal>
                <a href="{{ $post->url }}" class="block w-full py-1">
                    <p class="flex items-center gap-2 text-[13px] text-faint">
                        <time>{{ $post->date }}</time>
                        <span aria-hidden="true">·</span>
                        <span>{{ $post->readTime }}</span>
                    </p>
                    <h3 class="mt-2 text-[17px]/6 font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                    <p class="mt-1.5 text-[14px]/6 text-pretty text-muted">{{ $post->excerpt }}</p>
                </a>
            </article>
            @endif
            @endforeach
        </div>
    </div>
</section>
