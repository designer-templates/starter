@props([
    'eyebrow' => 'Our mission',
    'statement' => 'The house call that shows up on time.',
    'paragraph' => 'I spent eight years as a mobile vet in Raleigh, and the hardest part was never the medicine. It was the 4:15 PM call to say I was running an hour late again. In 2019 a friend in Boise who builds routing software rode along for a week, 22 visits, and we sketched Camber on the drive back. It plans the day around traffic, the size of the animal and the appointments that always run long.',
    'figures' => [
        (object) ['value' => '41,200', 'label' => 'House calls scheduled a month'],
        (object) ['value' => '96.3%', 'label' => 'Arrive inside the promised window'],
        (object) ['value' => '2019', 'label' => 'Founded in Raleigh'],
        (object) ['value' => '18', 'label' => 'People across two cities'],
    ],
])
<!--
    About, mission panel and stats: a soft well with an eyebrow and a large statement on the left and one
    paragraph on the right at desktop; under it a row of four figures with hairlines between them (two per
    row on phones). Figures are a repeater (value, label) that can bind to the site's stats collection.
    Clear the eyebrow to hide it.
-->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="rounded-3xl bg-raised/70 p-8 sm:p-12 lg:p-16" data-reveal>
            <div class="grid gap-y-8 lg:grid-cols-12 lg:gap-x-12">
                <div class="lg:col-span-7">
                    @if ($eyebrow)
                    <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                    @endif
                    <p class="max-w-[22ch] text-3xl font-semibold tracking-tight text-balance text-ink sm:text-4xl">{{ $statement }}</p>
                </div>
                <p class="text-[16px]/7 text-pretty text-muted lg:col-span-5 lg:pt-8">{{ $paragraph }}</p>
            </div>
        </div>

        <dl class="mt-12 grid grid-cols-2 gap-y-10 sm:mt-16 lg:grid-cols-4 lg:gap-y-0">
            @foreach ($figures as $stat)
            <div class="reveal-{{ min($loop->iteration, 6) }} border-line [&:nth-child(2n)]:border-l [&:nth-child(2n)]:pl-6 lg:border-l lg:pl-8 lg:[&:nth-child(2n)]:pl-8 lg:[&:nth-child(4n+1)]:border-l-0 lg:[&:nth-child(4n+1)]:pl-0" data-reveal>
                <dd class="text-figure font-semibold tracking-tight text-ink tabular-nums">{{ $stat->value }}</dd>
                <dt class="mt-2 max-w-[22ch] text-[14px] text-pretty text-muted">{{ $stat->label }}</dt>
            </div>
            @endforeach
        </dl>
    </div>
</section>
