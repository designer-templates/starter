@props([
    'eyebrow' => 'Offices',
    'heading' => 'Three offices, one payroll team',
    'intro' => 'Drop by any of them. Every office runs support for every customer, so the nearest one is the right one.',
    'localTimeLabel' => 'Local time',
    'directionsText' => 'Get directions',
    'offices' => [
        (object) ['city' => 'Denver', 'address' => "1550 Wewatta St, Suite 200\nDenver, CO 80202", 'hours' => 'Mon–Fri, 8:00 AM–5:00 PM MT', 'phoneText' => '+1 (303) 555-0117', 'phoneUrl' => 'tel:+13035550117', 'directionsUrl' => '#', 'timezone' => 'America/Denver'],
        (object) ['city' => 'Raleigh', 'address' => "421 Fayetteville St, Floor 11\nRaleigh, NC 27601", 'hours' => 'Mon–Fri, 9:00 AM–6:00 PM ET', 'phoneText' => '+1 (919) 555-0184', 'phoneUrl' => 'tel:+19195550184', 'directionsUrl' => '#', 'timezone' => 'America/New_York'],
        (object) ['city' => 'Austin', 'address' => "600 Congress Ave, Suite 1400\nAustin, TX 78701", 'hours' => 'Mon–Fri, 8:30 AM–5:30 PM CT', 'phoneText' => '+1 (512) 555-0139', 'phoneUrl' => 'tel:+15125550139', 'directionsUrl' => '#', 'timezone' => 'America/Chicago'],
    ],
    'emailNote' => 'Not near an office? Email lands with a payroll specialist within one business day.',
    'emailText' => 'hello@millbrook.app',
    'emailUrl' => 'mailto:hello@millbrook.app',
])
<!-- Offices: a left opener, then one bordered card per office (city with its live local time, address, hours, a tel: link and a directions link) from a repeater, and a general email row under a hairline. The clock reads each row's IANA time zone; clear the eyebrow, intro, note or email to hide it. -->
<section class="px-6 py-16 sm:py-28" data-contact-05>
    <div class="mx-auto w-full max-w-6xl">
        <div data-reveal>
            @if ($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] text-faint uppercase">{{ $eyebrow }}</p>
            @endif
            <h2 class="mt-4 max-w-[30ch] text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($intro)
            <p class="mt-4 max-w-[50ch] text-lg/8 text-pretty text-muted">{{ $intro }}</p>
            @endif
        </div>

        <ul role="list" class="mt-14 grid gap-4 md:grid-cols-3">
            @foreach ($offices as $office)
            <li class="reveal-{{ min($loop->iteration, 6) }} flex flex-col rounded-2xl border border-line bg-panel p-6 transition-[border-color,translate,box-shadow] duration-200 hover:-translate-y-0.5 hover:border-line-strong hover:shadow-[var(--shadow-card)] sm:p-8" data-reveal>
                <div class="flex items-baseline justify-between gap-4">
                    <h3 class="text-xl font-semibold tracking-tight text-ink">{{ $office->city }}</h3>
                    <p class="hidden font-mono text-[12px] whitespace-nowrap text-faint tabular-nums" data-clock-row>{{ $localTimeLabel }} <span data-clock="{{ $office->timezone }}"></span></p>
                </div>
                <p class="mt-4 text-[15px]/6 whitespace-pre-line text-muted">{{ $office->address }}</p>
                <p class="mt-2 text-[15px]/6 text-muted">{{ $office->hours }}</p>
                <div class="mt-auto pt-6 sm:pt-8">
                    <div class="flex flex-col gap-2.5 border-t border-line pt-5">
                        <a href="{{ $office->phoneUrl }}" class="text-[15px] text-ink underline decoration-transparent underline-offset-4 transition-colors duration-200 tabular-nums hover:decoration-line-strong">{{ $office->phoneText }}</a>
                        <a href="{{ $office->directionsUrl }}" class="arrow-link inline-flex items-center gap-1.5 text-[15px] font-medium text-ink">{{ $directionsText }}<svg viewBox="0 0 24 24" class="arrow size-4 opacity-60" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        @if ($emailText)
        <div class="mt-12 flex flex-col gap-3 border-t border-line pt-8 sm:flex-row sm:items-center sm:justify-between sm:gap-8" data-reveal>
            <p class="max-w-[58ch] text-[15px]/6 text-pretty text-muted">{{ $emailNote }}</p>
            <a href="{{ $emailUrl }}" class="shrink-0 text-[15px] font-medium text-ink underline decoration-transparent underline-offset-4 transition-colors duration-200 hover:decoration-line-strong">{{ $emailText }}</a>
        </div>
        @endif
    </div>
</section>
<script>
(function () {
    document.querySelectorAll('[data-contact-05]:not([data-contact-05-ready])').forEach(function (root) {
        root.setAttribute('data-contact-05-ready', '');
        if (!window.Intl || !Intl.DateTimeFormat) return;
        var rows = root.querySelectorAll('[data-clock-row]');
        function tick() {
            var now = new Date();
            rows.forEach(function (row) {
                var clock = row.querySelector('[data-clock]');
                try {
                    clock.textContent = new Intl.DateTimeFormat('en-US', { hour: 'numeric', minute: '2-digit', timeZone: clock.getAttribute('data-clock') }).format(now);
                    row.classList.remove('hidden');
                } catch (e) {
                    row.classList.add('hidden');
                }
            });
        }
        tick();
        setInterval(tick, 30000);
    });
})();
</script>
