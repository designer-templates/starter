@props([
    'heading' => 'Get in touch',
    'subheading' => 'Questions about plans, a demo for a few locations, or moving a schedule over from another tool. We reply within one business day.',
    'email' => 'hello@starter.app',
    'phone' => '+1 (614) 555-0136',
    'address' => '221 N High St, Suite 400, Columbus, OH 43215',
    'nameLabel' => 'Name',
    'emailLabel' => 'Email',
    'messageLabel' => 'Message',
    'buttonText' => 'Send message',
])
<!-- Contact details on the left, a static form on the right (wire the form to your handler). Opens a page below the fixed nav. Clear a detail to hide its row. -->
<section class="px-6 pt-16 pb-20 sm:pt-24 sm:pb-28">
    <div class="mx-auto grid w-full max-w-6xl gap-12 lg:grid-cols-2 lg:gap-16">
        <div data-reveal>
            <h1 class="text-hero font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h1>
            @if ($subheading)
            <p class="mt-6 max-w-[46ch] text-lg/8 text-pretty text-lede">{{ $subheading }}</p>
            @endif

            <ul role="list" class="mt-10 flex flex-col gap-4">
                @if ($email)
                <li class="flex items-center gap-3">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    <span class="text-[15px] text-lede">{{ $email }}</span>
                </li>
                @endif
                @if ($phone)
                <li class="flex items-center gap-3">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                    <span class="text-[15px] text-lede tabular-nums">{{ $phone }}</span>
                </li>
                @endif
                @if ($address)
                <li class="flex items-center gap-3">
                    <svg viewBox="0 0 24 24" class="size-5 shrink-0 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                    <span class="text-[15px] text-lede">{{ $address }}</span>
                </li>
                @endif
            </ul>
        </div>

        <form action="#" method="get" onsubmit="return false" class="reveal-1 rounded-2xl border border-line bg-panel p-6 sm:p-8" data-reveal>
            <div class="flex flex-col gap-5">
                <div>
                    <label for="contact-name" class="block text-[14px] font-medium text-ink">{{ $nameLabel }}</label>
                    <input id="contact-name" type="text" autocomplete="name" class="field mt-2 block h-11 w-full rounded-lg border border-line bg-canvas px-3.5 text-[15px] text-ink placeholder:text-faint">
                </div>
                <div>
                    <label for="contact-email" class="block text-[14px] font-medium text-ink">{{ $emailLabel }}</label>
                    <input id="contact-email" type="email" autocomplete="email" class="field mt-2 block h-11 w-full rounded-lg border border-line bg-canvas px-3.5 text-[15px] text-ink placeholder:text-faint">
                </div>
                <div>
                    <label for="contact-message" class="block text-[14px] font-medium text-ink">{{ $messageLabel }}</label>
                    <textarea id="contact-message" rows="4" class="field mt-2 block w-full rounded-lg border border-line bg-canvas px-3.5 py-2.5 text-[15px] text-ink placeholder:text-faint"></textarea>
                </div>
                <button type="submit" class="h-12 w-full cursor-pointer rounded-full bg-ink px-6 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</button>
            </div>
        </form>
    </div>
</section>
