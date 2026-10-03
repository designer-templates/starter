<!--
    One page for every row of collections/stories.json, served at /customers/{slug}. Inside, $stories is the
    matched story and $entries is the whole collection, so the foot of the page can offer the others.
-->
<x-layouts.main :title="$stories->company" :description="$stories->excerpt">

    <x-sections.story-header :company="$stories->company" :location="$stories->location" :industry="$stories->industry" :size="$stories->size" :title="$stories->title" :excerpt="$stories->excerpt" :image="$stories->image" :imageAlt="$stories->imageAlt" :figureOneValue="$stories->figureOneValue" :figureOneLabel="$stories->figureOneLabel" :figureTwoValue="$stories->figureTwoValue" :figureTwoLabel="$stories->figureTwoLabel" :figureThreeValue="$stories->figureThreeValue" :figureThreeLabel="$stories->figureThreeLabel" />

    <x-sections.story-body :content="$stories->content" :quote="$stories->quote" :person="$stories->person" :initials="$stories->initials" :role="$stories->role" :company="$stories->company" :more="collect($entries)->where('slug', '!=', $stories->slug)->values()->all()" />

    <x-sections.cta-simple heading="Hand your pages to the people who write them" text="Start on the free plan with one site and every section. Invite your editors when the first page looks right." />

</x-layouts.main>
