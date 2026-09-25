@props([
    'brand' => 'Starter',
    'links' => [],
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Sign up',
    'ctaLink' => '/pricing',
])
<!--
    The site-wide header — the mark and brand on the left, the links centered,
    Log in and the primary action on the right. It is sticky at the top of the
    viewport; the announcement bar is its own section (sections/banner.blade.php),
    placed above it in the layout, so it scrolls away and the bar stays put.
    Every page's opening section starts right under it.

    Links come from nav_links in resources/data/site.json. Nest links under an
    item and it becomes a dropdown (tested with count(): on the canvas an empty
    children list is a DataBag object, which is truthy): opens on hover with a short intent delay,
    toggles on click for touch, closes on Escape or an outside click.
-->
<header id="header" class="sticky top-0 z-50">
    <div class="relative border-b border-line bg-canvas/85 backdrop-blur-md">
        <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between gap-6 px-6 lg:px-8">

            <!-- href="/" always points to the site's root, in preview and when published -->
            <a href="/" aria-label="Homepage" class="flex pr-16 shrink-0 items-center gap-2.5 text-ink">
                <!-- The mark launches up from behind its own edge on load (.logo-mark in site.css). -->
                <svg viewBox="0 0 24 24" class="logo-mark size-5 shrink-0 fill-current" aria-hidden="true">
                    <path d="M12 1.9 21.4 21.4 12 16.9 2.6 21.4Z"/>
                </svg>
                <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
            </a>

            <nav class="max-lg:hidden" aria-label="Main">
                <ul role="list" class="flex items-center gap-1 text-[15px] font-medium text-lede">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="relative" data-dropdown>
                        <button type="button" data-dropdown-trigger aria-expanded="false" class="flex cursor-pointer items-center gap-1 rounded-lg px-3 py-2 transition-colors duration-200 hover:text-ink">
                            {{ $link->text }}
                            <svg viewBox="0 0 20 20" class="dropdown-caret size-3.5 fill-current text-faint" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        {{-- Centred with left-1/2 + a negative margin of half the width: the open motion animates translate. --}}
                        <div data-dropdown-panel class="absolute top-full left-1/2 -ml-[9rem] w-[18rem] pt-2">
                            <div class="flex flex-col gap-0.5 rounded-xl border border-line bg-panel p-1.5 shadow-xl shadow-black/5">
                                @foreach ($link->children as $child)
                                <a href="{{ $child->url }}" class="flex flex-col rounded-lg px-3 py-2 transition-colors duration-150 hover:bg-raised">
                                    <span class="text-[14px] font-medium text-ink">{{ $child->text }}</span>
                                    @if ($child->description ?? false)
                                    <span class="mt-0.5 text-[13px] leading-snug font-normal text-muted">{{ $child->description }}</span>
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

            <div class="flex items-center gap-2.5 max-lg:hidden">
                @if ($signInText)
                <a href="{{ $signInLink }}" class="rounded-xl px-4 py-2 text-[15px] font-medium text-lede transition-colors duration-200 hover:text-ink">{{ $signInText }}</a>
                @endif
                @if ($ctaText)
                <a href="{{ $ctaLink }}" class="rounded-xl bg-ink px-4 py-2 text-[15px] font-medium text-canvas shadow-sm transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
                @endif
            </div>

            <!-- Mobile: hamburger. The 44px box keeps the tap target comfortable. -->
            <button type="button" data-mobile-toggle aria-expanded="false" aria-label="Toggle menu" class="flex size-11 cursor-pointer items-center justify-center rounded-lg text-ink transition-colors duration-200 hover:bg-raised lg:hidden">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current [.menu-open_&]:hidden" aria-hidden="true"><path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="hidden size-5 stroke-current [.menu-open_&]:block" aria-hidden="true"><path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- The mobile sheet, absolutely positioned under the bar. Dropdown parents flatten into their children here. -->
        <div data-mobile-panel class="absolute inset-x-0 top-full max-h-[calc(100dvh-4rem)] overflow-y-auto border-b border-line bg-canvas lg:hidden">
            <nav class="mx-auto w-full max-w-6xl px-6 py-4" aria-label="Mobile">
                <ul role="list" class="flex flex-col gap-0.5 text-[15px] font-medium">
                    @foreach ($links as $link)
                    @if (count($link->children ?? []))
                    <li class="px-3 pt-3 pb-1 text-[15px] text-ink">{{ $link->text }}</li>
                    @foreach ($link->children as $child)
                    <li><a href="{{ $child->url }}" class="flex rounded-lg py-2.5 pr-3 pl-7 font-normal text-muted transition-colors duration-200 hover:bg-raised hover:text-ink">{{ $child->text }}</a></li>
                    @endforeach
                    @else
                    <li><a href="{{ $link->url }}" class="flex rounded-lg px-3 py-2.5 text-ink transition-colors duration-200 hover:bg-raised">{{ $link->text }}</a></li>
                    @endif
                    @endforeach
                </ul>
                <div class="mt-4 flex flex-col gap-2 border-t border-line pt-4">
                    @if ($signInText)
                    <a href="{{ $signInLink }}" class="rounded-xl border border-line-strong px-4 py-2.5 text-center text-[15px] font-medium text-ink transition-colors duration-200 hover:bg-raised">{{ $signInText }}</a>
                    @endif
                    @if ($ctaText)
                    <a href="{{ $ctaLink }}" class="rounded-xl bg-ink px-4 py-2.5 text-center text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85">{{ $ctaText }}</a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>
