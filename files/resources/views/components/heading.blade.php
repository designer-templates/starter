@props([
    'eyebrow' => '',
    'heading' => '',
    'paragraph' => ''
])

<div class="is-visible mx-auto text-center" data-reveal="">
    @if ($eyebrow)
        <p class="text-xs font-semibold tracking-[0.2em] mb-3 text-faint uppercase">{{ $eyebrow }}</p>
    @endif
    <h2 class="text-h2 max-w-xl font-semibold tracking-tight text-balance text-ink mx-auto">{{ $heading }}</h2>
    @if($paragraph)
        <p class="mt-4 max-w-3xl mx-auto text-lg/8 text-balance text-muted">{{ $paragraph }}</p>
    @endif
</div>