@props([
    'heading' => 'The Rafter blog',
    'intro' => 'Support, firmware and the small decisions that keep a hardware company’s inbox quiet.',
    'categoriesLabel' => 'Topics',
    'categories' => [
        (object) ['text' => 'All posts', 'url' => '/blog', 'current' => 'yes'],
        (object) ['text' => 'Product', 'url' => '/blog/product', 'current' => 'no'],
        (object) ['text' => 'Support', 'url' => '/blog/support', 'current' => 'no'],
        (object) ['text' => 'Engineering', 'url' => '/blog/engineering', 'current' => 'no'],
        (object) ['text' => 'Customers', 'url' => '/blog/customers', 'current' => 'no'],
    ],
    'newsletterHeading' => 'One email a month',
    'newsletterText' => 'The posts, the release notes and nothing else. 3,200 support leads read it.',
    'formAction' => '/subscribe',
    'emailLabel' => 'Work email',
    'buttonText' => 'Subscribe',
    'posts' => [
        (object) ['title' => 'The RMA that never needed a ticket', 'excerpt' => 'When a serial number arrives with the first message, Rafter pulls the warranty, the firmware version and the last three conversations before an agent opens it.', 'image' => '/images/blocks/cover-02.jpg', 'url' => '/blog/rma-without-a-ticket', 'date' => 'Sep 17, 2026', 'readTime' => '5 min', 'category' => 'Product', 'author' => 'Emery Rivera', 'avatar' => 'https://assets.ui.sh/avatars/6.webp?size=160'],
        (object) ['title' => 'Serial numbers as the first field, not the last', 'excerpt' => 'Asking for it up front cut the average back-and-forth from 4.1 replies to 1.8 across our customers.', 'image' => '/images/blocks/cover-04.jpg', 'url' => '/blog/serial-number-first', 'date' => 'Sep 10, 2026', 'readTime' => '4 min', 'category' => 'Support', 'author' => 'Kai Patel', 'avatar' => 'https://assets.ui.sh/avatars/10.webp?size=160'],
        (object) ['title' => 'How Bluefin Audio answers 92% of tickets in one reply', 'excerpt' => 'A 14-person team in Portland, 2,600 conversations a month, and a knowledge base that is actually read.', 'image' => '/images/blocks/workspace-02.jpg', 'url' => '/blog/bluefin-audio', 'date' => 'Sep 3, 2026', 'readTime' => '6 min', 'category' => 'Customers', 'author' => 'Rowan Ellis', 'avatar' => 'https://assets.ui.sh/avatars/13.webp?size=160'],
        (object) ['title' => 'Firmware questions belong next to the device, not in a thread', 'excerpt' => 'Why we moved release notes into the device record and what changed in the first month.', 'image' => '/images/blocks/cover-05.jpg', 'url' => '/blog/firmware-next-to-device', 'date' => 'Aug 26, 2026', 'readTime' => '7 min', 'category' => 'Engineering', 'author' => 'Sage Nakamura', 'avatar' => 'https://assets.ui.sh/avatars/1.webp?size=160'],
        (object) ['title' => 'A quieter inbox: the rules we shipped in August', 'excerpt' => 'Auto-merge for duplicate reports, a snooze that respects Pacific time, and a way to hush the shipping notifications.', 'image' => '/images/blocks/workspace-03.jpg', 'url' => '/blog/quieter-inbox-august', 'date' => 'Aug 19, 2026', 'readTime' => '3 min', 'category' => 'Product', 'author' => 'Emery Rivera', 'avatar' => 'https://assets.ui.sh/avatars/6.webp?size=160'],
    ],
])
<!--
    Blog with a sidebar: heading and intro on top; a sticky left rail with the category list (the one with
    Selected set to yes is marked) and a small newsletter form that posts to the action URL; on the right,
    hairline-divided horizontal cards — square thumbnail, meta, title, excerpt, author.
    Post rows live in collections/posts.json.
-->
<section class="px-6 py-16 sm:py-28" data-blog-05>
    <div class="mx-auto w-full max-w-6xl">
        <div data-reveal>
            <h2 class="max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
        </div>

        <div class="mt-14 flex flex-col gap-12 sm:mt-16 lg:flex-row lg:gap-16">
            <aside class="reveal-1 lg:w-56 lg:shrink-0 lg:self-start lg:sticky lg:top-24" data-reveal>
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $categoriesLabel }}</p>
                <nav class="mt-4 flex flex-wrap gap-2 lg:flex-col lg:gap-0" aria-label="Post categories">
                    @foreach ($categories as $category)
                    <a href="{{ $category->url }}" class="inline-flex min-h-9 items-center rounded-full border px-3.5 text-[13px] font-medium whitespace-nowrap transition-colors duration-200 lg:-ml-3 lg:min-h-0 lg:rounded-lg lg:border-0 lg:px-3 lg:py-2 lg:text-[15px] {{ $category->current === 'yes' ? 'border-ink bg-ink text-canvas lg:bg-raised lg:text-ink' : 'border-line bg-panel text-muted hover:border-line-strong hover:text-ink lg:bg-transparent lg:hover:bg-raised' }}" {{ $category->current === 'yes' ? 'aria-current=page' : '' }}>{{ $category->text }}</a>
                    @endforeach
                </nav>

                <div class="mt-10 border-t border-line pt-8">
                    <p class="text-base font-medium text-ink">{{ $newsletterHeading }}</p>
                    <p class="mt-1.5 text-[14px]/6 text-pretty text-muted">{{ $newsletterText }}</p>
                    <form action="{{ $formAction }}" method="post" class="mt-4 flex flex-col gap-2.5">
                        <label for="blog-05-email" class="block text-[14px] font-medium text-ink">{{ $emailLabel }}</label>
                        <input id="blog-05-email" type="email" name="email" required autocomplete="email" class="field h-11 w-full rounded-lg border border-line bg-canvas px-3.5 text-[15px] text-ink">
                        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-4 py-2.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                    </form>
                </div>
            </aside>

            <div class="min-w-0 flex-1 border-t border-line">
                @foreach ($posts as $post)
                <article class="reveal-{{ min($loop->iteration + 1, 6) }} border-b border-line" data-reveal>
                    <a href="{{ $post->url }}" class="group flex flex-col gap-5 py-7 sm:flex-row sm:gap-7">
                        <div class="relative aspect-[3/2] w-full shrink-0 overflow-hidden rounded-xl outline-1 -outline-offset-1 outline-ink/10 sm:aspect-square sm:w-40">
                            <img src="{{ $post->image }}" alt="" width="1200" height="800" class="absolute inset-0 size-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.03]" loading="lazy">
                        </div>
                        <div class="flex min-w-0 flex-1 flex-col">
                            <p class="flex flex-wrap items-center gap-x-2 gap-y-1 text-[13px] text-faint">
                                <span class="font-medium text-muted">{{ $post->category }}</span>
                                <span aria-hidden="true">·</span>
                                <time>{{ $post->date }}</time>
                                <span aria-hidden="true">·</span>
                                <span>{{ $post->readTime }}</span>
                            </p>
                            <h3 class="mt-2 max-w-[36ch] text-xl/7 font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                            <p class="mt-2 max-w-[62ch] text-[15px]/6 text-pretty text-muted">{{ $post->excerpt }}</p>
                            <div class="mt-auto flex items-center gap-2.5 pt-4">
                                <img src="{{ $post->avatar }}" alt="" width="28" height="28" class="size-7 rounded-full object-cover outline-1 -outline-offset-1 outline-ink/10" loading="lazy">
                                <span class="text-[13px] font-medium text-ink">{{ $post->author }}</span>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
