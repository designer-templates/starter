@props([
    'message' => 'Shift swaps now approve themselves when both people qualify.',
    'linkText' => 'See what changed',
    'linkUrl' => '/#features',
    'dismissible' => '1',
])
<!-- A thin announcement bar with a message, an optional link, and a dismiss button (main.js hides it for the visit). Place it above the hero. -->
<section class="relative border-b border-line bg-panel" data-banner>
    <div class="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-center gap-x-3 gap-y-0.5 px-12 py-2.5 text-center">
        <p class="text-[14px] text-lede">{{ $message }}</p>
        @if ($linkText)
        <a href="{{ $linkUrl }}" class="text-[14px] font-medium text-ink underline decoration-line-strong underline-offset-4 transition-colors duration-200 hover:decoration-ink">{{ $linkText }}</a>
        @endif
    </div>
    @if ($dismissible)
    <button type="button" data-banner-dismiss class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer rounded-lg p-1.5 text-faint transition-colors duration-200 hover:bg-raised hover:text-ink" aria-label="Dismiss announcement">
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
    </button>
    @endif
</section>
