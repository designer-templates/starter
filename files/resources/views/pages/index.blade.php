<!--
    The homepage, served at "/". A list of sections: each tag pulls a component
    from resources/views/components/sections/ and fills its props from these
    attributes and the bound collections in resources/data/collections/.
    In Visual mode you can select, reorder and edit them on the canvas.
-->
<x-layouts.main title="The visual editor for marketing pages" description="Starter is a visual editor built for developers: build pages, edit content, and control layouts, with plain Blade underneath.">

    <x-sections.hero />

    <x-sections.logos :logos="$logos" />

    <x-sections.features :features="$features" />

    <x-sections.testimonials :testimonials="$testimonials" :outcomes="$outcomes" />

    <x-sections.pricing :plans="$plans" />

    <x-sections.cta-simple />

</x-layouts.main>
