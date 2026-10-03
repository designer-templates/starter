@props([
    'linkText' => 'Read the story',
    'stories' => [],
])
<!--
    Customer stories: the first story as a wide feature (photograph left; company, headline, excerpt and its
    three figures right), every other story as a card beneath with its photograph, company and headline.
    Stories live in resources/data/collections/stories.json; each links to its page at /customers/{slug}.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="grid gap-x-8 gap-y-14 pt-14 sm:pt-16 md:grid-cols-2">
            @foreach ($stories as $story)
            @if ($loop->first)
            <article class="group border-b border-border pb-14 sm:pb-16 md:col-span-2" data-reveal>
                <a href="{{ $story->url }}" class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
                    <div class="overflow-hidden rounded-3xl outline-1 -outline-offset-1 outline-foreground/10 lg:col-span-7">
                        <img src="{{ $story->image }}" alt="{{ $story->imageAlt }}" width="1600" height="1067" fetchpriority="high" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]">
                    </div>
                    <div class="lg:col-span-5">
                        <p class="text-[14px] text-muted-foreground"><span class="font-medium text-foreground">{{ $story->company }}</span> · {{ $story->location }}</p>
                        <h2 class="mt-4 text-[1.75rem]/[1.2] font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent sm:text-[2rem]/[1.15]">{{ $story->title }}</h2>
                        <p class="mt-4 max-w-[48ch] text-[16px]/7 text-pretty text-muted-foreground">{{ $story->excerpt }}</p>
                        <div class="mt-8 grid grid-cols-3 divide-x divide-border border-y border-border">
                            <div class="py-4 pr-4">
                                <p class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">{{ $story->figureOneValue }}</p>
                                <p class="mt-1 text-[13px]/5 text-muted-foreground">{{ $story->figureOneLabel }}</p>
                            </div>
                            <div class="px-4 py-4">
                                <p class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">{{ $story->figureTwoValue }}</p>
                                <p class="mt-1 text-[13px]/5 text-muted-foreground">{{ $story->figureTwoLabel }}</p>
                            </div>
                            <div class="py-4 pl-4">
                                <p class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">{{ $story->figureThreeValue }}</p>
                                <p class="mt-1 text-[13px]/5 text-muted-foreground">{{ $story->figureThreeLabel }}</p>
                            </div>
                        </div>
                        <span class="arrow-link mt-8 inline-flex items-center gap-1.5 text-[15px] font-medium text-foreground">
                            {{ $linkText }}
                            <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </span>
                    </div>
                </a>
            </article>
            @else
            <article class="group" data-reveal>
                <a href="{{ $story->url }}" class="block">
                    <div class="overflow-hidden rounded-3xl outline-1 -outline-offset-1 outline-foreground/10">
                        <img src="{{ $story->image }}" alt="{{ $story->imageAlt }}" width="1600" height="1067" loading="lazy" decoding="async" class="aspect-[3/2] w-full object-cover transition-transform duration-500 ease-[var(--ease-out-quart)] motion-safe:group-hover:scale-[1.02]">
                    </div>
                    <p class="mt-6 text-[14px] text-muted-foreground"><span class="font-medium text-foreground">{{ $story->company }}</span> · {{ $story->location }}</p>
                    <h2 class="mt-3 max-w-[30ch] text-xl/8 font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent">{{ $story->title }}</h2>
                    <p class="mt-3 text-[15px]/6 text-pretty text-muted-foreground">{{ $story->figureOneValue }} {{ $story->figureOneLabel }} · {{ $story->figureTwoValue }} {{ $story->figureTwoLabel }}</p>
                    <span class="arrow-link mt-5 inline-flex items-center gap-1.5 text-[15px] font-medium text-foreground">
                        {{ $linkText }}
                        <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </span>
                </a>
            </article>
            @endif
            @endforeach
        </div>
    </div>
</section>
