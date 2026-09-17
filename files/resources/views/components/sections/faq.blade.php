@props([
    'heading' => 'Questions, answered',
    'subheading' => 'Quick answers about plans, billing, and getting the team on board.',
    'faqs' => [],
])
<!-- Centered heading over a bordered accordion of native <details>, so the questions open without JavaScript. Rows live in resources/data/collections/faqs.json. -->
<section id="faq" class="scroll-mt-20 px-6 py-20 sm:py-28">
    <div class="mx-auto w-full max-w-3xl">
        <div class="text-center" data-reveal>
            <h2 class="text-h2 font-semibold tracking-tight text-balance text-ink">{{ $heading }}</h2>
            @if ($subheading)
            <p class="mx-auto mt-5 max-w-[50ch] text-[17px]/7 text-pretty text-lede">{{ $subheading }}</p>
            @endif
        </div>

        <div class="reveal-1 mt-12 divide-y divide-line rounded-2xl border border-line bg-panel px-6" data-reveal>
            @foreach ($faqs as $item)
            <details class="faq-item group">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[16px] font-medium text-ink transition-colors duration-200 hover:text-accent">
                    {{ $item->question }}
                    <svg viewBox="0 0 16 16" class="faq-plus size-4 shrink-0 fill-current text-muted" aria-hidden="true"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z"/></svg>
                </summary>
                <p class="max-w-[62ch] pb-6 text-[15px]/7 text-pretty text-muted">{{ $item->answer }}</p>
            </details>
            @endforeach
        </div>
    </div>
</section>
