<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('icon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description"
    content="Sistem Fest - Hackaton 2024 UDH">
    <meta name="keywords"
        content="UDH, Hackathon 2024, Hackathon, Hackaton, Hackaton 2024, Hackaton 2024 UDH">
    <meta name="author" content="Laboratorio de Transformacion Digital">
    <meta name="theme-color" content="#2EBAA0">

    <!-- Open Graph -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Hackaton UDH') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description"
        content="Sistem Fest - Hackaton 2024 UDH">
    <meta property="og:image" content="{{ asset('/img/og_image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="website">

    <style>
        html {
            scroll-behavior: smooth;
        }

        #bases {
            scroll-margin-top: 200px;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
