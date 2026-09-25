@props([
    'eyebrow' => 'The Anvil letter',
    'heading' => 'What broke last month, and why',
    'text' => 'Anvil watches 1,900 services. Once a month we write up the outages worth learning from, in about six minutes of reading.',
    'items' => [
        (object) ['text' => 'Three incidents, each with the root cause in two lines'],
        (object) ['text' => 'One runbook change a customer shipped, with the diff'],
        (object) ['text' => 'Nothing about Anvil unless something changed'],
    ],
    'formHeading' => 'Join 3,140 on-call engineers',
    'action' => '#',
    'inputLabel' => 'Work email',
    'inputPlaceholder' => 'you@yourcompany.com',
    'checkboxLabel' => 'Also send the weekly digest, every Monday at 7:00 AM ET',
    'buttonText' => 'Get the letter',
    'finePrint' => 'No sales email, ever. Unsubscribe in one click.',
])
<!-- Newsletter, split: eyebrow, heading, a line and the "what you get" rows (the repeater) on the left; a bordered card on the right with a labeled email field, an opt-in checkbox and the button. The form posts to the action URL. Clear the eyebrow, text, form heading, checkbox label or fine print to hide it. -->
<section class="px-6 py-16 sm:py-28" data-newsletter-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center lg:gap-20">
            <div>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 max-w-[26ch] text-h2 font-semibold tracking-tight text-balance text-ink reveal-1" data-reveal>{{ $heading }}</h2>
                @if ($text)
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted reveal-2" data-reveal>{{ $text }}</p>
                @endif

                <ul class="mt-8 divide-y divide-line border-y border-line reveal-3" data-reveal>
                    @foreach ($items as $item)
                    <li class="flex gap-3 py-3.5 text-[15px]/6 text-lede">
                        <svg viewBox="0 0 20 20" class="mt-0.5 size-5 shrink-0 fill-current text-ink" aria-hidden="true"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd"/></svg>
                        <span>{{ $item->text }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="rounded-2xl border border-line bg-panel p-6 shadow-[var(--shadow-card)] sm:p-8 reveal-2" data-reveal>
                @if ($formHeading)
                <h3 class="text-base font-medium text-ink">{{ $formHeading }}</h3>
                @endif
                <form action="{{ $action }}" method="post" class="mt-5 flex flex-col gap-5">
                    <label class="block">
                        <span class="block text-[14px] font-medium text-ink">{{ $inputLabel }}</span>
                        <input type="email" name="email" autocomplete="email" required placeholder="{{ $inputPlaceholder }}" class="field mt-2 h-12 w-full rounded-xl border border-line bg-canvas px-4 text-base text-ink placeholder:text-faint sm:text-[15px]">
                    </label>

                    @if ($checkboxLabel)
                    <label class="flex cursor-pointer gap-3 text-[14px]/6 text-lede">
                        <span class="flex h-6 shrink-0 items-center">
                            <span class="group inline-grid size-5 grid-cols-1 sm:size-4">
                                <input type="checkbox" name="digest" class="col-start-1 row-start-1 cursor-pointer appearance-none rounded-[5px] border border-line-strong bg-panel transition-colors duration-150 checked:border-accent checked:bg-accent forced-colors:appearance-auto">
                                <svg viewBox="0 0 14 14" fill="none" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 size-3/4 place-self-center stroke-accent-ink opacity-0 group-has-checked:opacity-100"><path d="M3 7.5 6 10.5 11 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </span>
                        <span>{{ $checkboxLabel }}</span>
                    </label>
                    @endif

                    <button type="submit" class="inline-flex h-12 w-full cursor-pointer items-center justify-center rounded-xl bg-ink px-6 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                </form>
                @if ($finePrint)
                <p class="mt-4 text-[13px] text-muted">{{ $finePrint }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
