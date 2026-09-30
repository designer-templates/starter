@props([
    'heading' => 'Let’s talk about your invoicing',
    'intro' => 'Questions about plans, moving 2,300 open invoices over from a spreadsheet, or a walkthrough for your dispatch team. A person replies within one business day.',
    'emailLabel' => 'Email',
    'emailText' => 'hello@quarry.app',
    'emailUrl' => 'mailto:hello@quarry.app',
    'phoneLabel' => 'Phone',
    'phoneText' => '+1 (412) 555-0161',
    'phoneUrl' => 'tel:+14125550161',
    'addressLabel' => 'Office',
    'address' => '119 Smithfield St, Floor 6, Pittsburgh, PA 15222',
    'hoursLabel' => 'Hours',
    'hours' => 'Mon–Fri, 9:00 AM–6:00 PM ET',
    'action' => '#',
    'fieldName' => 'Name',
    'fieldEmail' => 'Work email',
    'fieldCompany' => 'Company',
    'fieldMessage' => 'How can we help?',
    'buttonText' => 'Send message',
    'finePrint' => 'No auto-replies. A person writes back.',
])
<!-- Contact split: a page-opening heading and intro with a hairline details list (email, phone, office, hours) on the left, a bordered form (name, work email, company, message) on the right that posts to the action URL. Clear a detail or the fine print to hide it. -->
<section class="pt-16 pb-16 sm:pt-24 sm:pb-28">
    <div class="mx-auto grid w-full max-w-6xl px-6 lg:px-8 gap-14 lg:grid-cols-2 lg:gap-20">
        <div data-reveal>
            <h1 class="max-w-[16ch] text-hero font-semibold tracking-[-0.04em] text-balance text-foreground">{{ $heading }}</h1>
            @if ($intro)
            <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted-foreground">{{ $intro }}</p>
            @endif

            <dl class="mt-12 max-w-lg divide-y divide-border border-t border-border">
                @if ($emailText)
                <div class="grid grid-cols-[6rem_1fr] gap-4 py-4 sm:grid-cols-[7rem_1fr]">
                    <dt class="text-[14px]/6 text-muted-foreground">{{ $emailLabel }}</dt>
                    <dd class="text-[15px]/6 text-foreground"><a href="{{ $emailUrl }}" class="underline decoration-transparent underline-offset-4 transition-colors duration-200 hover:decoration-border-strong">{{ $emailText }}</a></dd>
                </div>
                @endif
                @if ($phoneText)
                <div class="grid grid-cols-[6rem_1fr] gap-4 py-4 sm:grid-cols-[7rem_1fr]">
                    <dt class="text-[14px]/6 text-muted-foreground">{{ $phoneLabel }}</dt>
                    <dd class="text-[15px]/6 text-foreground tabular-nums"><a href="{{ $phoneUrl }}" class="underline decoration-transparent underline-offset-4 transition-colors duration-200 hover:decoration-border-strong">{{ $phoneText }}</a></dd>
                </div>
                @endif
                @if ($address)
                <div class="grid grid-cols-[6rem_1fr] gap-4 py-4 sm:grid-cols-[7rem_1fr]">
                    <dt class="text-[14px]/6 text-muted-foreground">{{ $addressLabel }}</dt>
                    <dd class="text-[15px]/6 text-pretty text-foreground">{{ $address }}</dd>
                </div>
                @endif
                @if ($hours)
                <div class="grid grid-cols-[6rem_1fr] gap-4 py-4 sm:grid-cols-[7rem_1fr]">
                    <dt class="text-[14px]/6 text-muted-foreground">{{ $hoursLabel }}</dt>
                    <dd class="text-[15px]/6 text-foreground">{{ $hours }}</dd>
                </div>
                @endif
            </dl>
        </div>

        <form action="{{ $action }}" method="post" class="reveal-2 self-start rounded-2xl border border-border bg-card p-6 sm:p-8" data-reveal>
            <div class="flex flex-col gap-5">
                <label class="block">
                    <span class="block text-[14px] font-medium text-foreground">{{ $fieldName }}</span>
                    <input type="text" name="name" autocomplete="name" required class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                </label>
                <label class="block">
                    <span class="block text-[14px] font-medium text-foreground">{{ $fieldEmail }}</span>
                    <input type="email" name="email" autocomplete="email" inputmode="email" required class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                </label>
                <label class="block">
                    <span class="block text-[14px] font-medium text-foreground">{{ $fieldCompany }}</span>
                    <input type="text" name="company" autocomplete="organization" class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                </label>
                <label class="block">
                    <span class="block text-[14px] font-medium text-foreground">{{ $fieldMessage }}</span>
                    <textarea name="message" rows="5" required class="field mt-2 block w-full rounded-lg border border-input bg-background px-3.5 py-2.5 text-base/6 text-foreground sm:text-[15px]/6"></textarea>
                </label>
                <button type="submit" class="inline-flex w-full cursor-pointer items-center justify-center gap-2 rounded-control bg-primary px-7 py-3.5 text-[15px] font-medium text-primary-foreground shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                @if ($finePrint)
                <p class="text-center text-[13px] text-muted-foreground/80">{{ $finePrint }}</p>
                @endif
            </div>
        </form>
    </div>
</section>
