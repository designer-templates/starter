@props([
    'text' => 'Mast puts a status page on your own domain in 11 minutes.',
    'note' => 'Free for one page and 250 subscribers.',
    'linkText' => 'Start a status page',
    'linkUrl' => '/signup',
])
<!-- A quiet closing line between two hairlines: the statement and a small note on the left, one arrow link on the right. Clear the note to hide it. -->
<section class="px-6 py-16 sm:py-20">
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-col gap-5 border-y border-line py-10 sm:flex-row sm:items-center sm:justify-between sm:gap-10" data-reveal>
            <div>
                <h2 class="max-w-[60ch] font-display text-xl/8 font-medium tracking-tight text-balance text-ink">{{ $text }}</h2>
                @if ($note)
                <p class="mt-1.5 text-[14px]/6 text-muted">{{ $note }}</p>
                @endif
            </div>
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex min-h-11 shrink-0 items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-lede sm:min-h-0">{{ $linkText }}<svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
        </div>
    </div>
</section>
