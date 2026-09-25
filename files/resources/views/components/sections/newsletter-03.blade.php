@props([
    'heading' => 'Crew notes, twice a month',
    'text' => 'Scheduling tricks from the 640 landscaping crews on Bramwell, in five minutes of reading. Sent on the 1st and the 15th.',
    'action' => '#',
    'inputLabel' => 'Email address',
    'inputPlaceholder' => 'you@yourcrew.com',
    'buttonText' => 'Join',
    'finePrint' => 'No sales email. Unsubscribe any time.',
])
<!-- Newsletter, muted band: a rounded tinted well with the heading and one line on the left and the email form on the right, one row on desktop. The form posts to the action URL. Clear the text or the fine print to hide it. -->
<section class="px-6 py-16 sm:py-20" data-newsletter-03>
    <div class="mx-auto w-full max-w-6xl">
        <div class="rounded-3xl bg-raised/70 px-6 py-10 sm:px-12 sm:py-12 lg:flex lg:items-center lg:justify-between lg:gap-16">
            <div class="max-w-xl" data-reveal>
                <h2 class="max-w-[26ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($text)
                <p class="mt-3 max-w-[50ch] text-[15px]/6 text-pretty text-muted sm:text-base/7">{{ $text }}</p>
                @endif
            </div>

            <div class="mt-8 w-full lg:mt-0 lg:w-auto lg:shrink-0 reveal-2" data-reveal>
                <form action="{{ $action }}" method="post" class="flex flex-col gap-3 sm:flex-row">
                    <label class="min-w-0 flex-1 sm:w-72 sm:flex-none">
                        <span class="sr-only">{{ $inputLabel }}</span>
                        <input type="email" name="email" autocomplete="email" required placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full rounded-xl border border-line bg-panel px-4 text-base text-ink placeholder:text-faint sm:text-[15px]">
                    </label>
                    <button type="submit" class="inline-flex h-12 shrink-0 cursor-pointer items-center justify-center rounded-xl bg-ink px-6 text-[15px] font-medium whitespace-nowrap text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                </form>
                @if ($finePrint)
                <p class="mt-3 text-[13px] text-muted">{{ $finePrint }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
