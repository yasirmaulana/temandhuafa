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

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('assets/js/base.js') }}"></script>
    <script src="https://kit.fontawesome.com/4cbe939c80.js" crossorigin="anonymous"></script>
  	<!-- Slick Slider Slide -->
    <script src="{{ asset('assets/js/plugins/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick/slick-slider.js') }}"></script>
  	<!-- Load More -->
    <script src="{{ asset('assets/js/plugins/loadMore.js') }}"></script>
    <!-- Timeout -->
    {{-- <script>
          setTimeout(() => {
              notification('notification-welcome', 5000);
          }, 2000);
    </script> --}}

</body>

</html>
