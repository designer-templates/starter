@props([
    'brand' => 'Starter',
    'links' => [],
    'signInText' => 'Sign in',
    'signInLink' => '#',
    'ctaText' => 'Get started',
    'ctaLink' => '/pricing',
])
<!--
    The site-wide top bar. It rests transparent over each page's opening
    section; once you scroll, main.js sets data-scrolled and site.css fades in
    the glass background and hairline.

    Links come from nav_links in resources/data/site.json. Nest links under an
    item and it becomes a dropdown (tested with count(): on the canvas an empty
    children list is a DataBag object, which is truthy): opens on hover with a short intent delay,
    toggles on click for touch, closes on Escape or an outside click.
-->
<header id="header" class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto flex h-16 w-full max-w-6xl items-center gap-8 px-6">

        <!-- href="/" always points to the site's root, in preview and when published -->
        <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
            <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true">
                <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
            </svg>
            <span class="text-[17px] font-semibold tracking-[-0.02em]">{{ $brand }}</span>
        </a>

        <nav class="max-lg:hidden" aria-label="Main">
            <ul role="list" class="flex items-center gap-1 text-[15px] text-lede">
                @foreach ($links as $link)
                @if (count($link->children ?? []))
                <li class="relative" data-dropdown>
                    <button type="button" data-dropdown-trigger aria-expanded="false" class="flex cursor-pointer items-center gap-1.5 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink">
                        {{ $link->text }}
                        <svg viewBox="0 0 16 16" class="dropdown-caret size-3.5 fill-current opacity-50" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    {{-- Centred with left-1/2 + a negative margin of half the width: the open motion animates translate. --}}
                    <div data-dropdown-panel class="absolute top-full left-1/2 -ml-[10rem] w-[20rem] pt-3">
                        <div class="flex flex-col gap-0.5 rounded-2xl border border-line bg-panel p-2 shadow-2xl shadow-black/10">
                            @foreach ($link->children as $child)
                            <a href="{{ $child->url }}" class="group flex flex-col rounded-xl px-3.5 py-2.5 transition-colors duration-150 hover:bg-raised">
                                <span class="text-[15px] font-medium text-ink">{{ $child->text }}</span>
                                @if ($child->description ?? false)
                                <span class="mt-0.5 text-[13px] leading-snug text-muted">{{ $child->description }}</span>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @else
                <li>
                    <a href="{{ $link->url }}" class="rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink aria-[current]:text-ink">{{ $link->text }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </nav>

        <div class="ml-auto flex items-center gap-2 max-lg:hidden">
            <a href="{{ $signInLink }}" class="rounded-full border border-line-strong px-4 py-2 text-[15px] text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
            <a href="{{ $ctaLink }}" class="rounded-full bg-ink px-4 py-2 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
        </div>

        <!-- Mobile: hamburger. The 44px box keeps the tap target comfortable. -->
        <button type="button" data-mobile-toggle aria-expanded="false" aria-label="Toggle menu" class="ml-auto flex size-11 cursor-pointer items-center justify-center rounded-lg text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current [.menu-open_&]:hidden" aria-hidden="true"><path stroke-linecap="round" d="M3.75 7h16.5M3.75 12h16.5M3.75 17h16.5"/></svg>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="hidden size-5 stroke-current [.menu-open_&]:block" aria-hidden="true"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- The mobile sheet, absolutely positioned under the bar so the fixed header stays 64px tall (its glass would otherwise blur everything beneath the hidden sheet). Dropdown parents flatten into their children here. -->
    <div data-mobile-panel class="absolute inset-x-0 top-full max-h-[calc(100dvh-4rem)] overflow-y-auto border-b border-line bg-canvas/95 lg:hidden">
        <nav class="mx-auto w-full max-w-6xl px-6 py-4" aria-label="Mobile">
            <ul role="list" class="flex flex-col text-base">
                @foreach ($links as $link)
                @if (count($link->children ?? []))
                <li class="mt-3 px-3 font-mono text-[11px] tracking-widest text-faint uppercase">{{ $link->text }}</li>
                @foreach ($link->children as $child)
                <li><a href="{{ $child->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $child->text }}</a></li>
                @endforeach
                @else
                <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-3 text-ink transition-colors duration-200 hover:bg-raised">{{ $link->text }}</a></li>
                @endif
                @endforeach
            </ul>
            <div class="mt-4 flex items-center gap-3 border-t border-line pt-4">
                <a href="{{ $signInLink }}" class="flex-1 rounded-full border border-line-strong px-4 py-3 text-center text-sm text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
                <a href="{{ $ctaLink }}" class="flex-1 rounded-full bg-ink px-4 py-3 text-center text-sm font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
            </div>
        </nav>
    </div>
</header>
