@props([
    'message' => 'Learn how to build amazing landing pages.',
    'linkText' => 'Read the docs',
    'linkUrl' => '/#features',
    'dismissible' => '1',
])
<!--
    The thin dark announcement bar: a message, an optional arrow link, and a
    dismiss button (main.js hides it for the visit). The layout places it above
    the sticky header, so it scrolls away and the header stays put. Clear the
    message in the editor to remove the bar.
-->
@if ($message)
<section class="relative bg-shade" data-banner>
    <div class="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-center gap-x-4 gap-y-0.5 px-12 py-3 text-center sm:px-14">
        <p class="text-[14px] text-shade-ink/80">{{ $message }}</p>
        @if ($linkText)
        <a href="{{ $linkUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[14px] font-medium text-shade-ink underline decoration-shade-ink/30 underline-offset-4 transition-colors duration-200 hover:decoration-shade-ink">
            {{ $linkText }}
            <svg viewBox="0 0 24 24" class="arrow size-3.5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
        </a>
        @endif
    </div>
    @if ($dismissible)
    <button type="button" data-banner-dismiss class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer rounded-lg p-1.5 text-shade-muted transition-colors duration-200 hover:bg-shade-line hover:text-shade-ink" aria-label="Dismiss announcement">
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
    </button>
    @endif
</section>
@endif
