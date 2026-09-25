@props([
    'eyebrow' => 'The Dovetail letter',
    'heading' => 'Read one before you subscribe',
    'text' => 'Every other Thursday: what we learned from 212,000 dental appointments, and what changed in Dovetail because of it.',
    'action' => '#',
    'inputLabel' => 'Email address',
    'inputPlaceholder' => 'you@yourpractice.com',
    'buttonText' => 'Subscribe',
    'finePrint' => 'Sent to 2,960 practices. Unsubscribe in one click.',
    'image' => '/images/blocks/email-preview.jpg',
    'imageAlt' => 'Issue 38 of the Dovetail letter, as it lands in the inbox',
    'toast' => 'Delivered to 2,960 inboxes',
])
<!-- Newsletter with a preview: eyebrow, heading, a line and the email form on the left; on the right a screenshot of one issue, framed as a card sitting slightly rotated on a tinted stage, with a small badge overlapping its corner. The card straightens on hover. The form posts to the action URL. Swap the image for a capture of your own issue (5:4 works best). Clear the eyebrow, text, fine print or badge to hide it. -->
<section class="px-6 py-16 sm:py-28" data-newsletter-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
            <div>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 max-w-[26ch] text-h2 font-semibold tracking-tight text-balance text-ink reveal-1" data-reveal>{{ $heading }}</h2>
                @if ($text)
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted reveal-2" data-reveal>{{ $text }}</p>
                @endif

                <form action="{{ $action }}" method="post" class="mt-8 flex w-full max-w-md flex-col gap-3 sm:flex-row reveal-3" data-reveal>
                    <label class="min-w-0 flex-1">
                        <span class="sr-only">{{ $inputLabel }}</span>
                        <input type="email" name="email" autocomplete="email" required placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full rounded-xl border border-line bg-panel px-4 text-base text-ink placeholder:text-faint sm:text-[15px]">
                    </label>
                    <button type="submit" class="inline-flex h-12 shrink-0 cursor-pointer items-center justify-center rounded-xl bg-ink px-6 text-[15px] font-medium whitespace-nowrap text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                </form>
                @if ($finePrint)
                <p class="mt-4 text-[13px] text-muted reveal-4" data-reveal>{{ $finePrint }}</p>
                @endif
            </div>

            <div class="rounded-3xl bg-raised p-5 sm:p-8 reveal-2" data-reveal>
                <div class="relative">
                    <div class="overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5 transition-transform duration-300 ease-[var(--ease-out-quart)] lg:rotate-1 lg:hover:rotate-0" data-card>
                        <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1280" class="block h-auto w-full" loading="lazy">
                    </div>
                    @if ($toast)
                    <p class="absolute -bottom-4 -left-2 inline-flex items-center gap-2 rounded-xl border border-line bg-panel px-3 py-2 text-[12px] font-medium text-ink shadow-[var(--shadow-card)] sm:-left-5"><span class="size-2 rounded-full bg-ink" aria-hidden="true"></span>{{ $toast }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<style>
@media (prefers-reduced-motion: reduce) { [data-newsletter-04] [data-card] { transition: none; } }
</style>
