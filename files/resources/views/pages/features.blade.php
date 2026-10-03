<!--
    /features — the product in four moves: the opener, three alternating rows with a screenshot each
    (collections/featureRows.json), the four steps from install to published with the publish screen under
    them (collections/setupSteps.json), the questions developers ask (collections/devFaqs.json), and the
    dark closing band.
-->
<x-layouts.main title="Features" description="Edit marketing pages on the page itself, keep plans, posts and testimonials in collections, and ship every section as plain Blade in your own repository.">

    <x-sections.page-header />

    <x-sections.feature-02 heading="Three places to work, one set of files" intro="Editors stay on the canvas, content lives in tables, and developers stay in their editor. Every change lands in the same repository." :rows="$featureRows" />

    <x-sections.feature-03 heading="From install to published in an afternoon" intro="Starter adds a folder and a service provider to a Laravel app you already have. Nothing else in the app changes." :steps="$setupSteps" image="/images/shot-publish.jpg" imageAlt="The publish screen: four changed pages waiting, and the version history beside them" />

    <x-sections.faq-03 eyebrow="For developers" heading="What developers ask first" intro="Six answers we send most often, before anyone installs anything." :faqs="$devFaqs" />

    <x-sections.cta-01 eyebrow="Free for one site" heading="Put your editors on the page" text="Install Starter in your app, pick a template, and hand over the words this afternoon. Your sections stay in your repository." ctaText="Start for free" ctaLink="/pricing" linkText="Read how Bellwood & Vane did it" linkUrl="/customers/bellwood-vane" listLabel="On every plan" :items="[(object) ['text' => 'Every section in the library, with its fields'], (object) ['text' => 'Collections and in-place editing'], (object) ['text' => 'Drafts, publishing and version history'], (object) ['text' => 'Your code in your repository, no lock-in']]" />

</x-layouts.main>
