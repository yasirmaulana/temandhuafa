<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="csrf-token" content="QjKqYhanGtcKrSkqC6zwqNTCPVs26Sns6axjFjaK"> --}}
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#ff8d2f">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="temandhuafa.id">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/gaya.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bebas.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">

    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

<body>
    @livewireScripts

    {{ $slot }}

    <script src="https://tarahum.id/member/assets/js/vendors/bootstrap/bootstrap.bundle.min.js"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    {{-- <script src="https://tarahum.id/member/assets/js/custom_swiper.js?version=1.1" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">
    </script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">
    </script> --}}
    {{-- <script src="https://tarahum.id/member/assets/js/script.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/member/assets/js/hide-show.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/member/assets/js/otp-5.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/sw.js"></script>
    <script src="https://tarahum.id/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script> --}}


</body>

</html>
