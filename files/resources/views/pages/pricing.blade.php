<x-layouts.main title="Pricing" description="One flat price per location. Free for one location with up to ten people; Team and Business add the time clock, payroll export and more locations.">

    <x-sections.hero-minimal />

    <x-sections.pricing heading="Pick a plan" subheading="Start on Free with no card. Move up when the sites and domains outgrow it. Yearly billing gets two months free." :plans="$plans" />

    <x-sections.faq :faqs="$faqs" />

    <x-sections.cta-row />

</x-layouts.main>
