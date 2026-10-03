@props([
    'note' => 'A release every other Tuesday, written by the people who built it.',
    'feedText' => 'Request a feature',
    'feedUrl' => '/contact',
    'releases' => [],
])
<!--
    The changelog: one entry per release on a two-column rail — the date, the version and its label on the
    left (sticky beside a long entry on desktop), the title and the notes on the right. Each version is a link
    to its own entry (#v2-14), so a release can be shared on its own. The notes are stored HTML, styled by
    .prose in site.css. Entries live in resources/data/collections/releases.json, newest first.
-->
<section class="pt-12 pb-20 sm:pt-14 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-border pb-6" data-reveal>
            <p class="max-w-[56ch] text-[15px]/6 text-pretty text-muted-foreground">{{ $note }}</p>
            @if ($feedText)
            <a href="{{ $feedUrl }}" class="inline-flex items-center gap-2 rounded-control border border-border bg-card px-4 py-2 text-[14px] font-medium text-foreground/78 transition-colors duration-200 hover:border-border-strong hover:bg-muted active:scale-[.98]">
                <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                {{ $feedText }}
            </a>
            @endif
        </div>

        <div class="divide-y divide-border">
            @foreach ($releases as $entry)
            @php $anchor = 'v' . str_replace('.', '-', $entry->version); @endphp
            <article id="{{ $anchor }}" class="grid scroll-mt-24 gap-5 py-12 sm:py-14 lg:grid-cols-12 lg:gap-10" data-reveal>
                <div class="lg:col-span-3">
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2 lg:sticky lg:top-24 lg:flex-col lg:items-start">
                        <time class="text-[14px] text-muted-foreground">{{ $entry->date }}</time>
                        <a href="#{{ $anchor }}" class="group inline-flex items-center gap-2 font-mono text-[13px] font-medium text-foreground tabular-nums lg:mt-1">
                            v{{ $entry->version }}
                            <svg viewBox="0 0 20 20" class="size-3.5 fill-current text-muted-foreground opacity-0 transition-opacity duration-200 group-hover:opacity-100 group-focus-visible:opacity-100" aria-hidden="true"><path d="M12.232 4.232a2.5 2.5 0 0 1 3.536 3.536l-1.225 1.224a.75.75 0 0 0 1.061 1.06l1.224-1.224a4 4 0 0 0-5.656-5.656l-3 3a4 4 0 0 0 .225 5.865.75.75 0 0 0 .977-1.138 2.5 2.5 0 0 1-.142-3.667l3-3Z"/><path d="M11.603 7.963a.75.75 0 0 0-.977 1.138 2.5 2.5 0 0 1 .142 3.667l-3 3a2.5 2.5 0 0 1-3.536-3.536l1.225-1.224a.75.75 0 0 0-1.061-1.06l-1.224 1.224a4 4 0 1 0 5.656 5.656l3-3a4 4 0 0 0-.225-5.865Z"/></svg>
                        </a>
                        <span class="inline-flex items-center rounded-full border border-border bg-card px-2.5 py-0.5 text-[12px] font-medium text-muted-foreground lg:mt-2">{{ $entry->kind }}</span>
                    </div>
                </div>
                <div class="lg:col-span-8 lg:col-start-5">
                    <h2 class="max-w-[30ch] text-2xl/8 font-semibold tracking-tight text-balance text-foreground">{{ $entry->title }}</h2>
                    <div class="prose mt-5 max-w-[62ch]">{!! $entry->content !!}</div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
