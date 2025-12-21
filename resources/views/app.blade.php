<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SVEKDLLZS2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-SVEKDLLZS2');
    </script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>MKD-pro - Digitalisation sur mesure pour les PME du Sénégal</title>
    <meta name="description" content="Développeur web spécialisé en digitalisation des PME au Sénégal. Applications métiers (Laravel + Vue.js), sites web professionnels, automatisation et accompagnement digital. Solutions simples, efficaces et adaptées au marché sénégalais.">
    <meta name="keywords" content="digitalisation PME Sénégal, applications métiers, Laravel Vue.js, automatisation, sites web professionnels, développement web Sénégal, gestion de stock, CRM PME, e-commerce Sénégal">
    <meta name="author" content="MKD-pro">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="French">
    <meta name="geo.region" content="SN">
    <meta name="geo.placename" content="Sénégal">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="MKD-pro - Digitalisation sur mesure pour les PME du Sénégal">
    <meta property="og:description" content="Développeur web spécialisé en digitalisation des PME au Sénégal. Applications métiers, sites web, automatisation. Solutions simples et efficaces.">
    <meta property="og:image" content="{{ url(asset('logo.png')) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="MKD-pro">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="MKD-pro - Digitalisation sur mesure pour les PME du Sénégal">
    <meta name="twitter:description" content="Développeur web spécialisé en digitalisation des PME au Sénégal. Applications métiers, sites web, automatisation.">
    <meta name="twitter:image" content="{{ url(asset('logo.png')) }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'MKD-pro',
        'description' => 'Développeur web spécialisé en digitalisation des PME au Sénégal',
        'url' => url('/'),
        'logo' => url(asset('logo.png')),
        'image' => url(asset('logo.png')),
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'SN',
            'addressLocality' => 'Sénégal',
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+33-6-65-41-10-64',
            'contactType' => 'Customer Service',
            'availableLanguage' => ['French'],
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Sénégal',
        ],
        'serviceType' => [
            'Développement d\'applications métiers',
            'Création de sites web',
            'Automatisation',
            'Accompagnement digital',
        ],
        'sameAs' => [
            'https://wa.me/221789267787',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app"></div>
</body>
</html>

