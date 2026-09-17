@props([
    'heading' => 'Be first on the schedule',
    'text' => 'We are opening a few hundred new accounts a week. Leave your email and we will send an invite as soon as your workspace is ready.',
    'inputPlaceholder' => 'you@yourshop.com',
    'buttonText' => 'Join the waitlist',
    'note' => 'Free while in early access. No card required.',
    'image' => '/images/schedule-wide.svg',
    'imageAlt' => 'A published weekly schedule for six people',
])
<!-- Signup hero: centered heading, an email row, then a wide 2:1 image. The form is static markup; wire it to your list. Clear the note to hide it. -->
<section class="px-6 pt-32 pb-20 sm:pt-40 sm:pb-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="text-hero font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h1>
            <p class="reveal-1 mx-auto mt-6 max-w-[54ch] text-lg/8 text-pretty text-lede" data-reveal>{{ $text }}</p>
            <form action="#" method="get" onsubmit="return false" class="reveal-2 mx-auto mt-10 flex w-full max-w-md flex-col gap-3 sm:flex-row" data-reveal>
                <label for="hero-signup-email" class="sr-only">Email address</label>
                <input id="hero-signup-email" type="email" autocomplete="email" placeholder="{{ $inputPlaceholder }}" class="field h-12 w-full rounded-full border border-line bg-panel px-5 text-[15px] text-ink placeholder:text-faint">
                <button type="submit" class="h-12 shrink-0 cursor-pointer rounded-full bg-ink px-6 text-[15px] font-medium text-canvas transition-opacity duration-200 hover:opacity-85 active:scale-[.98]">{{ $buttonText }}</button>
            </form>
            @if ($note)
            <p class="reveal-3 mt-4 text-[13px] text-muted" data-reveal>{{ $note }}</p>
            @endif
        </div>
        <img src="{{ $image }}" alt="{{ $imageAlt }}" width="2400" height="1200" class="reveal-4 mt-16 block aspect-[2/1] w-full rounded-2xl border border-line bg-panel object-cover shadow-card" data-reveal>
    </div>
</section>
