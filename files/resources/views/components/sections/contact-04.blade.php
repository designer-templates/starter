@props([
    'heading' => 'See it on your own schedule',
    'intro' => 'A 25-minute walkthrough of Cobble on a live account — your yard’s SKUs if you send them ahead, ours if not.',
    'action' => '#',
    'fieldEmail' => 'Work email',
    'fieldSize' => 'Company size',
    'sizes' => [
        (object) ['label' => '1–10 people'],
        (object) ['label' => '11–50 people'],
        (object) ['label' => '51–200 people'],
        (object) ['label' => '201+ people'],
    ],
    'buttonText' => 'Book a demo',
    'finePrint' => 'No slides, no pressure. A calendar link arrives by email.',
    'quote' => 'We stopped counting the yard by hand in the first week. The demo was the real product, on our SKUs, and it took 25 minutes.',
    'name' => 'Morgan Okafor',
    'role' => 'Operations lead, Timberline Supply',
    'avatar' => 'https://assets.ui.sh/avatars/7.webp?size=160',
    'logosLabel' => 'Also running on Cobble',
    'logos' => [
        (object) ['name' => 'Pine & Post', 'icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='currentColor' aria-hidden='true'><path d='M12 2 22 12 12 22 2 12Z'/></svg>"],
        (object) ['name' => 'Redlane Yards', 'icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='currentColor' aria-hidden='true'><path fill-rule='evenodd' d='M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z'/></svg>"],
        (object) ['name' => 'Haverly Timber', 'icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='currentColor' aria-hidden='true'><path d='M12 2 20.66 7v10L12 22 3.34 17V7Z'/></svg>"],
    ],
])
<!-- Demo booking: a heading, a line and a short form (work email, company size select, button) on the left; a recessed well on the right with a customer quote, avatar and name, and a row of three wordmarks. Size options and wordmarks are repeater rows; clear the intro, fine print or wordmark label to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto grid w-full max-w-6xl gap-14 lg:grid-cols-2 lg:gap-20">
        <div data-reveal>
            <h2 class="max-w-[22ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif

            <form action="{{ $action }}" method="post" class="mt-10 flex max-w-md flex-col gap-5">
                <label class="block">
                    <span class="block text-[14px] font-medium text-ink">{{ $fieldEmail }}</span>
                    <input type="email" name="email" autocomplete="email" inputmode="email" required class="field mt-2 block h-11 w-full rounded-lg border border-line bg-panel px-3.5 text-base text-ink sm:text-[15px]">
                </label>
                <label class="block">
                    <span class="block text-[14px] font-medium text-ink">{{ $fieldSize }}</span>
                    <span class="mt-2 grid grid-cols-[1fr_2.5rem]">
                        <select name="company_size" class="field col-span-full row-start-1 h-11 w-full appearance-none rounded-lg border border-line bg-panel pr-10 pl-3.5 text-base text-ink sm:text-[15px]">
                            @foreach ($sizes as $size)
                            <option>{{ $size->label }}</option>
                            @endforeach
                        </select>
                        <svg viewBox="0 0 24 24" class="pointer-events-none col-start-2 row-start-1 size-4 place-self-center text-muted" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                    </span>
                </label>
                <div class="mt-1 flex flex-col gap-3">
                    <button type="submit" class="inline-flex w-full cursor-pointer items-center justify-center gap-2 rounded-xl bg-ink px-7 py-3.5 text-[15px] font-medium text-canvas shadow-lg shadow-black/10 transition-all duration-200 hover:-translate-y-0.5 hover:opacity-90 hover:shadow-xl hover:shadow-black/15 active:scale-[.98] sm:w-auto sm:self-start">{{ $buttonText }}</button>
                    @if ($finePrint)
                    <p class="text-[13px] text-faint">{{ $finePrint }}</p>
                    @endif
                </div>
            </form>
        </div>

        <figure class="reveal-2 flex flex-col rounded-3xl bg-raised/70 p-8 sm:p-10" data-reveal>
            <blockquote class="relative text-xl/8 font-medium text-balance text-ink before:absolute before:-translate-x-full before:content-['\201C'] after:content-['\201D']">{{ $quote }}</blockquote>
            <figcaption class="mt-8 flex items-center gap-3">
                <img src="{{ $avatar }}" alt="" width="40" height="40" class="size-10 rounded-full object-cover" loading="lazy">
                <span class="flex flex-col">
                    <span class="text-[14px] font-medium text-ink">{{ $name }}</span>
                    <span class="text-[13px] text-muted">{{ $role }}</span>
                </span>
            </figcaption>
            <div class="mt-auto pt-8 sm:pt-10">
                <div class="border-t border-line pt-6">
                    @if ($logosLabel)
                    <p class="text-[13px] text-faint">{{ $logosLabel }}</p>
                    @endif
                    <ul role="list" class="mt-4 -mb-3 text-balance">
                        @foreach ($logos as $logo)
                        <li class="mr-8 mb-3 inline-flex items-center gap-2 align-middle text-[15px] font-semibold tracking-tight text-faint transition-colors duration-200 hover:text-ink">{!! $logo->icon !!}<span>{{ $logo->name }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </figure>
    </div>
</section>
