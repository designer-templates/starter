@props([
    'eyebrow' => 'Journal',
    'heading' => 'Field notes from crews who plan ahead',
    'intro' => 'Scheduling, weather and the business of keeping 11 trucks busy, from the team behind Almanac.',
    'readText' => 'Read the post',
    'posts' => [
        (object) ['title' => 'Rain days, rescheduled before the crew leaves the yard', 'excerpt' => 'Almanac watches the hourly forecast for every job on the board and moves the ones that would get rained out, then texts the customer the new slot.', 'image' => '/images/blocks/cover-03.jpg', 'url' => '/blog/rain-days-rescheduled', 'date' => 'Sep 16, 2026', 'readTime' => '6 min', 'category' => 'Product'],
        (object) ['title' => 'Routing 11 crews around one Denver downpour', 'excerpt' => 'A Thursday in August, hour by hour, at a company that did not lose a single job to the weather.', 'image' => '/images/blocks/cover-05.jpg', 'url' => '/blog/denver-downpour', 'date' => 'Sep 9, 2026', 'readTime' => '5 min', 'category' => 'Customers'],
        (object) ['title' => 'Mow, edge, blow: the order matters more than you think', 'excerpt' => 'Four minutes a lawn adds up to a fifth truck by June.', 'image' => '/images/blocks/cover-01.jpg', 'url' => '/blog/mow-edge-blow', 'date' => 'Sep 1, 2026', 'readTime' => '4 min', 'category' => 'Field'],
        (object) ['title' => 'Quoting a fall cleanup from a satellite photo', 'excerpt' => 'Square footage, tree cover and the driveway length, measured before anyone drives out.', 'image' => '/images/blocks/cover-04.jpg', 'url' => '/blog/quote-from-satellite', 'date' => 'Aug 24, 2026', 'readTime' => '7 min', 'category' => 'Product'],
        (object) ['title' => 'Why we hire for the season in March, not May', 'excerpt' => 'The crews that start early keep 23% more customers through the fall.', 'image' => '/images/blocks/workspace-01.jpg', 'url' => '/blog/hire-in-march', 'date' => 'Aug 15, 2026', 'readTime' => '5 min', 'category' => 'Company'],
    ],
])
<!--
    Magazine blog: a centred opener, then the first post as a large tile with its title over a dark veil at
    the bottom of the cover, spanning two columns; beside it the remaining posts stacked with square
    thumbnails, category and title. Rows live in collections/posts.json; clear the eyebrow to hide it.
-->
<section class="px-6 py-16 sm:py-28" data-blog-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mx-auto mt-3 max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            <p class="mx-auto mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
        </div>

        <div class="mt-14 grid gap-x-10 sm:mt-16 lg:grid-cols-3" style="--rows: {{ max(count($posts) - 1, 1) }}">
            @foreach ($posts as $post)
            @if ($loop->first)
            <article class="group reveal-1 lg:col-span-2 lg:[grid-row:span_var(--rows)]" data-reveal>
                <a href="{{ $post->url }}" class="relative block overflow-hidden rounded-3xl bg-shade text-shade-ink">
                    <img src="{{ $post->image }}" alt="" width="1200" height="800" class="aspect-[4/3] w-full object-cover transition-transform duration-700 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02] sm:aspect-[3/2]" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-shade/90 via-shade/60 to-shade/10" aria-hidden="true"></div>
                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-10">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] text-shade-ink/80">
                            <span class="inline-flex items-center rounded-full border border-shade-line px-2.5 py-0.5 text-[12px] font-medium text-shade-ink">{{ $post->category }}</span>
                            <time>{{ $post->date }}</time>
                            <span aria-hidden="true">·</span>
                            <span>{{ $post->readTime }}</span>
                        </div>
                        <h3 class="mt-4 max-w-[24ch] text-2xl font-semibold tracking-tight text-balance text-shade-ink sm:text-3xl">{{ $post->title }}</h3>
                        <p class="mt-3 hidden max-w-[52ch] text-[15px]/6 text-pretty text-shade-ink/80 sm:block">{{ $post->excerpt }}</p>
                        <span class="arrow-link mt-5 inline-flex items-center gap-1.5 text-[14px] font-medium text-shade-ink">
                            {{ $readText }}
                            <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </span>
                    </div>
                </a>
            </article>
            @else
            <article class="group reveal-{{ min($loop->iteration, 6) }} border-t border-line lg:flex lg:items-center {{ $loop->iteration === 2 ? 'max-lg:mt-10' : '' }}" data-reveal>
                <a href="{{ $post->url }}" class="flex w-full items-center gap-5 py-5">
                    <div class="size-20 shrink-0 overflow-hidden rounded-xl outline-1 -outline-offset-1 outline-ink/10">
                        <img src="{{ $post->image }}" alt="" width="160" height="160" class="size-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.04]" loading="lazy">
                    </div>
                    <div class="min-w-0">
                        <p class="flex items-center gap-2 text-[13px] text-faint">
                            <span>{{ $post->category }}</span>
                            <span aria-hidden="true">·</span>
                            <time>{{ $post->date }}</time>
                        </p>
                        <h3 class="mt-1.5 text-[15px]/6 font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                    </div>
                </a>
            </article>
            @endif
            @endforeach
        </div>
    </div>
</section>
