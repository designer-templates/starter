@props([
    'heading' => 'One email a month',
    'text' => 'What shipped, what changed, and one scheduling habit worth stealing from another store. That is all.',
    'inputPlaceholder' => 'you@yourshop.com',
    'buttonText' => 'Subscribe',
    'finePrint' => 'No spam. Unsubscribe any time.',
])
<!-- Centered heading and copy with an email input and a subscribe button. The form is static markup; wire it to your list. Clear the fine print to hide it. -->
<section class="px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-xl text-center" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($text)
            <p class="mx-auto mt-5 max-w-[50ch] text-[17px]/7 text-pretty text-lede">{{ $text }}</p>
            @endif

            <form action="#" method="get" onsubmit="return false" class="mx-auto mt-8 flex w-full max-w-md flex-col gap-3 sm:flex-row">
                <label for="newsletter-email" class="sr-only">Email address</label>
                <input id="newsletter-email" type="email" autocomplete="email" placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full flex-1 rounded-full border border-line bg-panel px-5 text-[15px] text-ink placeholder:text-faint">
                <button type="submit" class="h-12 shrink-0 cursor-pointer rounded-full bg-ink px-6 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</button>
            </form>

            @if ($finePrint)
            <p class="mt-4 text-[13px] text-muted">{{ $finePrint }}</p>
            @endif
        </div>
    </div>
</section>
