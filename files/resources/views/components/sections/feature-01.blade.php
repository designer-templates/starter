@props([
    'eyebrow' => 'Invoicing',
    'heading' => 'Every invoice, chased and closed',
    'intro' => 'Tiller drafts the invoice from tracked hours, sends the reminders on the client’s business days, and posts the payment the day it lands.',
    'linkText' => 'See how billing works',
    'linkUrl' => '#',
    'mainTitle' => 'One ledger for every open invoice',
    'mainText' => 'Sent, viewed, partly paid, or 11 days late — each invoice carries its own history, so nobody has to ask.',
    'mainImage' => '/images/blocks/dashboard-invoices.jpg',
    'mainImageAlt' => 'The Tiller invoices page: outstanding, overdue and paid totals over the September invoice list',
    'toastTitle' => 'Payment received',
    'toastText' => '$4,860.00 from Pinebrook Dental',
    'cells' => [
        (object) ['image' => '/images/blocks/dashboard-settings.jpg', 'title' => 'Reminders that read the room', 'text' => 'Three tones, sent on the client’s business days, never on a holiday.'],
        (object) ['image' => '/images/blocks/dashboard-report.jpg', 'title' => 'Collected, week by week', 'text' => 'See what landed and what is still out, without opening the bank.'],
        (object) ['image' => '/images/blocks/dashboard-notifications.jpg', 'title' => 'Approvals before send', 'text' => 'A second pair of eyes on anything over $5,000, right in the thread.'],
        (object) ['image' => '/images/blocks/dashboard-board.jpg', 'title' => 'Fast enough to live in', 'text' => 'Every action has a key, so Friday billing is a few minutes, not an afternoon.'],
    ],
])
<!--
    Feature bento: a left opener (eyebrow, heading, intro, arrow link) over a grid — one 2×2 cell with a product
    screenshot that bleeds off the cell's corner and a payment toast over it, and four 1×1 cells each with a zoomed
    detail of a screenshot (its top-left, past the app chrome), a title and a line. Cells are a repeater in the yml; every screenshot is an image field (clear a
    cell's image to show its copy alone). Clear the eyebrow, the link text or the toast title to hide them.
-->
<section class="px-6 py-16 sm:py-28" data-feature-01>
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h2 class="reveal-1 mt-4 text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-2 mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
            @if ($linkText)
            <a href="{{ $linkUrl }}" class="reveal-3 arrow-link mt-6 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-lede" data-reveal>
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            @endif
        </div>

        <div class="mt-14 grid gap-4 sm:mt-16 sm:grid-cols-2 lg:grid-cols-4 lg:grid-rows-2">
            <div class="reveal-1 relative flex flex-col overflow-hidden rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:col-span-2 sm:p-8 lg:row-span-2" data-reveal>
                <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $mainTitle }}</h3>
                <p class="mt-2 max-w-[46ch] text-[15px]/6 text-pretty text-muted">{{ $mainText }}</p>

                <div class="relative mt-8 flex-1">
                    <!-- The screenshot is pinned to the cell's bottom-right corner and cropped by it, so it reads as a window in the room. -->
                    <div class="-mr-6 -mb-6 h-full min-h-[22rem] overflow-hidden rounded-tl-[20px] border-t border-l border-line bg-panel shadow-2xl shadow-ink/5 sm:-mr-8 sm:-mb-8">
                        <img src="{{ $mainImage }}" alt="{{ $mainImageAlt }}" width="1600" height="1067" class="block h-full w-full object-cover object-left-top" loading="lazy">
                    </div>

                    @if ($toastTitle)
                    <div class="absolute bottom-0 left-0 flex items-center gap-3 rounded-xl border border-line bg-panel py-2.5 pr-4 pl-3 shadow-[var(--shadow-card)] sm:-left-2 sm:bottom-2">
                        <span class="flex size-7 items-center justify-center rounded-full bg-ink text-canvas">
                            <svg viewBox="0 0 16 16" class="size-3.5 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd"/></svg>
                        </span>
                        <div>
                            <p class="text-[13px] font-medium text-ink">{{ $toastTitle }}</p>
                            <p class="text-[12px] text-muted">{{ $toastText }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            @foreach ($cells as $cell)
            <div class="reveal-{{ min($loop->iteration + 1, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)]" data-reveal>
                @if ($cell->image)
                <!-- A zoomed detail of the screenshot (its top-left, past the app chrome), so four cells read as four
                     different things rather than four tiny copies of the same dashboard. -->
                <div class="relative h-40 overflow-hidden rounded-xl border border-line bg-raised/70">
                    <img src="{{ $cell->image }}" alt="" width="1600" height="1200" class="absolute top-[-6%] left-[-26%] block w-[165%] max-w-none" loading="lazy">
                </div>
                @endif
                <h3 class="mt-5 text-base font-medium text-ink">{{ $cell->title }}</h3>
                <p class="mt-1.5 text-[14px]/6 text-pretty text-muted">{{ $cell->text }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
