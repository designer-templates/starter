@props([
    'eyebrow' => 'Our story',
    'heading' => 'Built on a job site in Tucson',
    'linkText' => 'Meet the team',
    'linkUrl' => '/team',
    'paragraph1' => 'I ran a six-person remodeling crew in Tucson for nine years. The punch list lived on a legal pad in the truck, and every Friday I spent two hours turning it into an email the homeowner could read. About half the time a photo went missing and the whole conversation started over.',
    'paragraph2' => 'Quinn was writing software for a hospital in Portland and had never set foot on a job site. In 2021 she flew down for a week, walked three houses with me, and came back with a prototype that let a crew lead mark a room done from the driveway. We had 40 crews on it by that fall.',
    'paragraph3' => 'Trowel now tracks 1,860 active job sites for remodelers in 31 states. The office is still next to a lumber yard, and every new hire spends their first week on a crew.',
    'facts' => [
        (object) ['label' => 'Founded', 'value' => '2021'],
        (object) ['label' => 'People', 'value' => '23'],
        (object) ['label' => 'Home', 'value' => 'Tucson, AZ'],
    ],
])
<!--
    About, story columns: eyebrow, heading and a text link on the left third; three paragraphs flowing
    through two columns on the right at desktop; under both, a hairline and a row of small facts.
    Facts are a repeater (label, value). Clear the eyebrow, the link text or a paragraph to hide it.
-->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid gap-y-10 lg:grid-cols-12 lg:gap-x-12">
            <div class="lg:col-span-4" data-reveal>
                @if ($eyebrow)
                <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="max-w-[20ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($linkText)
                <a href="{{ $linkUrl }}" class="arrow-link mt-6 inline-flex items-center gap-1.5 text-[15px] font-medium text-ink transition-colors duration-200 hover:text-muted">
                    {{ $linkText }}
                    <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                @endif
            </div>

            <div class="reveal-1 space-y-6 text-[16px]/7 text-pretty text-lede lg:col-span-8 lg:col-start-5 lg:columns-2 lg:gap-x-12" data-reveal>
                <p>{{ $paragraph1 }}</p>
                @if ($paragraph2)
                <p>{{ $paragraph2 }}</p>
                @endif
                @if ($paragraph3)
                <p>{{ $paragraph3 }}</p>
                @endif
            </div>
        </div>

        <dl class="reveal-2 mt-16 grid grid-cols-3 gap-x-6 border-t border-line pt-8 sm:mt-20" data-reveal>
            @foreach ($facts as $fact)
            <div>
                <dt class="text-[13px] text-faint">{{ $fact->label }}</dt>
                <dd class="mt-1 text-base font-medium text-ink tabular-nums">{{ $fact->value }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>
