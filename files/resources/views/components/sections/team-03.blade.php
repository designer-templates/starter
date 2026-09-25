@props([
    'heading' => 'Built by people who have counted the shelf',
    'intro' => 'Lumen started in a two-register pharmacy in Tucson. The seven of us still spend one Friday a month behind a counter.',
    'founderImage' => '/images/blocks/portrait-01.jpg',
    'founderName' => 'Jamie Nakamura',
    'founderRole' => 'Co-founder and CEO',
    'quote' => 'We wrote the first version on a pharmacy laptop between refills. Three years and 1,900 stores later, it still runs on one.',
    'members' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/4.webp?size=160', 'name' => 'Alex Patel', 'role' => 'Co-founder and CTO'],
        (object) ['image' => 'https://assets.ui.sh/avatars/8.webp?size=160', 'name' => 'Sage Rivera', 'role' => 'Head of Product'],
        (object) ['image' => 'https://assets.ui.sh/avatars/12.webp?size=160', 'name' => 'Robin Hayes', 'role' => 'Engineering'],
        (object) ['image' => 'https://assets.ui.sh/avatars/1.webp?size=160', 'name' => 'Kai Brooks', 'role' => 'Engineering'],
        (object) ['image' => 'https://assets.ui.sh/avatars/15.webp?size=160', 'name' => 'Morgan Ellis', 'role' => 'Pharmacist in residence'],
        (object) ['image' => 'https://assets.ui.sh/avatars/6.webp?size=160', 'name' => 'Avery Okafor', 'role' => 'Customer success'],
    ],
])
<!-- Team, founder and team: a heading and intro, a tall founder portrait with a quote and name (left on desktop, between the opener and the grid on a phone), and a three-by-two grid of small portraits with name and role. Rows come from the team collection; clear the intro or quote to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-12 lg:grid-cols-12 lg:grid-rows-[auto_1fr] lg:gap-x-16 lg:gap-y-14">
            <div class="max-w-2xl lg:order-2 lg:col-span-7" data-reveal>
                <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($intro)
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
                @endif
            </div>

            <figure class="lg:order-1 lg:col-span-5 lg:row-span-2" data-reveal>
                <div class="aspect-[4/5] overflow-hidden rounded-3xl bg-raised">
                    <img src="{{ $founderImage }}" alt="" width="960" height="1200" class="size-full object-cover object-top outline-1 -outline-offset-1 outline-ink/10 rounded-3xl" loading="lazy">
                </div>
                @if ($quote)
                <blockquote class="mt-8 max-w-[38ch] text-xl/8 font-medium tracking-tight text-pretty text-ink">{{ $quote }}</blockquote>
                @endif
                <figcaption class="mt-5">
                    <p class="text-[15px] font-medium text-ink">{{ $founderName }}</p>
                    <p class="mt-0.5 text-[14px] text-muted">{{ $founderRole }}</p>
                </figcaption>
            </figure>

            <ul role="list" class="grid grid-cols-2 gap-x-6 gap-y-10 self-start sm:grid-cols-3 lg:order-3 lg:col-span-7">
                @foreach ($members as $item)
                <li class="group reveal-{{ min($loop->iteration, 6) }}" data-reveal>
                    <img src="{{ $item->image }}" alt="" width="96" height="96" class="size-24 rounded-2xl bg-raised object-cover outline-1 -outline-offset-1 outline-ink/10 transition-[translate,outline-color] duration-200 group-hover:-translate-y-0.5 group-hover:outline-ink/20" loading="lazy">
                    <p class="mt-4 text-[15px] font-medium text-ink">{{ $item->name }}</p>
                    <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
