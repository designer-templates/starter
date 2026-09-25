@props([
    'eyebrow' => 'Who we are',
    'heading' => 'Nine people who hate no-shows',
    'intro' => 'Oriole sends 1.2 million appointment reminders a month for 640 dental offices. These are the people who pick up when one of them calls.',
    'members' => [
        (object) ['image' => 'https://assets.ui.sh/avatars/14.webp?size=160', 'name' => 'Morgan Rivera', 'role' => 'Co-founder and CEO', 'bio' => 'Ran the front desk at a three-chair practice for six years before Oriole.', 'email' => 'morgan@oriole.team', 'linkUrl' => '/team/morgan-rivera'],
        (object) ['image' => 'https://assets.ui.sh/avatars/6.webp?size=160', 'name' => 'Drew Ellis', 'role' => 'Co-founder and CTO', 'bio' => 'Wrote the first scheduler in a weekend; it now sends 40,000 texts an hour.', 'email' => 'drew@oriole.team', 'linkUrl' => '/team/drew-ellis'],
        (object) ['image' => 'https://assets.ui.sh/avatars/9.webp?size=160', 'name' => 'Skyler Chen', 'role' => 'Head of Design', 'bio' => 'Designs the confirmation flow patients finish in under nine seconds.', 'email' => 'skyler@oriole.team', 'linkUrl' => '/team/skyler-chen'],
        (object) ['image' => 'https://assets.ui.sh/avatars/2.webp?size=160', 'name' => 'Avery Brooks', 'role' => 'Engineering', 'bio' => 'Owns the practice-management integrations, all 11 of them.', 'email' => 'avery@oriole.team', 'linkUrl' => '/team/avery-brooks'],
        (object) ['image' => 'https://assets.ui.sh/avatars/12.webp?size=160', 'name' => 'Rowan Patel', 'role' => 'Engineering', 'bio' => 'Deliverability: the reason reminders land in inboxes and not in spam.', 'email' => 'rowan@oriole.team', 'linkUrl' => '/team/rowan-patel'],
        (object) ['image' => 'https://assets.ui.sh/avatars/4.webp?size=160', 'name' => 'Taylor Okafor', 'role' => 'Customer success', 'bio' => 'Onboards every new office personally, usually in under a day.', 'email' => 'taylor@oriole.team', 'linkUrl' => '/team/taylor-okafor'],
        (object) ['image' => 'https://assets.ui.sh/avatars/16.webp?size=160', 'name' => 'Kai Hayes', 'role' => 'Sales', 'bio' => 'Talks to office managers from Raleigh to Boise about their no-show rate.', 'email' => 'kai@oriole.team', 'linkUrl' => '/team/kai-hayes'],
        (object) ['image' => 'https://assets.ui.sh/avatars/8.webp?size=160', 'name' => 'Jamie Alvarez', 'role' => 'Operations', 'bio' => 'Runs billing, compliance and the Columbus office.', 'email' => 'jamie@oriole.team', 'linkUrl' => '/team/jamie-alvarez'],
    ],
    'emailLabel' => 'Email',
    'profileLabel' => 'Profile',
    'showJoin' => '1',
    'joinHeading' => 'Join us',
    'joinText' => 'Two open roles in Columbus and one remote. We reply to every application within a week.',
    'joinCtaText' => 'See open roles',
    'joinCtaLink' => '/careers',
])
<!-- Team, bordered cards: a left opener, then three-up cards each with a round portrait, name, role, a one-line bio and two small text links (email, profile) in a hairline footer; the last cell is a raised "join us" card with a button. Rows come from the team collection; clear the eyebrow or intro to hide it, and switch the join card off with its toggle. -->
<section class="px-6 py-16 sm:py-28">
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl" data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-6 sm:mt-16 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($members as $item)
            <article class="reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)]" data-reveal>
                <div class="flex items-center gap-4">
                    <img src="{{ $item->image }}" alt="" width="56" height="56" class="size-14 shrink-0 rounded-full bg-raised object-cover outline-1 -outline-offset-1 outline-ink/10" loading="lazy">
                    <div class="min-w-0">
                        <p class="text-[15px] font-medium text-ink">{{ $item->name }}</p>
                        <p class="mt-0.5 text-[14px] text-muted">{{ $item->role }}</p>
                    </div>
                </div>
                <p class="mt-5 mb-6 text-[14px]/6 text-pretty text-lede">{{ $item->bio }}</p>
                <div class="mt-auto flex gap-5 border-t border-line pt-4 text-[13px] font-medium">
                    <a href="mailto:{{ $item->email }}" class="inline-flex min-h-11 items-center text-muted transition-colors duration-200 hover:text-ink sm:min-h-0">{{ $emailLabel }}</a>
                    <a href="{{ $item->linkUrl }}" class="inline-flex min-h-11 items-center text-muted transition-colors duration-200 hover:text-ink sm:min-h-0">{{ $profileLabel }}</a>
                </div>
            </article>
            @endforeach

            @if ($showJoin)
            <div class="flex flex-col rounded-2xl bg-raised/70 p-6" data-reveal>
                <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $joinHeading }}</h3>
                <p class="mt-3 text-[15px]/6 text-pretty text-muted">{{ $joinText }}</p>
                <div class="mt-auto pt-6">
                    <a href="{{ $joinCtaLink }}" class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-line bg-panel px-4 py-2.5 text-[15px] font-medium text-lede transition-colors duration-200 hover:border-line-strong hover:bg-raised active:scale-[.98] sm:w-auto">{{ $joinCtaText }}</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
