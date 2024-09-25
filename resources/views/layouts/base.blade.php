<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <!-- HTML in your document's head -->
{{--    <link rel="preconnect" href="https://rsms.me/">--}}
{{--    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">--}}
    {{--    <link rel="preconnect" href="https://fonts.googleapis.com">--}}
    {{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
    {{--    <link--}}
    {{--        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"--}}
    {{--        rel="stylesheet">--}}

    <style>
        /* CSS */
        @font-face {
            font-family: InterVariable;
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url("{{ Vite::asset('resources/fonts/InterVariable.woff2') }}") format('woff2');
        }

        /*:root {*/
        /*    font-family: Inter, sans-serif;*/
        /*    font-feature-settings: 'liga' 1, 'calt' 1; !* fix for Chrome *!*/
        /*}*/
        @supports (font-variation-settings: normal) {
            :root { font-family: InterVariable, sans-serif; }
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @fluxStyles


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-zinc-100">
@yield('body')
@fluxScripts
@livewireScriptConfig
</body>

</html>
