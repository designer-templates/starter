@props([
    'eyebrow' => 'Questions',
    'heading' => 'What studios ask before they switch',
    'intro' => 'Straight answers on plans, billing, moving your books over, and how Halyard keeps them safe.',
    'linkText' => 'Still stuck? Email us',
    'linkUrl' => 'mailto:support@halyard.co',
    'faqs' => [
        (object) ['question' => 'Which plan fits a studio of eight?', 'answer' => 'Studio covers up to 10 people at $89 a month and includes project budgets and time entry. Practice starts at 11 seats and adds multi-entity books and a quarterly review with a Halyard accountant.'],
        (object) ['question' => 'How does billing work?', 'answer' => 'Plans bill monthly on the day you started, and yearly billing saves two months. A seat added mid-cycle is prorated to the day on your next invoice.'],
        (object) ['question' => 'Can we move our existing books over?', 'answer' => 'Yes. Export a trial balance and your open invoices from the ledger you use today, upload them, and Halyard maps the accounts in about 20 minutes with a review step before anything posts.'],
        (object) ['question' => 'Where is our data stored, and who can see it?', 'answer' => 'Books live in encrypted storage in a US data center, with access set by role down to a single project. Halyard holds a SOC 2 Type II report and a full audit log ships with every plan.'],
        (object) ['question' => 'Can our outside CPA log in?', 'answer' => 'Every plan includes unlimited accountant seats at no charge. Your CPA gets read access, a year-end package, and can leave a note on any entry.'],
        (object) ['question' => 'When is support available?', 'answer' => 'Chat and email run 8:00 AM to 7:00 PM ET on weekdays, with a reply in under an hour during those hours. Practice plans add a phone line and a named onboarding lead for the first 60 days.'],
    ],
])
<!-- FAQ in two columns: eyebrow, heading, a line and an email link on the left; a hairline-divided accordion of native <details> on the right. Rows come from collections.faqs (question, answer). Clear the eyebrow, intro or link text to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="max-w-2xl lg:col-span-5" data-reveal>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($intro)
                <p class="mt-5 max-w-[42ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
                @endif
                @if ($linkText)
                <a href="{{ $linkUrl }}" class="arrow-link mt-8 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                    {{ $linkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                @endif
            </div>

            <div class="reveal-2 divide-y divide-line border-y border-line lg:col-span-7" data-reveal>
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
        </div>
    </div>
</section>
