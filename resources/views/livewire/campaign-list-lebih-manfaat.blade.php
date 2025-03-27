<div class="section full mb-3">
    <div class="row">
        <div class="col-8">
            <h3 class="heading ml-2">Lebih Dekat Lebih Manfaat</h3>
        </div>
        <div class="col-4 text-right pr-3">
            <a href="">
                <h6 class="text-primary">Lihat Semua</h6>
            </a>
        </div>
    </div>
    
    {{-- {{ dd($fundraisers); }} --}}

    <div class="lembaga-slider slider">

        @foreach ($fundraisers as $fundraiser)
        <div class="card mb-1">
                <a href="/fundraiser/{{ $fundraiser->id }}">
                    <img src="{{ asset('storage/' . $fundraiser->cover) }}" class="card-img-top" style="height:120px" alt="image">
                    <div class="card-body pt-2">
                        <h6 class="mb-0 text-secondary">{{ $fundraiser->kota_domisili }}</h6>
                        <h5 class="text-primary" style="font-weight:bold">{{ $fundraiser->nama_lembaga }}</h5>
                        <h6 class="mb-0 text-secondary">Total Penghimpunan</h6>
                        <h5>Rp {{ number_format($fundraiser->nomor_rekening, 0, ',', '.') }}</h5>
                        <h6 class="mb-0 text-secondary">Total Penerima Manfaat</h6>
                        <h5 class="mb-0">0 orang</h5>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>

{{-- <div class="section full mb-3">
    <div class="row">
        <div class="col-8">
            <h3 class="heading ml-2">Lebih Dekat Lebih Manfaat</h3>
        </div>
        <div class="col-4 text-right pr-3">
            <a href="program.html">
                <h6 class="text-primary">Lihat Semua</h6>
            </a>
        </div>
    </div>

    <div class="swiper-container lembaga-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card mb-1">
                    <a href="profil-fundriser.html">
                        <img src="assets/img/contents/gambar.png" class="card-img-top" style="height:120px"
                            alt="image">
                        <div class="card-body pt-2">
                            <h6 class="mb-0 text-secondary">Kabupaten Jepara</h6>
                            <h5 class="text-primary" style="font-weight:bold">Pesantren Bintulhuda</h5>
                            <h6 class="mb-0 text-secondary">Total Penghimpunan</h6>
                            <h5>Rp 1.987.908.000</h5>
                            <h6 class="mb-0 text-secondary">Total Penerima Manfaat</h6>
                            <h5 class="mb-0">250 orang</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card mb-1">
                    <a href="profil-fundriser.html">
                        <img src="assets/img/contents/gambar.png" class="card-img-top" style="height:120px"
                            alt="image">
                        <div class="card-body pt-2">
                            <h6 class="mb-0 text-secondary">Kabupaten Jepara</h6>
                            <h5 class="text-primary" style="font-weight:bold">Pesantren Bintulhuda</h5>
                            <h6 class="mb-0 text-secondary">Total Penghimpunan</h6>
                            <h5>Rp 1.987.908.000</h5>
                            <h6 class="mb-0 text-secondary">Total Penerima Manfaat</h6>
                            <h5 class="mb-0">250 orang</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card mb-1">
                    <a href="profil-fundriser.html">
                        <img src="assets/img/contents/gambar.png" class="card-img-top" style="height:120px"
                            alt="image">
                        <div class="card-body pt-2">
                            <h6 class="mb-0 text-secondary">Kabupaten Jepara</h6>
                            <h5 class="text-primary" style="font-weight:bold">Pesantren Bintulhuda</h5>
                            <h6 class="mb-0 text-secondary">Total Penghimpunan</h6>
                            <h5>Rp 1.987.908.000</h5>
                            <h6 class="mb-0 text-secondary">Total Penerima Manfaat</h6>
                            <h5 class="mb-0">250 orang</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lembagaSwiper = new Swiper('.lembaga-slider', {
                slidesPerView: 2, // Pastikan hanya 2 card yang tampil
                slidesPerGroup: 2, // Geser 2 card sekaligus
                spaceBetween: 20, // Jarak antar card
                loop: false, // Tidak looping
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                breakpoints: {
                    320: { // Mobile kecil
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                    },
                    768: { // Tablet
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                    },
                    1024: { // Desktop
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                    }
                }
            });
        });
    </script>
</div> --}}
