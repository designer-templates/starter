@props([
    'heading' => 'Send us a note',
    'text' => 'Billing, a move from another help desk, or a bug you’d like a person to see. Every note lands with the team in Boise.',
    'action' => '#',
    'fieldFirst' => 'First name',
    'fieldLast' => 'Last name',
    'fieldEmail' => 'Email',
    'fieldTopic' => 'Topic',
    'topics' => [
        (object) ['label' => 'Plans and billing'],
        (object) ['label' => 'Moving from another help desk'],
        (object) ['label' => 'Something looks broken'],
        (object) ['label' => 'Partnerships'],
        (object) ['label' => 'Something else'],
    ],
    'fieldMessage' => 'Message',
    'buttonText' => 'Send note',
    'replyLine' => 'We reply within one business day, usually sooner.',
])
<!-- Contact card: one centred bordered card (max-w-xl) with an icon tile, heading and a line, then a form — first and last name in two columns, email, a topic select, a message that grows as you type, and the button — posting to the action URL. Topic options are repeater rows; clear the reply line to hide it. -->
<section class="py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <div class="mx-auto w-full max-w-xl">
            <form action="{{ $action }}" method="post" class="rounded-2xl border border-border bg-card p-6 sm:p-10" data-reveal>
                <div class="mx-auto flex size-10 items-center justify-center rounded-xl bg-muted text-foreground/78">
                    <svg viewBox="0 0 24 24" class="size-5" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.998 12Zm0 0h7.5"/></svg>
                </div>
                <h2 class="mx-auto mt-5 max-w-[24ch] text-center text-h2 font-semibold tracking-tight text-balance text-foreground">{{ $heading }}</h2>
                @if ($text)
                <p class="mx-auto mt-3 max-w-[46ch] text-center text-[15px]/6 text-pretty text-muted-foreground">{{ $text }}</p>
                @endif

                <div class="mt-8 flex flex-col gap-5">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="block">
                            <span class="block text-[14px] font-medium text-foreground">{{ $fieldFirst }}</span>
                            <input type="text" name="first_name" autocomplete="given-name" required class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                        </label>
                        <label class="block">
                            <span class="block text-[14px] font-medium text-foreground">{{ $fieldLast }}</span>
                            <input type="text" name="last_name" autocomplete="family-name" required class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                        </label>
                    </div>
                    <label class="block">
                        <span class="block text-[14px] font-medium text-foreground">{{ $fieldEmail }}</span>
                        <input type="email" name="email" autocomplete="email" inputmode="email" required class="field mt-2 block h-11 w-full rounded-lg border border-input bg-background px-3.5 text-base text-foreground sm:text-[15px]">
                    </label>
                    <label class="block">
                        <span class="block text-[14px] font-medium text-foreground">{{ $fieldTopic }}</span>
                        <span class="mt-2 grid grid-cols-[1fr_2.5rem]">
                            <select name="topic" class="field col-span-full row-start-1 h-11 w-full appearance-none rounded-lg border border-input bg-background pr-10 pl-3.5 text-base text-foreground sm:text-[15px]">
                                @foreach ($topics as $topic)
                                <option>{{ $topic->label }}</option>
                                @endforeach
                            </select>
                            <svg viewBox="0 0 24 24" class="pointer-events-none col-start-2 row-start-1 size-4 place-self-center text-muted-foreground" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                        </span>
                    </label>
                    <label class="block">
                        <span class="block text-[14px] font-medium text-foreground">{{ $fieldMessage }}</span>
                        <textarea name="message" rows="4" required class="field mt-2 block min-h-28 w-full resize-none rounded-lg border border-input bg-background px-3.5 py-2.5 text-base/6 text-foreground [field-sizing:content] sm:text-[15px]/6"></textarea>
                    </label>
                    <button type="submit" class="inline-flex w-full cursor-pointer items-center justify-center gap-2 rounded-xl bg-primary px-7 py-3.5 text-[15px] font-medium text-primary-foreground shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
                    @if ($replyLine)
                    <p class="text-center text-[13px] text-muted-foreground/80">{{ $replyLine }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
