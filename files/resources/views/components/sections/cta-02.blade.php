@props([
    'heading' => 'Send the 40 GB folder today',
    'text' => 'Drop the folder in Ferry, send the client one link, and let it expire on the date you set. Nothing to install on their side.',
    'action' => '/signup',
    'inputPlaceholder' => 'you@studio.com',
    'buttonText' => 'Create my workspace',
    'finePrint' => 'One sign-in link, no newsletter. The first 5 GB a month are free.',
])
<!-- A bordered panel: a centered heading, one line, an email input beside a button (the form posts to the Form action link), and a privacy line. Clear the supporting text or the fine print to hide them. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-4xl">
        <div class="rounded-3xl border border-line bg-panel px-6 py-16 text-center sm:px-16 sm:py-20">
            <h2 class="mx-auto max-w-[22ch] font-display text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            @if ($text)
            <p class="reveal-1 mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $text }}</p>
            @endif

            <form action="{{ $action }}" method="post" class="reveal-2 mx-auto mt-8 flex w-full max-w-md flex-col gap-3 sm:flex-row" data-reveal>
                <label class="min-w-0 flex-1">
                    <span class="sr-only">Email address</span>
                    <input type="email" name="email" autocomplete="email" inputmode="email" required placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full rounded-xl border border-line bg-canvas px-4 text-base text-ink placeholder:text-faint sm:text-[15px]">
                </label>
                <button type="submit" class="inline-flex h-12 shrink-0 cursor-pointer items-center justify-center gap-2 rounded-xl bg-ink px-6 text-[15px] font-medium whitespace-nowrap text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98]">{{ $buttonText }}</button>
            </form>

            @if ($finePrint)
            <p class="reveal-3 mt-4 text-[13px] text-muted" data-reveal>{{ $finePrint }}</p>
            @endif
        </div>
    </div>
</section>
