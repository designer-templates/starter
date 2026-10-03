<!--
    One page for every row of collections/posts.json, served at /blog/{slug}. Inside, $posts is the matched
    post and $entries is the whole collection, so the foot of the page can offer the others.
-->
<x-layouts.main :title="$posts->title" :description="$posts->excerpt">

    <x-sections.post-header :category="$posts->category" :date="$posts->date" :readTime="$posts->readTime" :title="$posts->title" :excerpt="$posts->excerpt" :author="$posts->author" :authorRole="$posts->authorRole" :avatar="$posts->avatar" :image="$posts->image" :imageAlt="$posts->imageAlt" />

    <x-sections.post-body :content="$posts->content" :more="collect($entries)->where('slug', '!=', $posts->slug)->values()->all()" />

    <x-sections.newsletter />

</x-layouts.main>
