<!--
    The homepage, served at "/". A list of sections: each tag pulls a component
    from resources/views/components/sections/ and fills its props from these
    attributes and the bound collections in resources/data/collections/.
    In Visual mode you can select, reorder and edit them on the canvas.
-->
<x-layouts.main title="Shift scheduling for small teams" description="Starter builds the week's schedule from the last one, publishes it to every phone on the team, and approves the shift swaps that fit.">

    <x-sections.hero-split />

    <x-sections.features-grid :features="$features" />

    <x-sections.stats :stats="$stats" />

    <x-sections.testimonials :testimonials="$testimonials" />

    <x-sections.pricing :plans="$plans" />

    <x-sections.faq :faqs="$faqs" />

    <x-sections.cta-band />

</x-layouts.main>
