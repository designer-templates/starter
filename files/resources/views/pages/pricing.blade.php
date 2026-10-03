<x-layouts.main title="Pricing" description="Free for one site with every section. Pro adds custom domains, ten sites and version history; Team adds roles, approvals, SSO and same-day support.">

    <x-sections.pricing headingLevel="1" heading="Simple plans that grow with your sites" eyebrow="" subheading="Start on Free with no card, and move up when you add a second site or a custom domain." :plans="$plans" />

    <x-sections.pricing-04 eyebrow="Compare plans" heading="Every plan, row by row" intro="The eight differences most teams ask about. Open the full list for billing, security and the rest." :plans="$plans" :rows="$compareRows" :moreRows="$compareMore" />

    <x-sections.faq :faqs="$faqs" />

    <x-sections.cta-row />

</x-layouts.main>
