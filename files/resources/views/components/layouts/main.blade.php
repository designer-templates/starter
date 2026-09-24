@props(['title' => 'Home', 'description' => ''])
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · Starter</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- One text family and a mono, only the weights in use. Swap the pairing in site.css and here together. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Loads Tailwind and inlines resources/css/site.css — the palette and the motion system -->
    @vite(['resources/css/site.css'])

    <!-- Flag JS support before first paint so scroll reveals never flash (see main.js) -->
    <script>document.documentElement.classList.add('js')</script>
    <script src="/js/main.js" defer></script>
</head>
<body class="min-h-dvh bg-canvas font-sans text-ink antialiased">

    <!-- The announcement bar and the site-wide nav. Links live in resources/data/site.json (nav_links); the markup is components/nav.blade.php. -->
    <x-nav :links="$site->nav_links"/>

    <!-- The header sits in the flow above this; each page's opening section carries its own top padding. -->
    <main class="relative divide-y divide-gray-100">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_links" :social="$site->social_links"/>

</body>
</html>
