    <div class="full">
        <div class="carousel-full owl-carousel owl-theme">
            @foreach ($sliderCarousel as $slider)
                <a href="">
                    <div class="item">
                        <img src="{{ $slider->image }}" alt="alt" class="imaged w-100 square">
                    </div>
                </a>
            @endforeach

        </div>
    </div>

    {{-- <div class="full">
    <div class="swiper carousel-full">
        <div class="swiper-wrapper">
            @foreach ($sliderCarousel as $slider)
                <div class="swiper-slide">
                    <a href="{{ $slider->link }}">
                        <img src="{{ $slider->image ?? asset('assets/img/contents/gambar.png') }}" alt="alt"
                            class="imaged w-100 square">
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Navigasi -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var carouselSwiper = new Swiper(".carousel-full", {
                // loop: true, // Looping slide
                slidesPerView: 4, // Atur jumlah card yang terlihat (sesuai kebutuhan)
                spaceBetween: 10, // Jarak antar item
                autoplay: {
                    delay: 3000, // Auto-slide setiap 3 detik
                    disableOnInteraction: false // Tetap autoplay setelah user interaksi
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1024: {
                        slidesPerView: 4
                    },
                }
            });
        })
    </script>
</div> --}}
