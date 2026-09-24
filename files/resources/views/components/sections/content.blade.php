@props([
    'eyebrow' => 'About',
    'heading' => 'Why we built a scheduler',
    'paragraph1' => 'Two of us managed a coffee shop and a climbing gym before this. Every week ended the same way: a spreadsheet on Sunday night, a photo of it in the group chat, and a Monday morning of texts about who was swapping with whom.',
    'paragraph2' => 'The tools we tried were built for companies with an HR department. They had approval chains and org charts and a mobile app that needed a password reset every month. What a twelve-person team needs is a schedule that publishes in minutes and a swap that approves itself when it fits.',
    'paragraph3' => 'So that is what we built. Starter runs 2,140 schedules a week now, most of them for teams under twenty, and the whole company still fits around one table in Columbus.',
])
<!-- A single prose column: eyebrow, heading, and up to three paragraphs. Opens a page below the fixed nav. Clear a paragraph to hide it. -->
<section class="px-6 pt-16 pb-20 sm:pt-24 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h1 class="mt-4 text-hero font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h1>

            <div class="mt-8 flex flex-col gap-5 text-[17px]/7 text-pretty text-lede">
                <p>{{ $paragraph1 }}</p>
                @if ($paragraph2)
                <p>{{ $paragraph2 }}</p>
                @endif
                @if ($paragraph3)
                <p>{{ $paragraph3 }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
