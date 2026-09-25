@props([
    'eyebrow' => 'After-hours support',
    'heading' => 'Wake up to an empty queue',
    'text' => 'Vesper answers overnight tickets from your help center and hands the rest to a person at 8:30 AM ET. Most teams are live in one afternoon.',
    'ctaText' => 'Start free',
    'ctaLink' => '/pricing',
    'linkText' => 'See a real handoff',
    'linkUrl' => '/how-it-works',
    'listLabel' => 'On every plan',
    'items' => [
        (object) ['text' => 'Drafted from your help center, not a script'],
        (object) ['text' => 'Escalates to a person after two unclear turns'],
        (object) ['text' => 'Covers 6:00 PM to 8:30 AM in ET, CT and PT'],
        (object) ['text' => 'Cancel from the billing page, no email needed'],
    ],
])
<!-- The closing dark band, split: a statement, one button and a text link on the left; a lightened well with a four-line checklist on the right, over a faint dot grid and one glow. The lines are the Included repeater. Clear the eyebrow, the link text or the list label to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="relative overflow-hidden rounded-[2.5rem] bg-shade px-6 py-16 text-shade-ink sm:px-16 sm:py-24">
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <div class="absolute -top-40 left-1/2 h-[380px] w-[640px] -translate-x-1/2 rounded-full bg-accent opacity-25 blur-3xl"></div>
                <div class="absolute inset-0 [background-image:radial-gradient(circle,var(--color-shade-line)_1px,transparent_1px)] [background-size:24px_24px]"></div>
            </div>

            <div class="relative grid gap-12 lg:grid-cols-[1.15fr_1fr] lg:items-center lg:gap-20">
                <div data-reveal>
                    @if ($eyebrow)
                    <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-shade-muted uppercase">{{ $eyebrow }}</p>
                    @endif
                    <h2 class="max-w-[18ch] font-display text-h2 font-semibold tracking-tight text-balance text-shade-ink sm:text-5xl/[1.05]">{{ $heading }}</h2>
                    <p class="mt-5 max-w-[46ch] text-lg/8 text-pretty text-shade-muted">{{ $text }}</p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-6">
                        <a href="{{ $ctaLink }}" class="inline-flex w-full items-center justify-center rounded-xl bg-shade-ink px-6 py-3 text-[15px] font-semibold text-shade shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 active:scale-[.98] sm:w-auto">{{ $ctaText }}</a>
                        @if ($linkText)
                        <a href="{{ $linkUrl }}" class="arrow-link inline-flex min-h-11 items-center justify-center gap-1.5 text-[15px] font-medium text-shade-ink transition-opacity duration-200 hover:opacity-80 sm:min-h-0 sm:justify-start">{{ $linkText }}<svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
                        @endif
                    </div>
                </div>

                <div class="reveal-2 rounded-2xl bg-shade-ink/5 px-6 py-5 sm:px-8 sm:py-6" data-reveal>
                    @if ($listLabel)
                    <p class="font-mono text-[12px] tracking-wide text-shade-muted uppercase">{{ $listLabel }}</p>
                    @endif
                    <ul class="mt-1 divide-y divide-shade-line">
                        @foreach ($items as $item)
                        <li class="reveal-{{ min($loop->iteration + 1, 6) }} flex items-start gap-3 py-4 text-[15px]/6 text-shade-muted last:pb-1" data-reveal>
                            <svg viewBox="0 0 20 20" class="mt-0.5 size-5 shrink-0 fill-current text-shade-ink" aria-hidden="true"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd"/></svg>
                            <span>{{ $item->text }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
