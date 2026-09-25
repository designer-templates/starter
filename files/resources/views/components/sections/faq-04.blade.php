@props([
    'heading' => 'Answers for owners of 2 to 200 units',
    'intro' => 'How billing works, and what week one on Gable is like.',
    'topicFirst' => 'Billing',
    'topicSecond' => 'Getting set up',
    'questions' => [
        (object) ['topic' => 'first', 'question' => 'How is Gable priced?', 'answer' => 'Gable is $12 per unit per month with a $29 minimum, billed on the first. Owners with more than 100 units pay $9 per unit and get a dedicated account lead.'],
        (object) ['topic' => 'first', 'question' => 'Do tenants pay a fee for online rent?', 'answer' => 'Bank transfers are free for tenants and settle in two business days. Card payments carry a 2.9% fee that you can absorb or pass through with one setting.'],
        (object) ['topic' => 'first', 'question' => 'Who answers when a payment fails?', 'answer' => 'A person on our billing team, 8:00 AM to 6:00 PM ET on weekdays, usually within 20 minutes. A failed transfer retries after three business days and the tenant is told either way.'],
        (object) ['topic' => 'second', 'question' => 'Can we import leases from a spreadsheet?', 'answer' => 'Yes. Upload a sheet with unit, tenant, rent, and lease dates and Gable builds the ledgers with balances as of the day you switch. Most owners import a building in about 15 minutes.'],
        (object) ['topic' => 'second', 'question' => 'How do tenants get access?', 'answer' => 'Each tenant receives a text and an email with a link to set a password. They can see their ledger, pay rent, and file a maintenance request from any phone.'],
        (object) ['topic' => 'second', 'question' => 'Is our financial data secure?', 'answer' => 'Bank connections use tokenized access, so Gable never stores account credentials. Data is encrypted at rest in a US data center and covered by a SOC 2 Type II report.'],
    ],
])
<!-- FAQ grouped by topic: a left opener with no eyebrow, then two columns, each with a small topic heading over its own accordion of native <details>. The topic names are fields; the rows are one repeater whose `topic` select sends each question to the first or second column. The rows ship with the block (question, answer, topic) rather than binding to the site-wide faqs collection, which has no topic. Clear the intro to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="reveal-2 mt-16 flex flex-col lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-x-16" data-reveal>
            <h3 class="order-1 border-b border-line pb-4 text-base font-medium text-ink lg:col-start-1 lg:row-start-1">{{ $topicFirst }}</h3>
            <h3 class="order-3 mt-14 border-b border-line pb-4 text-base font-medium text-ink lg:col-start-2 lg:row-start-1 lg:mt-0">{{ $topicSecond }}</h3>
            @foreach ($questions as $item)
            <details class="faq-item group border-b border-line {{ ($item->topic ?? 'first') === 'second' ? 'order-4 lg:col-start-2' : 'order-2 lg:col-start-1' }}">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[16px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                    {{ $item->question }}
                    <svg viewBox="0 0 16 16" class="faq-plus size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                </summary>
                <p class="max-w-[62ch] pb-6 text-[15px]/7 text-pretty text-muted">{{ $item->answer }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
