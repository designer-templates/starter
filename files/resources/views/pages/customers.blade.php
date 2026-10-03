<!--
    /customers — the opener, the stories themselves (collections/stories.json: the newest wide with its
    figures, the rest as photograph cards), the numbers across every site, and the closing panel.
-->
<x-layouts.main title="Customers" description="How Bellwood & Vane in Raleigh, Ironside in Boise and Stonebridge Food Network in Pittsburgh hand their marketing pages to the people who write them.">

    <x-sections.page-header eyebrow="Customers" heading="Teams that stopped filing copy tickets" intro="A studio, a software company and a food bank network, and what changed once the people who write the words could publish them." linkText="See pricing" linkUrl="/pricing" />

    <x-sections.stories :stories="$stories" />

    <x-sections.stats heading="Across every Starter site" :stats="$stats" />

    <x-sections.cta-panel heading="Your site, sixty days from now" text="Start on the free plan with one site. Most teams have their editors publishing by the end of the first week." />

</x-layouts.main>
