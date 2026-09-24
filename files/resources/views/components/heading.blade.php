@props([
    'eyebrow' => '',
    'heading' => '',
    'paragraph' => '',
    'headingLevel' => 1
])

<div class="is-visible mx-auto text-center">
    @if ($eyebrow)
        <p class="text-xs font-semibold tracking-[0.2em] mb-3 text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
    @endif
    <{{ 'h' . $headingLevel }} class="@if($headingLevel == 1) text-hero font-semibold tracking-[-0.04em] max-w-4xl @else text-h2  max-w-xl @endif font-semibold tracking-tight text-balance text-faint first-line:text-ink mx-auto" data-reveal>{{ $heading }}</{{ 'h' . $headingLevel }}>
    @if($paragraph)
        <p class="mt-4 max-w-3xl mx-auto text-lg/8 text-balance text-muted" data-reveal>{{ $paragraph }}</p>
    @endif
</div>