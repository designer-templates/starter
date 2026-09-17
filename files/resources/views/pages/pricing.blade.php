<x-layouts.main title="Pricing" description="One flat price per location. Free for one location with up to ten people; Team and Business add the time clock, payroll export and more locations.">

    <x-sections.hero-minimal />

    <x-sections.pricing eyebrow="" heading="Pick a plan" subheading="Every account starts with a 30-day trial of Team. No card needed, and the Free plan stays free." :plans="$plans" />

    <x-sections.faq :faqs="$faqs" />

    <x-sections.cta-row />

</x-layouts.main>
