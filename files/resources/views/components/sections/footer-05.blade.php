@props([
    'brand' => 'Stillwater',
    'heading' => "Let's talk about your schedule.",
    'tagline' => 'Stillwater books, reminds and collects for 1,240 home-service crews. Tell us how yours runs and we will have a calendar in front of you in 20 minutes.',
    'emailText' => 'hello@stillwater.co',
    'emailUrl' => 'mailto:hello@stillwater.co',
    'columns' => [
        (object) ['text' => 'Product', 'url' => '#', 'children' => [
            (object) ['text' => 'Scheduling', 'url' => '#'],
            (object) ['text' => 'Reminders', 'url' => '#'],
            (object) ['text' => 'Payments', 'url' => '#'],
            (object) ['text' => 'Pricing', 'url' => '#'],
        ]],
        (object) ['text' => 'Company', 'url' => '#', 'children' => [
            (object) ['text' => 'About', 'url' => '#'],
            (object) ['text' => 'Customers', 'url' => '#'],
            (object) ['text' => 'Careers', 'url' => '#'],
        ]],
        (object) ['text' => 'Resources', 'url' => '#', 'children' => [
            (object) ['text' => 'Help center', 'url' => '#'],
            (object) ['text' => 'Guides', 'url' => '#'],
            (object) ['text' => 'Status', 'url' => '#'],
        ]],
    ],
    'contactHeading' => 'Talk to a person',
    'phone' => '+1 (612) 555-0134',
    'phoneUrl' => 'tel:+16125550134',
    'addressLine1' => '410 N Washington Ave, Suite 220',
    'addressLine2' => 'Minneapolis, MN 55401',
    'hours' => 'Mon–Fri, 8:00 AM–6:00 PM CT',
    'social' => [
        (object) ['text' => 'X', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231Zm-1.161 17.52h1.833L7.084 4.126H5.117l11.966 15.644Z'/></svg>"],
        (object) ['text' => 'GitHub', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path fill-rule='evenodd' clip-rule='evenodd' d='M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026a9.564 9.564 0 0 1 5.008 0c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z'/></svg>"],
        (object) ['text' => 'LinkedIn', 'url' => '#', 'icon' => "<svg viewBox='0 0 24 24' class='size-5 fill-current' aria-hidden='true'><path d='M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286ZM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065Zm1.782 13.019H3.555V9h3.564v11.452ZM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003Z'/></svg>"],
    ],
    'legal' => '© 2026 Stillwater Scheduling, Inc.',
])
<!--
    Footer, contact first. A big display line with one sentence and an email link under
    it, then a hairline, then three link columns and a fourth column with the phone,
    address and hours, all on one four-column grid; the brand, legal line and social icons close it under a second
    hairline. Columns come from footer_links and social icons from social_links in
    site.json. Clear the hours or an address line to drop it.
-->
<footer class="border-t border-line" data-footer-05>
    <div class="mx-auto w-full max-w-6xl px-6 py-16 sm:py-24 lg:px-8">
        <div class="max-w-3xl">
            <h2 class="reveal-1 text-4xl/[1.08] font-semibold tracking-[-0.03em] text-balance text-ink sm:text-5xl/[1.05]" data-reveal>{{ $heading }}</h2>
            <p class="reveal-2 mt-5 max-w-[52ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $tagline }}</p>
            <a href="{{ $emailUrl }}" class="arrow-link reveal-3 mt-6 inline-flex min-h-11 items-center gap-2 text-xl font-medium text-ink" data-reveal>
                {{ $emailText }}
                <svg viewBox="0 0 24 24" class="arrow size-5 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>

        <div class="mt-14 grid grid-cols-2 gap-x-6 gap-y-10 border-t border-line pt-14 sm:grid-cols-4 lg:gap-x-8">
            @foreach ($columns as $column)
            <div class="reveal-{{ min($loop->iteration, 6) }} min-w-0" data-reveal>
                <p class="text-[14px] font-semibold text-ink">{{ $column->text }}</p>
                <ul role="list" class="mt-4 flex flex-col gap-3 text-[14px] max-sm:gap-0">
                    @foreach ($column->children ?? [] as $child)
                    <li><a href="{{ $child->url }}" class="text-muted transition-colors duration-200 hover:text-ink max-sm:flex max-sm:min-h-11 max-sm:items-center">{{ $child->text }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach

            <div class="reveal-4 min-w-0 max-sm:col-span-2" data-reveal>
                <p class="text-[14px] font-semibold text-ink">{{ $contactHeading }}</p>
                <ul role="list" class="mt-4 flex flex-col gap-3 text-[14px] text-muted">
                    <li><a href="{{ $phoneUrl }}" class="tabular-nums transition-colors duration-200 hover:text-ink max-sm:flex max-sm:min-h-11 max-sm:items-center">{{ $phone }}</a></li>
                    <li class="leading-6">
                        @if ($addressLine1)
                        <span class="block">{{ $addressLine1 }}</span>
                        @endif
                        @if ($addressLine2)
                        <span class="block">{{ $addressLine2 }}</span>
                        @endif
                    </li>
                    @if ($hours)
                    <li>{{ $hours }}</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-14 flex flex-col gap-4 border-t border-line pt-8 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-6">
                <a href="/" class="inline-flex items-center gap-2.5 text-ink" aria-label="Homepage">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-current" aria-hidden="true"><path fill-rule="evenodd" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20ZM5 11h14v2H5v-2Z"/></svg>
                    <span class="text-[17px] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
                <p class="text-[14px] text-faint">{{ $legal }}</p>
            </div>
            <ul role="list" class="-ml-3.5 flex items-center sm:-mr-2.5 sm:ml-0">
                @foreach ($social as $item)
                <li>
                    <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex size-11 items-center justify-center rounded-lg text-muted transition-colors duration-200 hover:bg-raised hover:text-ink sm:size-9 [&>svg]:size-4">{!! $item->icon !!}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
