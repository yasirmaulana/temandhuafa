<div class="container">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-3 mb-0">
            <h2 class="text-primary mb-3">#BisaMakan - Donasi untuk berbagi Makanan di rumah</h2>
            <h4>Masukkan Nominal Donasi</h4>
        </div>


        <div class="container">

            <ul class="listview image-listview flush transparent mt-0 mb-0">
                <li>
                    <a href="" class="item">
                        <div class="icon-box">
                            <i class="fa-regular fa-face-smile-beam fa-lg"></i>
                        </div>
                        <div class="in">
                            Rp 30.000
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="item">
                        <div class="icon-box">
                            <i class="fa-regular fa-face-laugh-beam fa-lg text-success"></i>
                        </div>
                        <div class="in text-success">
                            Rp. 50.000
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="item">
                        <div class="icon-box">
                            <i class="fa-regular fa-face-laugh fa-lg text-primary"></i>
                        </div>
                        <div class="in text-primary">
                            Rp 100.000
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="item">
                        <div class="icon-box">
                            <i class="fa-regular fa-face-grin-squint fa-lg text-warning"></i>
                        </div>
                        <div class="in text-warning">
                            Rp 250.000
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="item">
                        <div class="icon-box">
                            <i class="fa-regular fa-face-grin-hearts fa-lg text-danger"></i>
                        </div>
                        <div class="in text-danger">
                            Rp 750.000
                        </div>
                    </a>
                </li>
            </ul>

            <form wire:submit="createPayment" class="needs-validation" novalidate action="">
                <div class="section full mt-0 mb-0">
                    <div class="wide-block pb-2 pt-2">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="number" class="form-control" id="numberInput"
                                    wire:model.change="formattedProgrgam" placeholder="Rp">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1" checked />
                            <label class="form-check-label text-secondary" for="SwitchCheckDefault1">
                                <h5 class="text-secondary">Infak Sistem Rp 2.000</h5>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="section mt-2 mb-0">
                    <h4 class="text-center"><a href="">Login</a> atau lengkapi data berikut:</h4>
                </div>


                <div class="wide-block pb-1 pt-1">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="name5" placeholder="Nama">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2" />
                        <label class="form-check-label text-secondary" for="SwitchCheckDefault2">
                            <h5 class="text-secondary">Sembunyikan nama saya (Donasi Teman Baik)</h5>
                        </label>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="wa5" placeholder="No. Whatsapp">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email5" placeholder="Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <textarea id="address5" rows="4" class="form-control" placeholder="Doa atau dukungan"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>





            </form>












        </div>
        <!-- * App Capsule -->


        <!-- App Bottom Menu -->
        <div class="appBottomMenu container">
            <div class="col-5">
                <h5 class="name mt-1 mb-0 text-secondary">Total Donasi</h5>
                <h4 class="text-primary">Rp {{ number_format($totalAmount, 0, ',', '.') }}</h4>
            </div>
            <div class="col-7">
                <a href="bayar-donasi.html" class="btn-block">
                    <button type="button" class="btn btn-success btn-lg btn-block">Lanjut Pembayaran</button>
                </a>
            </div>

        </div>
        <!-- * App Bottom Menu -->

    </div>

    <main class="position-relative">
        <style>
            .emoji {
                font-size: 2rem;
                color: #ffc107;
                font-size: 1rem;
                margin-right: 5px;
            }

            .emoji-love {
                color: #ff5e57;
            }

            .custom-font-size {
                font-size: 11px;
            }

            .hidden-zero {
                visibility: hidden;
            }
        </style>

        <p></p>
        <section class="">
            <form wire:submit="createPayment">
                {{ csrf_field() }}
                <div class="custom-container mb-4">
                    <div class="d-flex bd-highlight align-items-center">
                        @if (
                            !in_array($this->titleRowBayar, [
                                'infaq',
                                'emas',
                                'perak',
                                'pertanian',
                                'maal',
                                'perniagaan',
                                'penghasilan',
                                'fidyah',
                                'kafarat',
                            ]))
                            <div class="bd-highlight">
                                <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate
                                    class="btn btn-default border shadow-sm ">
                                    <i class="ri-arrow-go-back-line text-warning"></i>
                                </a>
                            </div>
                            <div class="flex-fill bd-highlight justify-content-center text-center">
                                <div class="border shadow-sm rounded height py-3">
                                    <h4 class="fw-bold">{{ $campaign->title }}</h4>
                                </div>
                            </div>
                        @else
                            <div class="bd-highlight">
                                @if ($titleBayar == 'Infaq')
                                    <a href="{{ url('/') }}" wire:navigate
                                        class="btn btn-default border shadow-sm">
                                        <i class="ri-arrow-go-back-line text-warning"></i>
                                    </a>
                                @elseif($titleBayar == 'Fidyah')
                                    <a href="{{ url('/fidyah') }}" wire:navigate
                                        class="btn btn-default border shadow-sm">
                                        <i class="ri-arrow-go-back-line text-warning"></i>
                                    </a>
                                @elseif($titleBayar == 'Kafarat')
                                    <a href="{{ url('/kafarat') }}" wire:navigate
                                        class="btn btn-default border shadow-sm">
                                        <i class="ri-arrow-go-back-line text-warning"></i>
                                    </a>
                                @else
                                    <a href="{{ url('zakat/') }}" wire:navigate
                                        class="btn btn-default border shadow-sm">
                                        <i class="ri-arrow-go-back-line text-warning"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="flex-fill bd-highlight justify-content-center text-center">
                                <div class="border shadow-sm rounded height py-3">
                                    <h4 class="fw-bold">{{ $titleBayar }}</h4>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="title-2 mt-4">
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

                        <h3>{{ $nominalTitle }}</h3>
                    </div>
                    @if (!$isZiswaf)
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(30000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-smile emoji"></i>
                                <span class="fw-bold custom-font-size">
                                    Rp30.000<span class="hidden-zero">0</span>
                                </span>

                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(50000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-smile emoji"></i>
                                <span class="fw-bold custom-font-size">Rp50.000<span
                                        class="hidden-zero">0</span></span>
                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(95000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-laughing emoji"></i>
                                <span class="fw-bold custom-font-size">Rp95.000<span
                                        class="hidden-zero">0</span></span>
                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(100000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-laughing emoji"></i>
                                <span class="fw-bold custom-font-size">Rp100.000</span>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(250000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-heart-eyes emoji"></i>
                                <span class="fw-bold custom-font-size">Rp250.000</span>
                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(500000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-heart-eyes emoji"></i>
                                <span class="fw-bold custom-font-size">Rp500.000</span>
                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(750000)" style="cursor: pointer;">
                                <i class="bi bi-emoji-heart-eyes emoji"></i>
                                <span class="fw-bold custom-font-size">Rp750.000</span>
                            </div>
                            <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                                wire:click="setAmount(950000)" style="cursor: pointer;">
                                <i class="bi bi-heart-fill emoji emoji-love"></i>
                                <span class="fw-bold custom-font-size">Rp950.000</span>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3 rounded-0">
                                <div class="input-group">
                                    <span class="input-group-text rounded-0 fw-bold" id="basic-addon1">Rp.</span>
                                    <input type="text" id="numberInput" class="form-control rounded-0 fw-bold"
                                        wire:model.change="formattedAmount" placeholder="0" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-fill bd-highlight">
                        <div class="form-check">
                            <input wire:model="infaqSistem" wire:click="togle" class="form-check-input"
                                type="checkbox">
                            <label class="form-check-label small">Infak sistem 2.000</label>
                        </div>
                    </div>

                    <hr class="my-3">
                    @if (empty(Auth::check()))
                        <p class="text-center fs-6">
                            <a href="" class="text-decoration-underline fw-bold text-success"
                                data-bs-toggle="modal" data-bs-target="#basicModal">Masuk</a> atau lengkapi
                            data dibawah ini:
                        </p>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" wire:model="namaLengkap" class="form-control" placeholder="Nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" wire:model="email" class="form-control" placeholder="Alamat Email Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telepon</label>
                            <input type="number" wire:model="phone" class="form-control" placeholder="Nomor Telepon" required>
                        </div>
                    @endif

                    @if (!$isZiswaf)
                        <div class="d-flex flex-fill bd-highlight">
                            <div class="form-check">
                                <input wire:model="anonim" class="form-check-input" type="checkbox">
                                <label class="form-check-label small">Sembunyikan nama saya (Donasi Teman Baik)</label>
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="mb-3">
                            <label for="doa" class="form-label small fw-bold">Doa dan Dukungan (opsional)</label>
                            <textarea wire:model="doa" class="form-control" rows="4" placeholder="Tulis doa untuk penggalang dana atau dirimu"></textarea>
                        </div>
                    @endif
                </div>

                {{-- <div class="mobile-style-1 border p-3 bg-light">
                    <div class="row g-1 align-items-center justify-content-between">
                        <div class="col-auto">
                            <span class="text-muted small">Total Donasi</span>
                            <div class="fw-bold text-danger fs-5">Rp
                                {{ number_format($totalAmount, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <button type="submit" class="btn" id="pay-button"
                                style="background-color: #8CC800;">
                                <span class="fw-bold text-white">Lanjut Pembayaran</span>
                            </button>
                        </div>
                    </div>
                </div> --}}

            </form>
        </section>

        <!-- Basic Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login to Your Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="row g-3" wire:submit.prevent="authLogin">
                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="text" wire:model="email" class="form-control" id="yourEmail"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" wire:model="password" class="form-control" id="yourPassword"
                                    required>
                            </div>

                            @if ($errors->has('login'))
                                <div class="error">{{ $errors->first('login') }}</div>
                            @endif

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </main>

</div>
