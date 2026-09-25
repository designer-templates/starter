@props([
    'eyebrow' => 'Questions',
    'heading' => 'Payroll for crews, answered',
    'intro' => 'Six things landscaping companies ask before they run a first payroll on Quarry.',
    'faqs' => [
        (object) ['question' => 'What does Quarry cost?', 'answer' => 'Quarry is $39 a month plus $6 per worker paid. There are no setup fees, and a crew that only works April through November pays nothing in the months it is off.'],
        (object) ['question' => 'How does the monthly bill work?', 'answer' => 'You are billed on the first of the month for the workers paid in the month before. The invoice lists each person by name so your bookkeeper can match it to the ledger.'],
        (object) ['question' => 'Can we bring over year-to-date figures?', 'answer' => 'Yes. Upload the last payroll register from your current provider and Quarry loads gross pay, withholdings, and PTO balances for every worker. Nothing runs until you approve the totals.'],
        (object) ['question' => 'Does it handle prevailing-wage jobs?', 'answer' => 'Assign a rate to a job and hours logged against it pay at that rate. The certified payroll report is generated with each run, ready to file.'],
        (object) ['question' => 'How is worker data protected?', 'answer' => 'Social Security numbers and bank details are encrypted with keys rotated every 90 days, and office staff never see a full account number. Quarry is SOC 2 Type II audited each year.'],
        (object) ['question' => 'Who do we call when a check is wrong?', 'answer' => 'A payroll specialist answers the phone 7:00 AM to 8:00 PM ET on weekdays, and a same-day correction is free. Off-cycle runs go out within two hours of approval.'],
    ],
])
<!-- FAQ as a numbered grid: a centered opener, then two columns of open answers (no accordion), each with a mono 01–06 number above the question and a hairline over the row. Rows come from collections.faqs (question, answer). Clear the eyebrow or intro to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mx-auto mt-4 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <dl class="mt-16 grid gap-x-16 sm:grid-cols-2">
            @foreach ($faqs as $item)
            <div class="reveal-{{ min($loop->iteration, 6) }} group border-t border-line py-8" data-reveal>
                <p class="font-mono text-[12px] text-faint tabular-nums transition-colors duration-200 group-hover:text-ink">{{ sprintf('%02d', $loop->iteration) }}</p>
                <dt class="mt-3 text-base font-medium text-ink">{{ $item->question }}</dt>
                <dd class="mt-2 max-w-[58ch] text-[15px]/6 text-pretty text-muted">{{ $item->answer }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>
