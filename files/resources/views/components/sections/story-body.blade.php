@props([
    'content' => '<p>The story itself, as HTML from the stories collection.</p>',
    'quote' => 'Our clients used to email us a sentence and wait two days. Now they change it themselves before lunch, and we see it in the next pull request.',
    'person' => 'Tessa Bellwood',
    'initials' => 'TB',
    'role' => 'Founder and creative director',
    'company' => 'Bellwood & Vane',
    'moreHeading' => 'More customer stories',
    'linkText' => 'Read the story',
    'more' => [],
])
<!--
    The body of a customer story: the stored HTML from the story's row (styled by .prose in site.css) on the
    left, and the customer's own words in a quiet well beside it that stays in view on desktop. Under both,
    the other stories as two linked rows. On /customers/{slug} every value comes from stories.json; clear
    the more-stories heading to hide that row.
-->
<section class="pt-14 pb-20 sm:pt-20 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-12">
            <div class="prose max-w-[65ch] lg:col-span-7" data-reveal>{!! $content !!}</div>
            <aside class="lg:col-span-4 lg:col-start-9" data-reveal>
                <figure class="rounded-3xl bg-muted/70 p-8 lg:sticky lg:top-24">
                    <svg viewBox="0 0 24 24" class="size-7 fill-current text-foreground/20" aria-hidden="true"><path d="M9.6 6C6.5 7.3 4.5 10 4.5 13.4c0 2.6 1.6 4.6 3.9 4.6 1.9 0 3.4-1.4 3.4-3.3 0-1.8-1.3-3.1-3-3.2.4-1.6 1.8-3 3.6-3.8L9.6 6Zm9 0c-3.1 1.3-5.1 4-5.1 7.4 0 2.6 1.6 4.6 3.9 4.6 1.9 0 3.4-1.4 3.4-3.3 0-1.8-1.3-3.1-3-3.2.4-1.6 1.8-3 3.6-3.8L18.6 6Z"/></svg>
                    <blockquote class="mt-5 text-xl/8 font-medium tracking-tight text-pretty text-foreground">
                        <p>{{ $quote }}</p>
                    </blockquote>
                    <figcaption class="mt-8 flex items-center gap-3">
                        <span class="flex size-11 shrink-0 items-center justify-center rounded-full bg-card text-[14px] font-semibold text-foreground outline-1 -outline-offset-1 outline-foreground/10">{{ $initials }}</span>
                        <span class="text-[14px]">
                            <span class="block font-medium text-foreground">{{ $person }}</span>
                            <span class="block text-muted-foreground">{{ $role }}, {{ $company }}</span>
                        </span>
                    </figcaption>
                </figure>
            </aside>
        </div>

        @if ($moreHeading)
        <div class="mt-20 border-t border-border pt-12 sm:mt-24 sm:pt-14">
            <h2 class="text-2xl/8 font-semibold tracking-tight text-foreground" data-reveal>{{ $moreHeading }}</h2>
            <ul role="list" class="mt-8 divide-y divide-border border-y border-border">
                @foreach ($more as $story)
                <li data-reveal>
                    <a href="{{ $story->url }}" class="group flex items-center gap-5 py-5 sm:gap-8">
                        <span class="block w-24 shrink-0 overflow-hidden rounded-xl sm:w-36">
                            <img src="{{ $story->image }}" alt="" width="1600" height="1067" loading="lazy" decoding="async" class="aspect-[3/2] w-full object-cover">
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-[14px] text-muted-foreground"><span class="font-medium text-foreground">{{ $story->company }}</span> · {{ $story->location }}</span>
                            <span class="mt-1 block text-[17px]/6 font-semibold tracking-tight text-balance text-foreground transition-colors duration-200 group-hover:text-accent">{{ $story->title }}</span>
                        </span>
                        <span class="arrow-link hidden shrink-0 items-center gap-1.5 text-[15px] font-medium text-foreground sm:inline-flex">
                            {{ $linkText }}
                            <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</section>
