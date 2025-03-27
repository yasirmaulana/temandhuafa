<div class="container">
    <style>
        .chevron-back, .share-outline {
            filter: invert(1);
        }
    </style>

    {{-- @livewire('header')  --}}
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="Search Icon" class="chevron-back" height="24">
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
            <img src="assets/img/contents/gambar.png" alt="image" class="imaged square w-100">
            <img src="assets/img/contents/avatar.jpg" alt="avatar" class="imaged  rounded w86"
                style="margin-top: -130px; margin-left:15px">


            <!-- informasi campaigner -->
            <div class="section inset mb-2">
                <div class="row">
                    <div class="col-4">
                        <span style="font-size:10pt">Lembaga/Organisasi</span>
                    </div>
                    <div class="col-8 text-right">
                        <span style="font-size:10pt; font-weight:bold"">Kabupaten Jepara</span>
                    </div>
                </div>

                <!-- nama akun personal / non personal max. 21 karakter -->
                <h2 class="title text-primary">Pesantren Bintulhuda</h2>
                <h6>Akun telah terverifikasi<span class="text-success"><ion-icon
                            name="checkmark-circle"></ion-icon></span></h6>
            </div>

            <!-- capaian crowdfunding semua program -->
            <div class="section wide-block pt-2 pb-3 mb-3">
                <h4 class="text-secondary">Total Penghimpunan</h4>
                <span class="text-primary" style="font-size:15pt; font-weight:bold">Rp 1.987.908.000</span>
                <span style="font-size:10pt">sejak 12 Januari 2020</span>
                <h5>Total Penerima Manfaat: 250 orang dari 50 program</h5>
            </div>


            <!-- profil lembaga -->
            <div class="section inset mb-3">

                <h3 class="mb-1">Profil Fundriser</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>

                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
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
        {{-- <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content container">
                    <div class="modal-header">
                        <h5 class="modal-title">Semangat Berbagi Kebaikan</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="action-button-list">
                            <li>
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url('/campaign/' . $campaign?->slug ?? '') }}"
                                    class="btn btn-list" id="" title="" rel="">
                                    <span class="text-primary">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                        Facebook
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Cek campaign ini! ') }}{{ url('/campaign/' . $campaign?->slug ?? '') }}"
                                    class="btn btn-list" title="Bagikan ke Twitter">
                                    <span class="text-primary">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                        Twitter
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a target="_blank"
                                    href="https://t.me/share/url?url={{ url('/campaign/' . $campaign?->slug ?? '') }}&text={{ urlencode('Cek campaign ini!') }}"
                                    class="btn btn-list" title="Bagikan ke Telegram">
                                    <span class="text-primary">
                                        <ion-icon name="paper-plane"></ion-icon>
                                        Telegram
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a target="_blank"
                                    href="https://wa.me/?text={{ url('/campaign/' . $campaign?->slug ?? '') }}"
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
        </div> --}}
        <!-- * Share Action Sheet -->

    </div>

    @livewire('nav-bar')
    <script src="{{ asset('assets/js/base.js') }}"></script>


</div>
