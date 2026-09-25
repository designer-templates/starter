@props([
    'heading' => 'Shift schedules that survive the week',
    'intro' => 'Linden builds the roster from your rules, fills the gaps when someone calls out, and tells the right people — not everyone.',
    'rows' => [
        (object) ['label' => 'Rules', 'title' => 'Write the rules once', 'body' => 'Minimum rest, nights in a row, who can cover the front desk — set them in plain fields and Linden refuses to build a roster that breaks them.', 'points' => "11-hour minimum rest, enforced\nSkills and certifications per role\nState overtime rules built in", 'image' => '/images/blocks/dashboard-settings.jpg', 'imageAlt' => 'The scheduling rules page: rest, nights in a row and auto-fill switches'],
        (object) ['label' => 'Coverage', 'title' => 'Fill a call-out in minutes, not calls', 'body' => 'When someone drops a shift, Linden offers it to the three people who are qualified, rested, and under their hours — in that order.', 'points' => "Offers go out by text and in the app\nFirst qualified yes wins\nManagers see who was asked", 'image' => '/images/blocks/dashboard-notifications.jpg', 'imageAlt' => 'The activity feed: a call-out, the offer to three staff, and the first yes'],
        (object) ['label' => 'The week', 'title' => 'A week you can read at a glance', 'body' => 'Every location on one week view, with gaps in the faint tier and overtime flagged before payroll finds it.', 'points' => "Drag a shift to move it\nPublish to the whole team at once\nExport hours to payroll on Friday", 'image' => '/images/blocks/dashboard-schedule.jpg', 'imageAlt' => 'The week of Sep 14: every shift on one grid, one open shift, one overtime flag'],
    ],
])
<!--
    Feature rows: a left opener (heading, intro), then alternating split rows — copy on one side (small label, title,
    body, a three-line checklist) and a product screenshot on the other, framed as a card on a soft well that runs
    off the outer edge on desktop so the visible slice stays large. Rows are a repeater in the yml, each with its
    own image; the side alternates by row order.
-->
<section class="overflow-x-clip px-6 py-16 sm:py-28" data-feature-02>
    <div class="mx-auto w-full max-w-6xl">
        <div class="max-w-2xl">
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-1 mt-5 max-w-[50ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        </div>

        <div class="mt-16 space-y-20 sm:mt-20 sm:space-y-28">
            @foreach ($rows as $row)
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-20">
                <div class="{{ $loop->odd ? '' : 'lg:order-last' }}" data-reveal>
                    <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $row->label }}</p>
                    <h3 class="mt-3 max-w-[26ch] text-2xl font-semibold tracking-tight text-balance text-ink">{{ $row->title }}</h3>
                    <p class="mt-4 max-w-[52ch] text-[15px]/6 text-pretty text-muted">{{ $row->body }}</p>
                    <ul class="mt-6 space-y-3">
                        @foreach (array_filter(preg_split('/\R/', $row->points)) as $point)
                        <li class="flex items-start gap-2.5 text-[15px]/6 text-lede">
                            <svg viewBox="0 0 16 16" class="h-lh size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd"/></svg>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- The screenshot runs off the outer edge on desktop — right on odd rows, left on even — so the
                     visible slice is large; the stage keeps its rounded corners only on the inner side. -->
                <div class="reveal-1 rounded-3xl bg-raised/70 p-4 sm:p-6 {{ $loop->odd ? 'lg:w-[135%] lg:rounded-r-none lg:pr-0' : 'lg:ml-[-35%] lg:w-[135%] lg:rounded-l-none lg:pl-0' }}" data-reveal>
                    <div class="overflow-hidden rounded-2xl border border-line bg-panel shadow-2xl shadow-ink/5 {{ $loop->odd ? 'lg:rounded-r-none lg:border-r-0' : 'lg:rounded-l-none lg:border-l-0' }}">
                        <img src="{{ $row->image }}" alt="{{ $row->imageAlt }}" width="1600" height="1200" class="block h-auto w-full" loading="lazy">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
