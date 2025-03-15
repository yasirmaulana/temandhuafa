<div class="container">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style></style>

    <!-- loader -->
    {{-- <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div> --}}
    <!-- * loader -->

    <!-- App Header -->
    {{-- <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="javascript:void(0)" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div> --}}
    <!-- * App Header -->

    @livewire('header')

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-3 mb-0">
            @if (!in_array($this->titleRowBayar, ['infaq', 'emas', 'perak', 'pertanian', 'peternakan', 'fidyah', 'kafarat']))
                <h2 class="text-primary mb-3">{{ $campaign->title }}</h2>
                @php
                    $nominalMapping = [
                        'Infaq' => 'Nominal Infak',
                        'Fidyah' => 'Nominal Fidyah',
                        'Kafarat' => 'Nominal Kafarat',
                        'Zakat Emas' => 'Nominal Zakat Emas',
                        'Zakat Perak' => 'Nominal Zakat Perak',
                        'Zakat Pertanian' => 'Nominal Zakat Pertanian',
                        'Zakat Maal' => 'Nominal Zakat Maal',
                        'Zakat Perniagaan' => 'Nominal Zakat Perniagaan',
                        'Zakat Penghasilan' => 'Nominal Zakat Penghasilan',
                    ];

                    $nominalTitle = $nominalMapping[$titleBayar] ?? 'Nominal Donasi';
                @endphp

                <h4>Masukkan {{ $nominalTitle }}</h4>
            @else
                <h2 class="text-primary mb-3">{{ $titleBayar }}</h2>
            @endif

        </div>

        <div class="container">
            @if (!in_array($this->titleRowBayar, ['emas', 'perak', 'pertanian', 'peternakan', 'fidyah', 'kafarat']))
                <ul class="listview image-listview flush transparent mt-0 mb-0">
                    <li>
                        <a href="javascript:void(0)" wire:click="setAmount(30000)" class="item">
                            <div class="icon-box">
                                <i class="bi bi-emoji-smile"></i>
                            </div>
                            <div class="in">
                                Rp 30.000
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" wire:click="setAmount(50000)" class="item">
                            <div class="icon-box" wire:ignore>
                                <i class="bi bi-emoji-wink text-success"></i>
                            </div>
                            <div class="in text-success">
                                Rp. 50.000
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" wire:click="setAmount(100000)" class="item">
                            <div class="icon-box" wire:ignore>
                                <i class="bi bi-emoji-laughing text-primary"></i>
                            </div>
                            <div class="in text-primary">
                                Rp 100.000
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" wire:click="setAmount(250000)" class="item">
                            <div class="icon-box" wire:ignore>
                                <i class="bi bi-emoji-kiss text-warning"></i>
                            </div>
                            <div class="in text-warning">
                                Rp 250.000
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" wire:click="setAmount(750000)" class="item">
                            <div class="icon-box" wire:ignore>
                                <i class="bi bi-emoji-heart-eyes text-danger"></i>
                            </div>
                            <div class="in text-danger">
                                Rp 750.000
                            </div>
                        </a>
                    </li>
                </ul>
            @endif

            <form wire:submit="createPayment">
                {{ csrf_field() }}

                <div class="section full mt-0 mb-0">
                    <div class="wide-block pb-2 pt-2">
                        @if (!in_array($this->titleRowBayar, ['emas', 'perak', 'pertanian', 'peternakan', 'fidyah', 'kafarat']))
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <input type="text" id="numberInput" class="form-control rounded-0 fw-bold"
                                        wire:model.change="formattedAmount" placeholder="Rp" required>
                                    <i class="clear-input"> <ion-icon name="close-circle"></ion-icon></i>
                                </div>
                            </div>
                        @else
                            <h2 class="text-primary">Rp {{ number_format($amount, 0, ',', '.') }}</h2>
                        @endif

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" wire:model="infaqSistem" wire:click="togle"
                            checked>
                            <div class="d-flex align-items-center">
                                <h5 class="text-secondary mb-0 mr-1">Biaya Transaksi Rp 5.000</h5>
                                <i class="bi bi-info-circle text-secondary ms-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Biaya transaksi Rp 5.000 digunakan untuk memproses pembayaran. Anda dapat memilih untuk menanggung biaya ini, atau jika tidak dicentang, jumlahnya akan dikurangi dari total donasi Anda."></i>
                            </div>                          
                        </div>
                    </div>
                </div>

                <div class="section mt-2 mb-0">
                    @if (empty(Auth::check()))
                        <h4 class="text-center">
                            {{-- <a data-bs-toggle="modal" data-bs-target="#basicModal" href="/login">Login</a> --}}
                            <a href="/login">Login</a>
                            atau lengkapi data berikut:
                        </h4>
                    @endif
                </div>

                <div class="wide-block pb-1 pt-1">
                    @if (empty(Auth::check()))
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="text" wire:model="namaLengkap" class="form-control" placeholder="Nama"
                                    required>
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input wire:model="anonim" class="form-check-input" type="checkbox">
                            <label class="form-check-label text-secondary">
                                <h5 class="text-secondary">Sembunyikan nama saya (Donasi Teman Baik)</h5>
                            </label>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="number" wire:model="phone" class="form-control" placeholder="No. Whatsapp"
                                    required>
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="email" wire:model="email" class="form-control" placeholder="Email"
                                    required>
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                    @endif

                    @if (!$isZiswaf)
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <textarea wire:model="doa" class="form-control" rows="4"
                                    placeholder="Tulis doa untuk penggalang dana atau dirimu"></textarea>
                                <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                            </div>
                        </div>
                    @endif

                    @if (in_array($this->titleRowBayar, ['emas', 'perak', 'pertanian', 'peternakan']))
                        <div class="input-wrapper wide-block pb-2 pt-2">
                            <strong style="font-size: 1.2em;" class="text-success">Niat {{ $titleBayar }}</strong>
                            <p></p>
                            <p style="font-size: 1.5em;">
                                نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ مَالِي  قُرْبَةً اِلَى اللّهِ تَعَالَى
                            </p>
                            <p>
                                Saya berniat mengeluarkan zakat harta milikku untuk mendekatkan diri kepada Allah Ta’ala
                            </p>
                        </div>
                    @endif

                    @if (in_array($this->titleRowBayar, ['fidyah']))
                        <div class="input-wrapper wide-block pb-2 pt-2">
                            <strong style="font-size: 1.2em;" class="text-success">Niat {{ $titleBayar }}</strong>
                            <p>Untuk orang sakit</p>
                            <p style="font-size: 1.5em;">
                                نَوَيْتُ أَنْ أُخْرِجَ فِدْيَةَ الْمَرَضِ الَّذِيْ لَا يُرْجٰى بَرَؤُهُ فَرْضًا شَرْعًا
                                قُرْبَةً اِلَى اللّهِ تَعَالَى
                            </p>
                            <p>Untuk wanita hamil/menyusui</p>
                            <p style="font-size: 1.5em;">
                                نَوَيْتُ أَنْ أُخْرِجَ فِدْيَةَ الْمُرْضِعِ فَرْضًا شَرْعًا قُرْبَةً اِلَى اللّهِ
                                تَعَالَى
                            </p>
                            <p>
                                Saya berniat mengeluarkan zakat harta milikku untuk mendekatkan diri kepada Allah Ta’ala
                            </p>
                        </div>
                    @endif

                    <div class="appBottomMenu container">
                        <div class="col-5">
                            <h5 class="name mt-1 mb-0 text-secondary">Total Donasi</h5>
                            <h4 class="text-primary">Rp {{ number_format($totalAmount, 0, ',', '.') }}</h4>
                        </div>
                        <div class="col-7">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Lanjut Pembayaran</button>
                        </div>
                    </div>
            </form>

        </div>
        <!-- * App Capsule -->

        <!-- Basic Modal -->

        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-3">
                            <form class="needs-validation" novalidate>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="email1">Alamat Email</label>
                                        <input type="email" class="form-control" id="email1" placeholder=""
                                            required>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Masukkan alamat email.</div>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="password1">Password</label>
                                        <input type="password" class="form-control" id="password1" placeholder=""
                                            required>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Password harap dilengkapi.</div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                            </form>

                            <div class="col-12">
                                <h4 class="text-center pt-3 pb-2">Atau</h4>
                            </div>
                            <a href="" class="btn btn-danger btn-block">
                                <ion-icon name="logo-google"></ion-icon>Google</a>

                            <h4 class="pt-3 mt-3">Belum punya akun? </h4>
                            <div class="form-links mt-1 mb-3">
                                <div>
                                    <a href="/">Registrasi Baru</a>
                                </div>
                                <div>
                                    {{-- <a href="lupa-password.html" class="text-muted">Lupa Password?</a> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        </div>

    </div>
