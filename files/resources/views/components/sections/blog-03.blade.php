@props([
    'heading' => 'Writing',
    'intro' => 'Notes on hiring from the Winnow team, published when there is something worth saying. Usually twice a month.',
    'filters' => [
        (object) ['text' => 'All posts', 'url' => '/blog', 'current' => 'yes'],
        (object) ['text' => 'Hiring', 'url' => '/blog/hiring', 'current' => 'no'],
        (object) ['text' => 'Interviews', 'url' => '/blog/interviews', 'current' => 'no'],
        (object) ['text' => 'Product', 'url' => '/blog/product', 'current' => 'no'],
        (object) ['text' => 'Customers', 'url' => '/blog/customers', 'current' => 'no'],
    ],
    'posts' => [
        (object) ['title' => 'Stop scoring resumes out of ten', 'excerpt' => 'A ten-point scale hides the one question that matters. We replaced it with three yes-or-no checks and hiring managers agreed with each other 84% of the time.', 'url' => '/blog/stop-scoring-resumes', 'date' => 'Sep 15, 2026', 'readTime' => '6 min', 'category' => 'Interviews'],
        (object) ['title' => 'A scorecard that survives a second interviewer', 'excerpt' => 'The same four attributes, defined in a sentence each, so two people in two cities write down the same thing.', 'url' => '/blog/scorecard-second-interviewer', 'date' => 'Sep 8, 2026', 'readTime' => '5 min', 'category' => 'Hiring'],
        (object) ['title' => 'What 1,300 rejections taught us about the rejection email', 'excerpt' => 'Send it within 48 hours, name the stage they reached, and never say the pool was strong.', 'url' => '/blog/rejection-email', 'date' => 'Aug 29, 2026', 'readTime' => '7 min', 'category' => 'Hiring'],
        (object) ['title' => 'Scheduling loops across ET and PT without the reply-all', 'excerpt' => 'Candidates pick from open slots that already respect every interviewer’s calendar. The thread with nine people on it is gone.', 'url' => '/blog/scheduling-loops', 'date' => 'Aug 20, 2026', 'readTime' => '4 min', 'category' => 'Product'],
        (object) ['title' => 'Offer letters that go out the same afternoon', 'excerpt' => 'Salary bands, start dates and equity approved once, so the offer is a button and not a week.', 'url' => '/blog/same-afternoon-offers', 'date' => 'Aug 12, 2026', 'readTime' => '3 min', 'category' => 'Product'],
        (object) ['title' => 'How Ridgeway Dental hired four hygienists in 31 days', 'excerpt' => 'A three-office practice in Raleigh with no recruiter and a front desk that answers the phone.', 'url' => '/blog/ridgeway-dental', 'date' => 'Aug 3, 2026', 'readTime' => '6 min', 'category' => 'Customers'],
    ],
])
<!--
    Text-only blog index in a narrow column: heading and intro, a row of category filter pills (the one with
    Selected set to yes is filled), then hairline-divided rows — date in mono on the left, title, excerpt and
    category on the right, an arrow that slides in on hover. Post rows live in collections/posts.json.
-->
<section class="px-6 py-16 sm:py-28" data-blog-03>
    <div class="mx-auto w-full max-w-3xl">
        <div data-reveal>
            <h2 class="max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
        </div>

        <nav class="reveal-1 mt-10 flex flex-wrap gap-2" aria-label="Post categories" data-reveal>
            @foreach ($filters as $filter)
            <a href="{{ $filter->url }}" class="inline-flex min-h-9 items-center rounded-full border px-3.5 text-[13px] font-medium whitespace-nowrap transition-colors duration-200 {{ $filter->current === 'yes' ? 'border-ink bg-ink text-canvas' : 'border-line bg-panel text-muted hover:border-line-strong hover:text-ink' }}" {{ $filter->current === 'yes' ? 'aria-current=page' : '' }}>{{ $filter->text }}</a>
            @endforeach
        </nav>

        <div class="mt-8 border-t border-line">
            @foreach ($posts as $post)
            <article class="reveal-{{ min($loop->iteration + 1, 6) }} border-b border-line" data-reveal>
                <a href="{{ $post->url }}" class="group flex flex-col gap-2 py-6 sm:flex-row sm:gap-8">
                    <time class="shrink-0 font-mono text-[12px] text-faint sm:w-32 sm:pt-1">{{ $post->date }}</time>
                    <div class="min-w-0 flex-1">
                        <h3 class="text-[17px]/6 font-semibold tracking-tight text-balance text-ink transition-colors duration-200 group-hover:text-accent">{{ $post->title }}</h3>
                        <p class="mt-2 max-w-[58ch] text-[15px]/6 text-pretty text-muted">{{ $post->excerpt }}</p>
                        <p class="mt-3 flex items-center gap-2 text-[13px] text-faint">
                            <span>{{ $post->category }}</span>
                            <span aria-hidden="true">·</span>
                            <span>{{ $post->readTime }}</span>
                        </p>
                    </div>
                    <svg viewBox="0 0 24 24" class="mt-1 hidden size-4 shrink-0 -translate-x-1 text-ink opacity-0 transition-[opacity,translate] duration-200 ease-[var(--ease-out-quart)] group-hover:translate-x-0 group-hover:opacity-100 sm:block" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
