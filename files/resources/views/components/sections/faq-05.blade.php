@props([
    'eyebrow' => 'Support',
    'heading' => 'Running your studio on Alcove',
    'intro' => 'Plans, billing, moving your calendar over, and how deposits are handled.',
    'cardHeading' => 'Still have questions?',
    'cardText' => 'Talk to someone who has set up a studio before. Weekdays 9:00 AM to 6:00 PM ET, and a reply within the hour.',
    'cardButtonText' => 'Talk to support',
    'cardButtonUrl' => '/contact',
    'avatarOne' => 'https://assets.ui.sh/avatars/3.webp?size=160',
    'avatarTwo' => 'https://assets.ui.sh/avatars/8.webp?size=160',
    'avatarThree' => 'https://assets.ui.sh/avatars/12.webp?size=160',
    'faqs' => [
        (object) ['question' => 'What does Alcove cost?', 'answer' => 'Room is $29 a month for one bookable space, and Studio is $79 for up to eight spaces with staff logins. Both include online payments with no per-booking fee from us.'],
        (object) ['question' => 'How are card fees handled?', 'answer' => 'Card payments carry the processor’s 2.9% plus 30 cents, paid out to your bank every business day. You can add a booking fee of your own to cover it.'],
        (object) ['question' => 'Can we move bookings from our old calendar?', 'answer' => 'Yes. Connect the calendar you use today and Alcove imports the next 12 months of bookings with client names and notes. Every slot is checked on the way in, so nothing ends up double-booked.'],
        (object) ['question' => 'How do deposits and cancellations work?', 'answer' => 'Set a deposit of any percentage and a cancellation window per space. A client who cancels inside the window forfeits the deposit automatically, with the receipt sent to both of you.'],
        (object) ['question' => 'Is client card data stored on Alcove?', 'answer' => 'No. Card details go straight to the payment processor and Alcove keeps only a token, so a card number never touches our servers. Your own login is protected by two-factor authentication.'],
        (object) ['question' => 'What if we need help on a shoot day?', 'answer' => 'Support answers chat and phone 9:00 AM to 6:00 PM ET seven days a week, because shoots happen on weekends. Studio plans get a direct line that reaches a person in under two minutes.'],
    ],
])
<!-- FAQ with a contact card: a left opener and a hairline accordion of native <details> take two thirds; a sticky card on the right holds three overlapping avatars, a heading, a line and a secondary button. Rows come from collections.faqs (question, answer). Clear the eyebrow, intro or card text to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-12 lg:grid-cols-3 lg:gap-16">
            <div class="reveal-2 divide-y divide-line border-y border-line lg:col-span-2" data-reveal>
                @foreach ($faqs as $item)
                <details class="faq-item group">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[16px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                        {{ $item->question }}
                        <svg viewBox="0 0 16 16" class="faq-plus size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                    </summary>
                    <p class="max-w-[62ch] pb-6 text-[15px]/7 text-pretty text-muted">{{ $item->answer }}</p>
                </details>
                @endforeach
            </div>

            <div class="reveal-3 self-start rounded-2xl border border-line bg-panel p-6 sm:p-8 lg:sticky lg:top-24" data-reveal>
                <div class="flex -space-x-3">
                    <img src="{{ $avatarOne }}" alt="" width="40" height="40" class="size-10 rounded-full border-2 border-panel object-cover" loading="lazy">
                    <img src="{{ $avatarTwo }}" alt="" width="40" height="40" class="size-10 rounded-full border-2 border-panel object-cover" loading="lazy">
                    <img src="{{ $avatarThree }}" alt="" width="40" height="40" class="size-10 rounded-full border-2 border-panel object-cover" loading="lazy">
                </div>
                <h3 class="mt-6 text-xl font-semibold tracking-tight text-ink">{{ $cardHeading }}</h3>
                @if ($cardText)
                <p class="mt-2 text-[15px]/6 text-pretty text-muted">{{ $cardText }}</p>
                @endif
                <a href="{{ $cardButtonUrl }}" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-7 py-3.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98]">{{ $cardButtonText }}</a>
            </div>
        </div>
    </div>
</section>
