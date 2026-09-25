@props([
    'eyebrow' => 'The team',
    'heading' => 'The people behind Ridgeline',
    'intro' => 'Eight of us across six cities. Most of us have closed out a register at 1:00 AM, which is why the books now close themselves.',
    'members' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/1.webp?size=160', 'name' => 'Avery Nakamura', 'role' => 'Co-founder and CEO', 'bio' => 'Ran the books for a four-location taqueria group in Austin before starting Ridgeline.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/2.webp?size=160', 'name' => 'Jordan Okafor', 'role' => 'Co-founder and CTO', 'bio' => 'Built the ledger engine and still reviews every reconciliation rule by hand.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/3.webp?size=160', 'name' => 'Riley Chen', 'role' => 'Head of Design', 'bio' => 'Designs the month-end close so a manager can finish it between lunch and dinner.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/4.webp?size=160', 'name' => 'Sam Alvarez', 'role' => 'Engineering', 'bio' => 'Owns the bank feeds: 2,300 institutions, one import every Monday at 6:00 AM ET.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/5.webp?size=160', 'name' => 'Morgan Hayes', 'role' => 'Customer success', 'bio' => 'First call for the 412 restaurants on Ridgeline, and answers inside the hour.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/6.webp?size=160', 'name' => 'Quinn Patel', 'role' => 'Engineering', 'bio' => 'Payroll integrations, tip pooling and the reports accountants keep asking for.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/7.webp?size=160', 'name' => 'Reese Brooks', 'role' => 'Sales', 'bio' => 'Talks to owners in Raleigh, Nashville and Atlanta about the line items they dread.'],
        (object) ['image' => 'https://assets.ui.sh/avatars/8.webp?size=160', 'name' => 'Casey Ellis', 'role' => 'Operations', 'bio' => 'Keeps the company running from Boise, including its own books, obviously.'],
    ],
    'showLink' => '1',
    'linkText' => 'See the 4 open roles',
    'linkUrl' => '/careers',
])
<!-- Team, four-up grid: a centered opener, then people in a 2/4-column grid, each a square portrait with a name, role and one bio line, and a text link under the grid. Rows come from the team collection; clear the eyebrow or intro to hide it, and switch the link off with its toggle. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="text-center" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mx-auto mt-4 max-w-xl text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mx-auto mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <ul role="list" class="mt-16 grid grid-cols-2 gap-x-6 gap-y-12 sm:mt-20 lg:grid-cols-4 lg:gap-x-8">
            @foreach ($members as $item)
            <li class="group reveal-{{ min($loop->iteration, 6) }}" data-reveal>
                <img src="{{ $item->image }}" alt="" width="144" height="144" class="size-32 rounded-2xl bg-raised object-cover outline-1 -outline-offset-1 outline-ink/10 transition-[translate,outline-color] duration-200 group-hover:-translate-y-0.5 group-hover:outline-ink/20 sm:size-36 lg:size-40" loading="lazy">
                <p class="mt-5 text-[15px] font-medium text-ink">{{ $item->name }}</p>
                <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                <p class="mt-3 max-w-[30ch] text-[14px]/6 text-pretty text-lede">{{ $item->bio }}</p>
            </li>
            @endforeach
        </ul>

        @if ($showLink)
        <div class="mt-16 flex justify-center" data-reveal>
            <a href="{{ $linkUrl }}" class="arrow-link inline-flex min-h-11 items-center gap-1.5 text-[15px] font-medium text-ink">
                {{ $linkText }}
                <svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>
