@props([
    'eyebrow' => 'About',
    'heading' => 'Why we built Starter',
    'paragraph1' => 'Two of us ran a five-person web agency in Columbus for six years. Every site we launched ended the same way: a queue of tickets asking a developer to change a sentence, swap a photo, or rename a button.',
    'paragraph2' => 'The tools we tried asked us to choose. A headless CMS kept the words in one system and the components in another, and the two drifted. A hosted page builder made the marketing pages look like a different company. What we wanted was to edit the page you are looking at and have the change land in the same Blade files we already wrote.',
    'paragraph3' => 'So that is what we built. Starter has published 2,140 sites now, most of them for teams of under twenty, and the whole company still fits around one table in Columbus.',
])
<!-- A single prose column: eyebrow, heading, and up to three paragraphs. Opens a page below the fixed nav. Clear a paragraph to hide it. -->
<section class="pt-16 pb-20 sm:pt-24 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="font-mono text-[11px] tracking-widest text-muted-foreground uppercase">{{ $eyebrow }}</p>
            @endif
            <h1 class="mt-4 text-hero font-semibold tracking-tight text-balance text-foreground">{{ $heading }}</h1>

            <div class="mt-8 flex flex-col gap-5 text-[17px]/7 text-pretty text-foreground/78">
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
