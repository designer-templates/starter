@props([
    'eyebrow' => 'Issue 41 · Sep 12, 2026',
    'heading' => 'Notes from the loading dock',
    'text' => 'Receiving and put-away, with the numbers behind them, from the 380 warehouses on Osprey. Twice a month, six minutes.',
    'action' => '#',
    'inputLabel' => 'Email address',
    'inputPlaceholder' => 'you@yourwarehouse.com',
    'buttonText' => 'Subscribe',
    'linkText' => 'Read the last issue',
    'linkUrl' => '#',
    'finePrint' => 'One email every two weeks. Unsubscribe any time.',
])
<!-- Newsletter, dark band: the one dark surface, a faint dot grid, a mono issue line, the heading and a line on the left; the email form on the right with a "read the last issue" link and fine print under it. The form posts to the action URL. Clear the issue line, text, link text or fine print to hide it. -->
<section class="px-6 py-16 sm:py-20" data-newsletter-05>
    <div class="mx-auto w-full max-w-6xl">
        <div class="relative overflow-hidden rounded-[2.5rem] bg-shade px-6 py-16 text-shade-ink sm:px-16 sm:py-20" data-reveal>
            <div class="pointer-events-none absolute inset-0 [background-image:radial-gradient(circle,var(--color-shade-line)_1px,transparent_1px)] [background-size:24px_24px]" aria-hidden="true"></div>

            <div class="relative grid gap-10 lg:grid-cols-[1.2fr_1fr] lg:items-center lg:gap-16">
                <div>
                    @if ($eyebrow)
                    <p class="font-mono text-[12px] tracking-wide text-shade-muted">{{ $eyebrow }}</p>
                    @endif
                    <h2 class="mt-4 max-w-[26ch] text-h2 font-semibold tracking-tight text-balance text-shade-ink">{{ $heading }}</h2>
                    @if ($text)
                    <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-shade-muted">{{ $text }}</p>
                    @endif
                </div>

                <div>
                    <form action="{{ $action }}" method="post" class="flex flex-col gap-3 sm:flex-row">
                        <label class="min-w-0 flex-1">
                            <span class="sr-only">{{ $inputLabel }}</span>
                            <input type="email" name="email" autocomplete="email" required placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full rounded-xl border border-shade-line bg-shade px-4 text-base text-shade-ink placeholder:text-shade-muted sm:text-[15px]">
                        </label>
                        <button type="submit" class="inline-flex h-12 shrink-0 cursor-pointer items-center justify-center rounded-xl bg-shade-ink px-6 text-[15px] font-semibold whitespace-nowrap text-shade shadow-lg shadow-shade-ink/10 transition-opacity duration-200 hover:opacity-90 active:scale-[.98]">{{ $buttonText }}</button>
                    </form>
                    <div class="mt-4 flex flex-wrap items-center gap-x-5 gap-y-2 text-[13px]">
                        @if ($linkText)
                        <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 font-medium text-shade-ink transition-colors duration-200 hover:text-shade-muted">{{ $linkText }}<svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
                        @endif
                        @if ($finePrint)
                        <p class="text-pretty text-shade-muted">{{ $finePrint }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
[data-newsletter-05] .field:focus { border-color: var(--color-shade-muted); box-shadow: 0 0 0 3px var(--color-shade-line); }
</style>
