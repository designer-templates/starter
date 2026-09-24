@props([
    'brand' => 'Starter',
    'tagline' => 'The visual editor for marketing pages. Build the page, hand over the content, and keep control of the layout.',
    'columns' => [],
    'social' => [],
    'legal' => '© 2026 Starter, Inc. All rights reserved.',
    'backToTopText' => 'Back to top',
])
<!--
    The site-wide footer: the mark, a short blurb and the social icons on the
    left; link columns from footer_links in site.json on the right; a legal
    row with a back-to-top link underneath. Clear the back-to-top text to hide it.
-->
<footer id="footer" class="border-t border-line">
    <div class="mx-auto w-full max-w-6xl px-6 py-16 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1.2fr_2fr] lg:gap-16">
            <div class="max-w-sm">
                <a href="/" class="flex items-center gap-2.5 text-ink" aria-label="Homepage">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true">
                        <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
                    </svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
                <p class="mt-4 text-[14px]/6 text-muted">{{ $tagline }}</p>
                <ul role="list" class="mt-6 flex items-center gap-4">
                    @foreach ($social as $item)
                    <li>
                        <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex text-faint transition-colors duration-200 hover:text-ink">{!! $item->icon !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
                @foreach ($columns as $column)
                <div>
                    <p class="text-[14px] font-semibold text-ink">{{ $column->text }}</p>
                    <ul role="list" class="mt-4 flex flex-col gap-3 text-[14px]">
                        @foreach ($column->children ?? [] as $child)
                        <li><a href="{{ $child->url }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $child->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-line pt-8 sm:flex-row">
            <p class="text-[14px] text-faint">{{ $legal }}</p>
            @if ($backToTopText)
            <a href="#header" class="inline-flex items-center gap-1.5 text-[14px] font-medium text-muted transition-colors duration-200 hover:text-ink">
                {{ $backToTopText }}
                <svg viewBox="0 0 24 24" class="size-3.5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0-6 6m6-6 6 6"/></svg>
            </a>
            @endif
        </div>
    </div>
</footer>
