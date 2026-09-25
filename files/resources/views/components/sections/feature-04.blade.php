@props([
    'eyebrow' => 'Project boards',
    'heading' => 'Every drawing set, in one of three columns',
    'intro' => 'Sumac keeps a studio’s active projects on one board — what is being drafted, what is waiting on a client, and what has been approved — so Monday stand-up takes 9 minutes.',
    'image' => '/images/blocks/dashboard-board.jpg',
    'imageAlt' => 'The Sumac studio board: drafting, with client and approved columns',
    'items' => [
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z'/></svg>", 'title' => 'Columns that mean something', 'description' => 'Drafting, with client, approved. A set moves right only when a person moves it, and the board remembers who.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z'/></svg>", 'title' => 'Client comments land on the card', 'description' => 'Markups from the review link show up on the card with the sheet number, so nothing lives in an email thread.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5'/></svg>", 'title' => 'Due dates that watch the permit office', 'description' => 'Set the county’s review window once; Sumac pushes a due date when the office is closed.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10'/></svg>", 'title' => 'Approval is a signature, not a thumbs-up', 'description' => 'The client signs the set from the review link; the card moves to Approved and the PDF gets the stamp.'],
        (object) ['icon' => "<svg viewBox='0 0 24 24' class='size-5' fill='none' stroke='currentColor' stroke-width='1.5' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'/></svg>", 'title' => 'Hours roll into the invoice', 'description' => 'Time logged against a card flows to billing when the set is approved, at the phase rate you set.'],
    ],
])
<!--
    Sticky visual + list: left, a product screenshot framed as a window on a raised stage that stays put while the
    page scrolls; right, five features with hairline dividers — icon tile, title, body. Items are a repeater in the
    yml; swap the image for your own screenshot (4:3 works best). Clear the eyebrow to hide it.
-->
<section class="px-6 py-16 sm:py-28" data-feature-04>
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl">
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase" data-reveal>{{ $eyebrow }}</p>
            @endif
            <h2 class="reveal-1 mt-4 text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-2 mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        </div>

        <div class="mt-14 grid gap-10 sm:mt-16 lg:grid-cols-[1.2fr_1fr] lg:gap-14">
            <div class="reveal-3 min-w-0 lg:sticky lg:top-24 lg:self-start" data-reveal>
                <div class="rounded-3xl bg-raised p-1 sm:p-2">
                    <div class="overflow-hidden rounded-[20px] border border-line bg-panel shadow-2xl shadow-ink/5">
                        <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1200" class="block h-auto w-full" loading="lazy">
                    </div>
                </div>
            </div>

            <dl class="min-w-0 divide-y divide-line">
                @foreach ($items as $item)
                <div class="reveal-{{ min($loop->iteration, 6) }} group -mx-4 flex items-start gap-4 rounded-xl px-4 py-6 transition-colors duration-200 first:pt-0 hover:bg-raised/60 lg:py-7 lg:first:pt-0" data-reveal>
                    <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-raised text-lede transition-colors duration-200 group-hover:bg-ink group-hover:text-canvas">
                        {!! $item->icon !!}
                    </div>
                    <div class="min-w-0">
                        <dt class="text-base font-medium text-ink">{{ $item->title }}</dt>
                        <dd class="mt-1.5 text-[14px]/6 text-pretty text-muted">{{ $item->description }}</dd>
                    </div>
                </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
