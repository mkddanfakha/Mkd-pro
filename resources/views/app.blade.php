<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MKD-pro - Digitalisation PME Sénégal</title>
    <meta name="description" content="Digitalisation sur mesure pour les PME du Sénégal. Applications métiers, sites web, automatisation.">
    <meta name="keywords" content="digitalisation PME Sénégal, applications métiers, Laravel Vue.js, automatisation, sites web professionnels">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="MKD-pro - Digitalisation PME Sénégal">
    <meta property="og:description" content="Digitalisation sur mesure pour les PME du Sénégal. Applications métiers, sites web, automatisation.">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="MKD-pro - Digitalisation PME Sénégal">
    <meta property="twitter:description" content="Digitalisation sur mesure pour les PME du Sénégal. Applications métiers, sites web, automatisation.">
    <meta property="twitter:image" content="{{ asset('logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app"></div>
</body>
</html>

