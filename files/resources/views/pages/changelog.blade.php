<!--
    /changelog — the opener and the releases themselves (collections/releases.json, newest first). No closing
    section: a changelog ends where the oldest release does, and the footer carries the rest.
-->
<x-layouts.main title="Changelog" description="What shipped in Starter, every other Tuesday — collections in a table, pages that change in place, global blocks and one set of variables for every template.">

    <x-sections.page-header eyebrow="Changelog" heading="What shipped, and when" intro="Small releases, written by the people who built them. Every version links to its own entry." linkText="See the features" linkUrl="/features" />

    <x-sections.releases :releases="$releases" />

</x-layouts.main>
