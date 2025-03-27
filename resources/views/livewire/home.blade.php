<main class="container">

    @livewire('header')

    <div id="appCapsule">
        @livewire('carousel')

        <br />
        <h3 class="heading text-danger mb-1 ml-2">Mau beramal apa hari ini?</h3>
        <br />

        <div class="section full">
            @livewire('category')
            @livewire('campaign-list-sangat-dibutuhkan')
            @livewire('campaign-list-lebih-manfaat')
            @livewire('campaign-list')
        </div>

    </div>

    @livewire('nav-bar')

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box container">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="assets/img/favicon.png" alt="image" class="imaged w24">
                    <strong>Temandhuafa</strong>
                    <span>Install sekarang!</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Selamat Datang di Temandhuafa</h3>
                    <div class="text">
                        TemanDhuafa merupakan aplikasi berbagi, donasi dan ziswaf. Silahkan install di handphone untuk
                        kemudahan akses dan update informasi.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->

    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script> 
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/base.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick/slick-slider.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/plugins/loadMore.js') }}"></script> --}}
    {{-- <script src="https://kit.fontawesome.com/4cbe939c80.js" crossorigin="anonymous"></script> --}}

  	<!-- Load More -->
    <!-- Timeout -->
    {{-- <script>
          setTimeout(() => {
              notification('notification-welcome', 5000);
          }, 2000);
    </script> --}}


</main>
