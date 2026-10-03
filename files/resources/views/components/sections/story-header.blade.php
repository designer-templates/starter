@props([
    'backText' => 'All customers',
    'backUrl' => '/customers',
    'company' => 'Bellwood & Vane',
    'location' => 'Raleigh, NC',
    'industry' => 'Web studio',
    'size' => '9 people',
    'title' => 'Fourteen client sites, and nobody files a copy ticket',
    'excerpt' => 'A nine-person studio moved every client site onto Starter in one quarter. Clients edit their own pages now; the studio spends its hours on new work.',
    'image' => '/images/story-studio.jpg',
    'imageAlt' => 'Two designers at Bellwood & Vane reviewing printed page layouts pinned to a studio wall',
    'figureOneValue' => '14',
    'figureOneLabel' => 'client sites moved in one quarter',
    'figureTwoValue' => '91%',
    'figureTwoLabel' => 'fewer copy-change tickets',
    'figureThreeValue' => '3 days',
    'figureThreeLabel' => 'from kickoff to a launched site',
    'locationLabel' => 'Location',
    'industryLabel' => 'Industry',
    'sizeLabel' => 'Team',
])
<!--
    The top of a customer story: a link back to the index, the company's name and facts, the headline as the
    page's h1, a standfirst, the photograph, and three figures on a hairline row under it. On
    /customers/{slug} every value comes from that story's row in resources/data/collections/stories.json.
-->
<section class="pt-12 pb-12 sm:pt-16 sm:pb-16">
    <div class="mx-auto w-full max-w-6xl px-6 lg:px-8">
        <a href="{{ $backUrl }}" class="group inline-flex items-center gap-1.5 text-[14px] font-medium text-muted-foreground transition-colors duration-200 hover:text-foreground" data-reveal>
            <svg viewBox="0 0 24 24" class="size-4 transition-transform duration-200 group-hover:-translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            {{ $backText }}
        </a>
        <div class="mt-8 grid gap-6 lg:grid-cols-12 lg:items-end lg:gap-12">
            <div class="lg:col-span-8">
                <p class="reveal-1 text-[15px] font-medium text-foreground" data-reveal>{{ $company }}</p>
                <h1 class="reveal-2 mt-4 text-[2.5rem]/[1.08] font-semibold tracking-[-0.035em] text-balance text-foreground sm:text-[3.25rem]/[1.05]" data-reveal>{{ $title }}</h1>
                <p class="reveal-3 mt-6 max-w-[58ch] text-lg/8 text-pretty text-muted-foreground" data-reveal>{{ $excerpt }}</p>
            </div>
            <dl class="reveal-4 grid grid-cols-3 gap-4 text-[14px] lg:col-span-4 lg:grid-cols-1 lg:gap-3 lg:border-l lg:border-border lg:pl-8" data-reveal>
                <div>
                    <dt class="text-muted-foreground">{{ $locationLabel }}</dt>
                    <dd class="mt-0.5 font-medium text-foreground">{{ $location }}</dd>
                </div>
                <div>
                    <dt class="text-muted-foreground">{{ $industryLabel }}</dt>
                    <dd class="mt-0.5 font-medium text-foreground">{{ $industry }}</dd>
                </div>
                <div>
                    <dt class="text-muted-foreground">{{ $sizeLabel }}</dt>
                    <dd class="mt-0.5 font-medium text-foreground">{{ $size }}</dd>
                </div>
            </dl>
        </div>
        <div class="reveal-5 mt-12 overflow-hidden rounded-3xl outline-1 -outline-offset-1 outline-foreground/10 sm:mt-14" data-reveal>
            <img src="{{ $image }}" alt="{{ $imageAlt }}" width="1600" height="1067" fetchpriority="high" class="aspect-[3/2] w-full object-cover sm:aspect-[2/1]">
        </div>
        <div class="mt-10 grid divide-y divide-border border-y border-border sm:grid-cols-3 sm:divide-x sm:divide-y-0" data-reveal>
            <div class="py-6 sm:pr-8">
                <p class="text-figure font-semibold tracking-tight text-foreground tabular-nums">{{ $figureOneValue }}</p>
                <p class="mt-2 text-[14px] text-muted-foreground">{{ $figureOneLabel }}</p>
            </div>
            <div class="py-6 sm:px-8">
                <p class="text-figure font-semibold tracking-tight text-foreground tabular-nums">{{ $figureTwoValue }}</p>
                <p class="mt-2 text-[14px] text-muted-foreground">{{ $figureTwoLabel }}</p>
            </div>
            <div class="py-6 sm:pl-8">
                <p class="text-figure font-semibold tracking-tight text-foreground tabular-nums">{{ $figureThreeValue }}</p>
                <p class="mt-2 text-[14px] text-muted-foreground">{{ $figureThreeLabel }}</p>
            </div>
        </div>
    </div>
</section>
