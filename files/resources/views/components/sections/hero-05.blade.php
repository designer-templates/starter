@props([
    'heading' => 'Booked and paid from one page',
    'text' => 'Cove gives your studio a booking page, sends the deposit invoice the moment a date is held, and chases the balance so you never have to.',
    'formAction' => '/signup',
    'inputLabel' => 'Your email',
    'buttonText' => 'Create your page',
    'finePrint' => 'Free for your first 25 bookings. No card needed.',
    'points' => [
        (object) ['text' => 'Deposit invoices sent the moment a date is held'],
        (object) ['text' => 'Reminders 3 days before the balance is due'],
        (object) ['text' => 'Payouts every Friday, straight to your bank'],
    ],
    'image' => '/images/blocks/dashboard-bookings.jpg',
    'imageAlt' => 'The Cove bookings calendar for September, with the month’s takings beside it',
])
<!--
    Signup hero: headline, intro, an inline email form (posts to formAction) with a line of fine print, and a
    three-line checklist on the left (rows in points); on the right a product screenshot framed as a window on a
    raised stage that runs off the right edge on desktop, so the visible part stays large. Swap the image
    for your own screenshot (4:3 works best; the right third is cropped on desktop). Clear the fine print to hide it.
-->
<section class="overflow-x-clip px-6 pt-20 pb-12 sm:pt-28 sm:pb-16" data-hero-05>
    <div class="mx-auto grid w-full max-w-6xl items-center gap-y-16 lg:grid-cols-[6fr_5fr] lg:gap-x-12">
        <div>
            <h1 class="max-w-[17ch] text-hero font-semibold tracking-[-0.04em] text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-1 mt-6 max-w-[46ch] text-lg/8 font-medium text-pretty text-muted sm:text-xl/8" data-reveal>{{ $text }}</p>

            <form action="{{ $formAction }}" method="post" class="reveal-2 mt-9 max-w-md" data-reveal>
                <label for="hero-05-email" class="block text-[14px] font-medium text-ink">{{ $inputLabel }}</label>
                <div class="mt-2 flex flex-col gap-3 sm:flex-row">
                <input id="hero-05-email" type="email" name="email" required autocomplete="email" class="field h-12 w-full min-w-0 flex-1 rounded-xl border border-line bg-canvas px-4 text-[15px] text-ink">
                <button type="submit" class="inline-flex shrink-0 cursor-pointer items-center justify-center gap-2 rounded-xl bg-ink px-6 py-3 text-[15px] font-medium whitespace-nowrap text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                </div>
            </form>
            @if ($finePrint)
            <p class="reveal-3 mt-3 text-[13px] text-faint" data-reveal>{{ $finePrint }}</p>
            @endif

            <ul role="list" class="reveal-4 mt-10 flex flex-col gap-3 text-[15px]/6 text-lede" data-reveal>
                @foreach ($points as $point)
                <li class="flex items-start gap-3">
                    <svg viewBox="0 0 24 24" class="mt-0.5 size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    <span>{{ $point->text }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- The product image: a window on a raised stage that runs off the right edge on desktop, so the
             visible slice is large and legible rather than a whole dashboard shrunk into half a column. -->
        <div class="reveal-2 lg:w-[150%]" data-reveal>
            <div class="rounded-3xl bg-raised p-1.5 sm:p-2 lg:rounded-r-none lg:pr-0">
                <div class="overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5 lg:rounded-r-none lg:border-r-0">
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1200" class="block h-auto w-full">
                </div>
            </div>
        </div>
    </div>
</section>
