@props([
    'eyebrow' => 'Team',
    'heading' => 'A small crew, mostly former schedulers',
    'intro' => 'Six people across three time zones. Every one of us has built a week of home visits by hand, which is why Ballast never asks you to.',
    'members' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/3.webp?size=160', 'name' => 'Taylor Rivera', 'role' => 'Co-founder, CEO'],
        (object) ['image' => 'https://assets.ui.sh/avatars/7.webp?size=160', 'name' => 'Drew Kim', 'role' => 'Co-founder, CTO'],
        (object) ['image' => 'https://assets.ui.sh/avatars/11.webp?size=160', 'name' => 'Emery Brooks', 'role' => 'Design'],
        (object) ['image' => 'https://assets.ui.sh/avatars/2.webp?size=160', 'name' => 'Parker Chen', 'role' => 'Engineering'],
        (object) ['image' => 'https://assets.ui.sh/avatars/14.webp?size=160', 'name' => 'Skyler Okafor', 'role' => 'Clinical partnerships'],
        (object) ['image' => 'https://assets.ui.sh/avatars/9.webp?size=160', 'name' => 'Rowan Alvarez', 'role' => 'Support'],
    ],
    'showHiring' => '1',
    'hiringLabel' => '3 open roles',
    'hiringHeading' => 'We’re hiring in Denver and remote',
    'hiringText' => 'A senior engineer, a product designer and an implementation lead. Four-day weeks, and the salary is on every listing.',
    'ctaText' => 'See open roles',
    'ctaLink' => '/careers',
    'hiringNote' => 'Remote across US time zones · Denver office',
])
<!-- Team, people strip and hiring card: a left opener, then a raised card with the open roles and a button beside the opener on desktop, then a single row of round portraits with names under, beneath a hairline. Rows come from the team collection; clear the eyebrow, intro or note to hide it, and switch the card off with its toggle. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-16">
            <div class="max-w-2xl lg:col-span-7" data-reveal>
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($intro)
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
                @endif
            </div>

            @if ($showHiring)
            <div class="rounded-3xl bg-raised/70 p-8 lg:col-span-5 lg:col-start-8" data-reveal>
                @if ($hiringLabel)
                <span class="inline-flex items-center gap-1.5 rounded-full border border-line bg-panel px-3 py-1 text-[12px] font-medium text-muted">
                    <span class="size-1.5 rounded-full bg-ink" aria-hidden="true"></span>
                    {{ $hiringLabel }}
                </span>
                @endif
                <h3 class="mt-5 text-xl font-semibold tracking-tight text-balance text-ink">{{ $hiringHeading }}</h3>
                <p class="mt-3 text-[15px]/6 text-pretty text-muted">{{ $hiringText }}</p>
                <a href="{{ $ctaLink }}" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto">{{ $ctaText }}</a>
                @if ($hiringNote)
                <p class="mt-5 text-[13px] text-faint">{{ $hiringNote }}</p>
                @endif
            </div>
            @endif
        </div>

        <ul role="list" class="mt-16 grid grid-cols-3 gap-x-4 gap-y-10 border-t border-line pt-16 sm:grid-cols-6 sm:gap-x-6 lg:mt-20 lg:pt-20">
            @foreach ($members as $item)
            <li class="group reveal-{{ min($loop->iteration, 6) }} flex flex-col items-center text-center" data-reveal>
                <img src="{{ $item->image }}" alt="" width="96" height="96" class="size-20 rounded-full bg-raised object-cover outline-1 -outline-offset-1 outline-ink/10 transition-[translate,outline-color] duration-200 group-hover:-translate-y-0.5 group-hover:outline-ink/20 sm:size-24" loading="lazy">
                <p class="mt-4 text-[14px] font-medium text-ink">{{ $item->name }}</p>
                <p class="mt-0.5 text-[13px] text-muted">{{ $item->role }}</p>
            </li>
            @endforeach
        </ul>
    </div>
</section>
