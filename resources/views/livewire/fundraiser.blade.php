<div class="container">
    <style>
        .chevron-back, .share-outline {
            filter: invert(1);
        }

        .checkmark-circle {
            background-color: #198754 !important;
            -webkit-mask-image: url("{{ asset('assets/img/checkmark-circle.svg') }}");
            mask-image: url("{{ asset('assets/img/checkmark-circle.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
            margin-bottom: 10px;
        }
    </style>

    {{-- @livewire('header')  --}}
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="chevron Icon" class="chevron-back" height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
                <img src="{{ asset('assets/img/share-outline.svg') }}" alt="Search Icon" class="share-outline" height="24">
            </a>
        </div>
    </div>

    <div id="appCapsule">

        <div class="section full mb-3"> 
            <div class="section full mb-3 position-relative" style="height: 230px; overflow: hidden;">
                <img src="{{ asset('storage/' . $fundraiser->cover) }}" 
                     alt="image" 
                     class="w-100 h-100 object-cover">
            
                <img src="{{ $user->avatar }}" 
                     alt="avatar" 
                     class="imaged rounded-circle position-absolute shadow" 
                     style="width: 86px; height: 86px; bottom: 5px; left: 15px;">
            </div>

            <!-- informasi campaigner -->
            <div class="section inset mb-2">
                <div class="row">
                    <div class="col-4">
                        <span style="font-size:10pt">Lembaga/Organisasi</span>
                    </div>
                    <div class="col-8 text-right">
                        <span style="font-size:10pt; font-weight:bold">{{ $fundraiser->kota_domisili }}</span>
                    </div>
                </div>

                <!-- nama akun personal / non personal max. 21 karakter -->
                <h2 class="title text-primary">{{ $fundraiser->nama_lembaga }}</h2>
                <h6>Akun telah terverifikasi<span class="text-success">
                    {{-- <ion-icon name="checkmark-circle"></ion-icon></span></h6> --}}
                    <img src="{{ asset('assets/img/checkmark-circle.svg') }}" alt="" height="15" class="checkmark-circle">
            </div>

            <!-- capaian crowdfunding semua program -->
            <div class="section wide-block pt-2 pb-3 mb-3">
                <h4 class="text-secondary">Total Penghimpunan</h4>
                <span class="text-primary" style="font-size:15pt; font-weight:bold">Rp xx</span>
                <span style="font-size:10pt">sejak {{ $fundraiser->created_at->translatedFormat('d F Y') }}</span>
                <h5>Total Penerima Manfaat: xx</h5>
            </div>

            <!-- profil lembaga -->
            <div class="section inset mb-3">

                <h3 class="mb-1">Profil Fundriser</h3>
                {{ $fundraiser->profile_lembaga }}
            </div>

            <div class="section pt-3 pb-3 mt-3 mb-3">
                <button type="button" class="btn btn-outline-primary btn-block rounded" data-toggle="modal"
                    data-target="#actionSheetShare">
                    <ion-icon name="share-outline"></ion-icon>
                    Bagikan Profil Fundriser
                </button>
            </div>
        </div>


        <!-- Tabs Program Aktif dan non aktif/selesai -->
        <div class="section full mt-1 mb-3">

            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#donatur" role="tab">
                        <span>Program Aktif</span>
                        <span>&nbsp</span>
                        <span class="badge badge-secondary">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#laporan" role="tab">
                        <span>Program Selesai</span>
                        <span>&nbsp</span>
                        <span class="badge badge-secondary">3</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <!-- Dafar Program Aktif -->
                <div class="tab-pane fade show active" id="donatur" role="tabpanel">

                    <ul class="listview">
                        <li>
                            <a href="profil-program.html">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mt-1 mb-1">
                                            <img src="assets/img/contents/gambar.png" alt="image"
                                                class="imaged w-100" style="height:120px">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mt-1 mb-1">
                                            <h5 class="text-primary mb-1" style="font-weight:bold">#BisaMakan - Donasi
                                                untuk berbagi Makanan</h5>
                                            <h6>Pesantren Bintulhuda</h6>
                                            <div class="progress mt-1 mb-1" style="height:5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="mb-0">Terkumpul</h6>
                                                    <h5 style="font-weight:bold">Rp 1.987.908.000</h5>
                                                </div>
                                                <div class="col-4 margin-top">
                                                    <h6 class="text-right mb-0">Sisa hari</h6>
                                                    <h5 class="text-right" style="font-weight:bold">9</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="profil-program.html">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mt-1 mb-1">
                                            <img src="assets/img/contents/gambar.png" alt="image"
                                                class="imaged w-100" style="height:120px">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mt-1 mb-1">
                                            <h5 class="text-primary mb-1" style="font-weight:bold">#BisaMakan - Donasi
                                                untuk berbagi Makanan</h5>
                                            <h6>Pesantren Bintulhuda</h6>
                                            <div class="progress mt-1 mb-1" style="height:5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="mb-0">Terkumpul</h6>
                                                    <h5 style="font-weight:bold">Rp 1.987.908.000</h5>
                                                </div>
                                                <div class="col-4 margin-top">
                                                    <h6 class="text-right mb-0">Sisa hari</h6>
                                                    <h5 class="text-right" style="font-weight:bold">9</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="profil-program.html">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mt-1 mb-1">
                                            <img src="assets/img/contents/gambar.png" alt="image"
                                                class="imaged w-100" style="height:120px">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mt-1 mb-1">
                                            <h5 class="text-primary mb-1" style="font-weight:bold">#BisaMakan - Donasi
                                                untuk berbagi Makanan</h5>
                                            <h6>Pesantren Bintulhuda</h6>
                                            <div class="progress mt-1 mb-1" style="height:5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="mb-0">Terkumpul</h6>
                                                    <h5 style="font-weight:bold">Rp 1.987.908.000</h5>
                                                </div>
                                                <div class="col-4 margin-top">
                                                    <h6 class="text-right mb-0">Sisa hari</h6>
                                                    <h5 class="text-right" style="font-weight:bold">9</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                        </a>
                    </div>

                </div>
                <!-- * Daftar Program Aktif -->

                <!-- Daftar Program Selesai -->
                <div class="tab-pane fade" id="laporan" role="">

                    <ul class="listview">
                        <li>
                            <a href="profil-program.html">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mt-1 mb-1">
                                            <img src="assets/img/contents/gambar.png" alt="image"
                                                class="imaged w-100" style="height:120px">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mt-1 mb-1">
                                            <h5 class="text-primary mb-1" style="font-weight:bold">#BisaMakan - Donasi
                                                untuk berbagi Makanan</h5>
                                            <h6>Pesantren Bintulhuda</h6>
                                            <div class="progress mt-1 mb-1" style="height:5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="mb-0">Terkumpul</h6>
                                                    <h5 style="font-weight:bold">Rp 1.987.908.000</h5>
                                                </div>
                                                <div class="col-4 margin-top">
                                                    <h6 class="text-right mb-0">Sisa hari</h6>
                                                    <h5 class="text-right" style="font-weight:bold">9</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="profil-program.html">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mt-1 mb-1">
                                            <img src="assets/img/contents/gambar.png" alt="image"
                                                class="imaged w-100" style="height:120px">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mt-1 mb-1">
                                            <h5 class="text-primary mb-1" style="font-weight:bold">#BisaMakan - Donasi
                                                untuk berbagi Makanan</h5>
                                            <h6>Pesantren Bintulhuda</h6>
                                            <div class="progress mt-1 mb-1" style="height:5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h6 class="mb-0">Terkumpul</h6>
                                                    <h5 style="font-weight:bold">Rp 1.987.908.000</h5>
                                                </div>
                                                <div class="col-4 margin-top">
                                                    <h6 class="text-right mb-0">Sisa hari</h6>
                                                    <h5 class="text-right" style="font-weight:bold">9</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                        </a>
                    </div>

                </div>
                <!-- * Daftar Program Selesai -->

            </div>

        </div>

        <!-- Share Action Sheet -->
        <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content container">
                    <div class="modal-header">
                        <h5 class="modal-title">Semangat Berbagi Kebaikan</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="action-button-list">
                            <li>
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
                                    class="btn btn-list" id="" title="" rel="">
                                    <span class="text-primary">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                        Facebook
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Cek fundraiser ini! ') }}{{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
                                    class="btn btn-list" title="Bagikan ke Twitter">
                                    <span class="text-primary">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                        Twitter
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a target="_blank"
                                    href="https://t.me/share/url?url={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}&text={{ urlencode('Cek fundraiser ini!') }}"
                                    class="btn btn-list" title="Bagikan ke Telegram">
                                    <span class="text-primary">
                                        <ion-icon name="paper-plane"></ion-icon>
                                        Telegram
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a target="_blank"
                                    href="https://wa.me/?text={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
                                    class="btn btn-list" id="" title="" rel="">
                                    <span class="text-primary">
                                        <ion-icon name="logo-WhatsApp"></ion-icon>
                                        WhatsApp
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Share Action Sheet -->

    </div>

    @livewire('nav-bar')

    <script src="{{ asset('assets/js/base.js') }}"></script>


</div>
