@php
    $currentUrl = url()->current();
@endphp

<div class="container">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .chevron-back {
            filter: invert(1);
        }
    </style>
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="chevron Icon" class="chevron-back"
                    height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
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
            <form wire:submit.prevent="createTransaction">
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
                    </div>
                </div>
                <div class="section mt-2 mb-0">
                    @if (empty(Auth::check()))
                        <h4 class="text-center">
                            <button type="button" wire:click="loginForm('{{ e($currentUrl) }}')"
                                class="btn btn-link p-0 m-0 align-baseline">Login</button>
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
                    @endif
                    <div class="form-check form-switch">
                        <input wire:model="anonim" class="form-check-input" type="checkbox">
                        <label class="form-check-label text-secondary">
                            <h5 class="text-secondary">Sembunyikan nama saya (Donasi Teman Baik)</h5>
                        </label>
                    </div>
                    @if (empty(Auth::check()))
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
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Pilih Metode
                                Pembayaran</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
