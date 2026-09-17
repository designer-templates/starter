@props([
    'brand' => 'Starter',
    'tagline' => 'Rewrite this line in the product\'s voice.',
    'columns' => [],
    'social' => [],
    'legal' => '© 2026 Starter. All rights reserved.',
])
<!--
    The site-wide footer: the mark and a one-line tagline, link columns from
    footer_links in site.json, social icons from social_links, and a legal row.
-->
<footer class="border-t border-line">
    <div class="mx-auto w-full max-w-6xl px-6 py-16 sm:py-20">
        <div class="grid gap-12 lg:grid-cols-[1.4fr_repeat(3,1fr)]">
            <div>
                <a href="/" class="flex items-center gap-2.5 text-ink" aria-label="Homepage">
                    <svg viewBox="0 0 24 24" class="size-5 fill-current" aria-hidden="true"><path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/></svg>
                    <span class="text-[17px] font-semibold tracking-[-0.02em]">{{ $brand }}</span>
                </a>
                <p class="mt-4 max-w-[30ch] text-[15px]/7 text-muted">{{ $tagline }}</p>
                <ul role="list" class="mt-6 flex items-center gap-2">
                    @foreach ($social as $item)
                    <li>
                        <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex size-9 items-center justify-center rounded-full border border-line text-muted transition-colors duration-200 hover:border-line-strong hover:text-ink">{!! $item->icon !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($columns as $column)
            <div>
                <p class="font-mono text-[11px] tracking-widest text-faint uppercase">{{ $column->text }}</p>
                <ul role="list" class="mt-4 flex flex-col gap-2.5 text-[15px]">
                    @foreach ($column->children ?? [] as $child)
                    <li><a href="{{ $child->url }}" class="text-lede transition-colors duration-200 hover:text-ink">{{ $child->text }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <p class="mt-14 border-t border-line pt-6 text-[13px] text-faint">{{ $legal }}</p>
    </div>
</footer>
