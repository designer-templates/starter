@props([
    'heading' => 'One email, every other Tuesday',
    'text' => 'What changed in Plinth, one bookkeeping habit from a restaurant that closes its month in 3 days, and nothing else.',
    'action' => '#',
    'inputLabel' => 'Email address',
    'inputPlaceholder' => 'you@restaurant.com',
    'buttonText' => 'Subscribe',
    'finePrint' => 'Read by 4,218 restaurant owners. Unsubscribe in one click.',
])
<!-- Newsletter, centered: a heading, one line, and an email field with the button set inside it, then fine print. The form posts to the action URL. Clear the text or the fine print to hide it. -->
<section class="px-6 py-16 sm:py-20" data-newsletter-01>
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="mx-auto max-w-[28ch] text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            @if ($text)
            <p class="mx-auto mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted reveal-1" data-reveal>{{ $text }}</p>
            @endif

            <form action="{{ $action }}" method="post" class="mx-auto mt-8 w-full max-w-md reveal-2" data-reveal>
                <div class="field flex items-center rounded-2xl border border-line bg-panel p-1">
                    <label class="min-w-0 flex-1">
                        <span class="sr-only">{{ $inputLabel }}</span>
                        <input type="email" name="email" autocomplete="email" required placeholder="{{ $inputPlaceholder }}" class="h-11 w-full min-w-0 border-0 bg-transparent px-4 text-base text-ink placeholder:text-faint sm:text-[15px]">
                    </label>
                    <button type="submit" class="inline-flex h-11 shrink-0 cursor-pointer items-center justify-center rounded-xl bg-ink px-5 text-[15px] font-medium whitespace-nowrap text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</button>
                </div>
            </form>

            @if ($finePrint)
            <p class="mx-auto mt-4 max-w-[48ch] text-[13px] text-balance text-muted reveal-3" data-reveal>{{ $finePrint }}</p>
            @endif
        </div>
    </div>
</section>
<style>
[data-newsletter-01] .field:has(input:focus-visible) { border-color: var(--color-line-strong); box-shadow: 0 0 0 3px var(--color-accent-soft); }
[data-newsletter-01] .field input:focus-visible { outline: none; }
</style>
