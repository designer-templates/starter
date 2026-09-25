@props([
    'brand' => 'Larch',
    'tagline' => 'Release notes your customers actually read: written once, posted to your changelog, your app and their inbox. Made in Portland.',
    'columns' => [
        (object) ['text' => 'Product', 'url' => '#', 'children' => [
            (object) ['text' => 'Changelog pages', 'url' => '#'],
            (object) ['text' => 'Email digests', 'url' => '#'],
            (object) ['text' => 'In-app widget', 'url' => '#'],
            (object) ['text' => 'Pricing', 'url' => '#'],
        ]],
        (object) ['text' => 'Developers', 'url' => '#', 'children' => [
            (object) ['text' => 'Docs', 'url' => '#'],
            (object) ['text' => 'API reference', 'url' => '#'],
            (object) ['text' => 'Status', 'url' => '#'],
            (object) ['text' => 'Our changelog', 'url' => '#'],
        ]],
        (object) ['text' => 'Company', 'url' => '#', 'children' => [
            (object) ['text' => 'About', 'url' => '#'],
            (object) ['text' => 'Blog', 'url' => '#'],
            (object) ['text' => 'Careers', 'url' => '#'],
            (object) ['text' => 'Contact', 'url' => '#'],
        ]],
    ],
    'social' => [
        (object) ['text' => 'X', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231Zm-1.161 17.52h1.833L7.084 4.126H5.117l11.966 15.644Z'/></svg>"],
        (object) ['text' => 'GitHub', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path fill-rule='evenodd' clip-rule='evenodd' d='M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026a9.564 9.564 0 0 1 5.008 0c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z'/></svg>"],
        (object) ['text' => 'LinkedIn', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286ZM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065Zm1.782 13.019H3.555V9h3.564v11.452ZM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003Z'/></svg>"],
    ],
    'legal' => '© 2026 Larch, Inc. All rights reserved.',
    'note' => 'Every release since 2021, all 214 of them, on one page.',
])
<!--
    Footer, giant wordmark. Brand block and link columns on top, a legal row under a
    hairline, then the brand name set enormous in the raised tone and clipped by the
    bottom edge of the page. Columns come from footer_links and social icons from
    social_links in site.json. Clear the note to hide it. The script only shrinks the
    wordmark when a longer name would overflow the container; it never grows it.
-->
<footer class="overflow-hidden border-t border-line" data-footer-02>
    <div class="mx-auto w-full max-w-6xl px-6 pt-16 sm:pt-20 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-8">
            <div class="reveal-1 lg:col-span-4" data-reveal>
                <a href="/" class="inline-flex items-center gap-2.5 text-ink" aria-label="Homepage">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path d="M12 2l9 16H3L12 2Zm-1 16h2v4h-2v-4Z"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
                <p class="mt-4 max-w-[36ch] text-[14px]/6 text-pretty text-muted">{{ $tagline }}</p>
                <ul role="list" class="-ml-3.5 mt-5 flex items-center sm:-ml-2.5">
                    @foreach ($social as $item)
                    <li>
                        <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex size-11 items-center justify-center rounded-lg text-muted transition-colors duration-200 hover:bg-raised hover:text-ink sm:size-9 [&>svg]:size-4">{!! $item->icon !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 lg:col-span-8 lg:pl-8">
                @foreach ($columns as $column)
                <div class="reveal-{{ min($loop->iteration + 1, 6) }} min-w-0" data-reveal>
                    <p class="text-[14px] font-semibold text-ink">{{ $column->text }}</p>
                    <ul role="list" class="mt-4 flex flex-col gap-3 text-[14px] max-sm:gap-0">
                        @foreach ($column->children ?? [] as $child)
                        <li><a href="{{ $child->url }}" class="text-muted transition-colors duration-200 hover:text-ink max-sm:flex max-sm:min-h-11 max-sm:items-center">{{ $child->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-14 flex flex-col gap-2 border-t border-line pt-8 text-[14px] text-faint sm:flex-row sm:items-center sm:justify-between sm:gap-4">
            <p>{{ $legal }}</p>
            @if ($note)
            <p>{{ $note }}</p>
            @endif
        </div>

        <p aria-hidden="true" class="reveal-3 -mb-[2.5vw] mt-4 select-none whitespace-nowrap text-[18vw] leading-none font-semibold tracking-[-0.05em] text-raised" data-reveal data-wordmark>{{ $brand }}</p>
    </div>
</footer>
<script>
(function () {
    document.querySelectorAll('[data-footer-02]:not([data-footer-02-ready])').forEach(function (root) {
        root.setAttribute('data-footer-02-ready', '');
        var mark = root.querySelector('[data-wordmark]');
        if (!mark) return;
        function fit() {
            mark.style.fontSize = '';
            var box = mark.clientWidth, text = mark.scrollWidth;
            if (text > box) mark.style.fontSize = (parseFloat(getComputedStyle(mark).fontSize) * box / text) + 'px';
        }
        fit();
        if ('ResizeObserver' in window) new ResizeObserver(fit).observe(root);
        else window.addEventListener('resize', fit);
    });
})();
</script>
