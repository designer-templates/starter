<!--
    /blog — the opener, then the posts (collections/posts.json, newest first): the latest as a wide feature,
    the rest as cards. Each post has its own page at /blog/{slug}.
-->
<x-layouts.main title="Blog" description="Notes from the Starter team on Blade sections, default copy, instant pages, pricing pages and what our support inbox teaches us.">

    <x-sections.page-header eyebrow="Blog" heading="Notes from the people building Starter" intro="How we make the editor, what we learn from the teams using it, and the occasional strong opinion about pricing pages." linkText="" />

    <x-sections.blog-index :posts="$posts" />

    <x-sections.newsletter />

</x-layouts.main>
