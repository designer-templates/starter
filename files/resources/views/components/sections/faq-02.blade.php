@props([
    'eyebrow' => 'Before your first check',
    'heading' => 'Questions about running Cairn',
    'intro' => 'Plans, billing, moving off your current monitor, and what happens at 3:00 AM when a check fails.',
    'supportText' => 'Didn’t find it?',
    'supportLinkText' => 'Ask on chat, 7:00 AM to 9:00 PM ET',
    'supportLinkUrl' => '/contact',
    'faqs' => [
        (object) ['question' => 'How much does Cairn cost?', 'answer' => 'Solo is $19 a month for 25 checks at a one-minute interval. Team is $59 a month for 200 checks, three regions, and on-call schedules for up to 15 people.'],
        (object) ['question' => 'Is there a free trial?', 'answer' => 'Every account starts on Team for 14 days with no card on file. When it ends you choose a plan, and nothing you set up is lost.'],
        (object) ['question' => 'Can I import checks from my current monitor?', 'answer' => 'Yes. Upload a CSV of URLs, intervals, and expected status codes and Cairn creates the checks in one pass. Most teams finish the move in under an hour.'],
        (object) ['question' => 'Where do the checks run from?', 'answer' => 'Probes run from Ashburn, Dallas, and Portland, and an incident opens only when two regions agree. A single bad network path never wakes you up.'],
        (object) ['question' => 'How do we get paged?', 'answer' => 'Alerts go out by SMS, phone call, email, or a webhook into your chat tool. Each escalation step waits 5 to 30 minutes, your choice, before moving to the next person.'],
        (object) ['question' => 'Is our data encrypted?', 'answer' => 'All traffic uses TLS 1.3 and check results sit encrypted at rest in a US region. Cairn holds a SOC 2 Type II report and keeps 13 months of history on every plan.'],
    ],
])
<!-- FAQ in a centered narrow column: eyebrow, heading and a line, then one bordered card per question (native <details>, one open at a time) whose border darkens while open, and a support line under. Rows come from collections.faqs (question, answer). Clear the eyebrow, intro or support text to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-2xl">
        <div class="text-center" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mx-auto mt-4 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="reveal-2 mt-14 flex flex-col gap-3" data-reveal>
            @foreach ($faqs as $item)
            <details class="faq-item group rounded-2xl border border-line bg-panel px-6 transition-colors duration-200 open:border-line-strong hover:border-line-strong" name="faq-02">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[16px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                    {{ $item->question }}
                    <svg viewBox="0 0 16 16" class="faq-plus size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                </summary>
                <p class="max-w-[62ch] pb-6 text-[15px]/7 text-pretty text-muted">{{ $item->answer }}</p>
            </details>
            @endforeach
        </div>

        @if ($supportText)
        <p class="reveal-3 mt-10 text-center text-[14px]/6 text-muted" data-reveal>
            {{ $supportText }}
            <a href="{{ $supportLinkUrl }}" class="font-medium text-ink underline decoration-line underline-offset-4 transition-colors duration-200 hover:decoration-ink">{{ $supportLinkText }}</a>
        </p>
        @endif
    </div>
</section>
