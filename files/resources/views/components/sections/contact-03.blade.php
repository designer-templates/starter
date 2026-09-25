@props([
    'eyebrow' => 'Contact',
    'heading' => 'Pick the way that suits you',
    'intro' => 'Four ways to reach the Rookery team. Each one ends with a bookkeeper who knows your clinic’s books.',
    'methods' => [
        (object) ['icon' => 'mail', 'title' => 'Email', 'text' => 'A reply from a bookkeeper, not a bot, within one business day.', 'linkText' => 'hello@rookery.app', 'linkUrl' => 'mailto:hello@rookery.app'],
        (object) ['icon' => 'chat', 'title' => 'Live chat', 'text' => 'Weekdays 9:00 AM–6:00 PM ET, from inside the app or right here.', 'linkText' => 'Start a chat', 'linkUrl' => '#'],
        (object) ['icon' => 'phone', 'title' => 'Phone', 'text' => 'For anything urgent about payroll or a filing deadline.', 'linkText' => '+1 (520) 555-0142', 'linkUrl' => 'tel:+15205550142'],
        (object) ['icon' => 'pin', 'title' => 'Visit', 'text' => '44 E Broadway Blvd, Suite 300, Tucson, AZ 85701. Coffee’s on.', 'linkText' => 'Get directions', 'linkUrl' => '#'],
    ],
])
<!-- Contact methods: a left-aligned opener over four linked cards (email, chat, phone, visit), each an icon tile, a title, one line and the detail as an arrow link. Cards are repeater rows; the icon is a select. Clear the eyebrow or intro to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($methods as $method)
            <a href="{{ $method->linkUrl }}" class="arrow-link reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)]" data-reveal>
                <span class="flex size-10 items-center justify-center rounded-xl bg-raised text-lede">
                    @if ($method->icon === 'chat')
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/></svg>
                    @elseif ($method->icon === 'phone')
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                    @elseif ($method->icon === 'pin')
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                    @else
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    @endif
                </span>
                <span class="mt-5 block text-base font-medium text-ink">{{ $method->title }}</span>
                <span class="mt-2 block text-[14px]/6 text-pretty text-muted">{{ $method->text }}</span>
                <span class="mt-auto inline-flex items-center gap-1.5 pt-6 text-[15px] font-medium text-ink">
                    <span class="truncate">{{ $method->linkText }}</span>
                    <svg viewBox="0 0 24 24" class="arrow size-4 shrink-0 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>
