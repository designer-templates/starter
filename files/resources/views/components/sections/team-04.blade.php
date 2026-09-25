@props([
    'eyebrow' => 'Directory',
    'heading' => 'Everyone at Moraine',
    'intro' => 'Eight of us in five cities, and one Slack channel called #receipts. Each name links to what that person is working on this quarter.',
    'summary' => '8 people · 5 cities',
    'members' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/5.webp?size=160', 'name' => 'Jordan Chen', 'role' => 'Head of Engineering', 'location' => 'Denver, CO', 'department' => 'Engineering', 'linkUrl' => '/team/jordan-chen'],
        (object) ['image' => 'https://assets.ui.sh/avatars/10.webp?size=160', 'name' => 'Casey Nakamura', 'role' => 'Backend, card issuing', 'location' => 'Pittsburgh, PA', 'department' => 'Engineering', 'linkUrl' => '/team/casey-nakamura'],
        (object) ['image' => 'https://assets.ui.sh/avatars/13.webp?size=160', 'name' => 'Riley Alvarez', 'role' => 'Mobile', 'location' => 'Columbus, OH', 'department' => 'Engineering', 'linkUrl' => '/team/riley-alvarez'],
        (object) ['image' => 'https://assets.ui.sh/avatars/2.webp?size=160', 'name' => 'Reese Kim', 'role' => 'Head of Design', 'location' => 'Portland, OR', 'department' => 'Design', 'linkUrl' => '/team/reese-kim'],
        (object) ['image' => 'https://assets.ui.sh/avatars/16.webp?size=160', 'name' => 'Parker Okafor', 'role' => 'Product designer', 'location' => 'Denver, CO', 'department' => 'Design', 'linkUrl' => '/team/parker-okafor'],
        (object) ['image' => 'https://assets.ui.sh/avatars/7.webp?size=160', 'name' => 'Sam Hayes', 'role' => 'Sales, construction', 'location' => 'Tucson, AZ', 'department' => 'Go-to-market', 'linkUrl' => '/team/sam-hayes'],
        (object) ['image' => 'https://assets.ui.sh/avatars/11.webp?size=160', 'name' => 'Quinn Brooks', 'role' => 'Customer success', 'location' => 'Pittsburgh, PA', 'department' => 'Go-to-market', 'linkUrl' => '/team/quinn-brooks'],
        (object) ['image' => 'https://assets.ui.sh/avatars/3.webp?size=160', 'name' => 'Emery Patel', 'role' => 'Marketing', 'location' => 'Portland, OR', 'department' => 'Go-to-market', 'linkUrl' => '/team/emery-patel'],
    ],
])
<!-- Team, directory: a left opener with a mono summary on the right, then hairline rows of people (40px portrait, name, role, location in mono, a link arrow), grouped under a mono department label that prints whenever the department changes from the row above. Rows come from the team collection; clear the eyebrow, intro or summary to hide it. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between" data-reveal>
            <div class="max-w-2xl">
                @if ($eyebrow)
                <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
                @endif
                <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
                @if ($intro)
                <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
                @endif
            </div>
            @if ($summary)
            <p class="shrink-0 font-mono text-[12px] text-faint sm:pb-1.5">{{ $summary }}</p>
            @endif
        </div>

        @php $lastDepartment = null; @endphp
        <ul role="list" class="mt-14 sm:mt-16">
            @foreach ($members as $item)
            @if (($item->department ?? '') !== $lastDepartment)
            @php $lastDepartment = $item->department ?? ''; @endphp
            <li class="pt-12 pb-3 first:pt-0" data-reveal>
                <p class="font-mono text-[12px] tracking-wide text-faint uppercase">{{ $item->department }}</p>
            </li>
            @endif
            <li class="reveal-{{ min($loop->iteration, 6) }} border-t border-line last:border-b" data-reveal>
                <a href="{{ $item->linkUrl }}" class="group -mx-3 grid grid-cols-[2.5rem_minmax(0,1fr)_1rem] items-center gap-x-4 rounded-xl px-3 py-4 transition-colors duration-200 hover:bg-raised sm:grid-cols-[2.5rem_minmax(0,0.8fr)_minmax(0,1.2fr)_minmax(0,9rem)_1rem]">
                    <img src="{{ $item->image }}" alt="" width="40" height="40" class="size-10 rounded-full bg-raised object-cover outline-1 -outline-offset-1 outline-ink/10" loading="lazy">
                    <span class="min-w-0">
                        <span class="block truncate text-[15px] font-medium text-ink">{{ $item->name }}</span>
                        <span class="block truncate text-[13px] text-muted sm:hidden">{{ $item->role }}</span>
                    </span>
                    <span class="hidden truncate text-[14px] text-muted sm:block">{{ $item->role }}</span>
                    <span class="hidden truncate font-mono text-[12px] text-faint sm:block sm:text-right">{{ $item->location }}</span>
                    <svg viewBox="0 0 24 24" class="size-4 text-faint transition-[color,translate] duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:text-ink" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7m0 0H8m9 0v9"/></svg>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
