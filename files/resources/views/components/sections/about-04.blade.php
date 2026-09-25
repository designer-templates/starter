@props([
    'eyebrow' => 'What we believe',
    'heading' => 'Run by people who still throw on Sundays',
    'paragraph' => 'I opened a 14-wheel studio in Pittsburgh in 2017 and spent more evenings on the membership spreadsheet than at the wheel. Avery had just left a job in Austin building booking software. Glaze is the tool we wished we had: firings scheduled, shelves tracked, members billed, and 640 studios on it today.',
    'image1' => '/images/blocks/workspace-01.jpg',
    'image1Alt' => 'The Glaze team at their desks in the Pittsburgh studio',
    'image2' => '/images/blocks/workspace-03.jpg',
    'image2Alt' => 'A quiet corner of the Pittsburgh studio with plants on the sill',
    'values' => [
        (object) ['title' => 'Ship the small thing', 'description' => 'A fix for one studio’s Tuesday problem beats a feature for a studio that does not exist yet.'],
        (object) ['title' => 'Price like a member', 'description' => 'One flat rate per studio, and it has moved once in seven years.'],
        (object) ['title' => 'Answer the phone', 'description' => 'Every support call goes to someone who has loaded a kiln. The median reply is 11 minutes.'],
        (object) ['title' => 'Stay small on purpose', 'description' => 'We are 19 people across Pittsburgh and Austin, and we plan to stay under 30.'],
    ],
])
<!--
    About, staggered photos and values: two portrait-cropped photographs side by side on the left, the
    second dropped lower than the first; on the right an eyebrow, heading, one paragraph and a numbered
    list of values divided by hairlines. On phones the copy comes first. Values are a repeater
    (title, description). Clear the eyebrow or the paragraph to hide it.
-->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid items-start gap-y-14 lg:grid-cols-12 lg:items-center lg:gap-x-16">
            <div class="lg:col-span-6">
                <div data-reveal>
                    @if ($eyebrow)
                    <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                    @endif
                    <h2 class="max-w-[22ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                    @if ($paragraph)
                    <p class="mt-5 max-w-[50ch] text-[16px]/7 text-pretty text-muted">{{ $paragraph }}</p>
                    @endif
                </div>

                <ol class="mt-10 divide-y divide-line border-y border-line">
                    @foreach ($values as $value)
                    <li class="reveal-{{ min($loop->iteration, 6) }} grid grid-cols-[2.5rem_1fr] py-5" data-reveal>
                        <span class="pt-1 font-mono text-[12px] text-faint tabular-nums" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div>
                            <h3 class="text-base font-medium text-ink">{{ $value->title }}</h3>
                            <p class="mt-1 max-w-[52ch] text-[15px]/6 text-pretty text-muted">{{ $value->description }}</p>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:order-first lg:col-span-6">
                <img src="{{ $image1 }}" alt="{{ $image1Alt }}" width="1200" height="800" loading="lazy" decoding="async" class="reveal-2 aspect-[3/4] w-full rounded-2xl object-cover outline-1 -outline-offset-1 outline-ink/10" data-reveal>
                <img src="{{ $image2 }}" alt="{{ $image2Alt }}" width="1200" height="800" loading="lazy" decoding="async" class="reveal-3 mt-12 aspect-[3/4] w-full rounded-2xl object-cover outline-1 -outline-offset-1 outline-ink/10 sm:mt-20" data-reveal>
            </div>
        </div>
    </div>
</section>
