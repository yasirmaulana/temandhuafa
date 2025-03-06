<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Kanal donasi dan ZISWAF online">
    <meta name="keywords" content="donasi, zakat, infak, sedekah, wakaf, donasi online, donasi mudah" />
    <title>Temandhuafa</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/css/style-fe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick/slick-slider.css') }}">
    {{-- <link rel="manifest" href="__manifest.json"> --}}
    @livewireStyles
</head>

<body> 
    @livewireScripts
   
    {{ $slot }}

</body>

</html>
