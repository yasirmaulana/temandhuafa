<main class="position-relative">

    @livewire('header')

    <header class="learning-header overflow-hidden">
        <div class="watch-video">
            <div class="video-header" id="video-header">
                <img src="{{ $campaign?->image ?? '' }}" class="img-fluid" alt="">
            </div>
        </div>
    </header>

    <section class="custom-container py-3">

        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="zakat-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                    aria-selected="true">Zakat</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="infaq-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-infaq" type="button" role="tab" aria-controls="infaq"
                    aria-selected="false">Infaq-Sedekah</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="wakaf-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-wakaf" type="button" role="tab" aria-controls="wakaf"
                    aria-selected="false">Wakaf</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                aria-labelledby="zakat-tab">

                <div class="accordion" id="accordionExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Kalkulator Zakat Profesi
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                belum ada ui nya
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Kalkulator Zakat Maal
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Zakat yang dikeluarkan individu maupun lembaga atas harta/penghasilan yang
                                    diperolehnya dengan syarat dan ketentuan yang sudah ditetapkan</p>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk tabungan/giro/deposito
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" wire:model.change="hartaTabungan"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk logam mulia</label>
                                        <input type="number" class="form-control" wire:model.change="hartaLM">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk surat berharga</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaSuratBerharga">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk properti</label>
                                        <input type="number" class="form-control" wire:model.change="hartaProperti">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk kendaraan</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaKendaraan">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk koleksi seni & barang
                                            antik</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaBarangAntik">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk stok barang dagangan</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaBarangDagang">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk lainnya</label>
                                        <input type="number" class="form-control" wire:model.change="hartaLainnya">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Harta dalam bentuk piutang lancar</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaPiutangLancar">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label"><strong>Jumlah Harta</strong></label>
                                        <input type="number" class="form-control" wire:model.change="jumlahHarta"
                                            disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Hutang jatuh tempo saat membayar kewajiban
                                            zakat</label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hutangJatuhTempo">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label"><strong>Jumlah harta yang dihitung
                                                zakatnya</strong></label>
                                        <input type="number" class="form-control"
                                            wire:model.change="hartaDihitungZakat" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Masukan harga emas saat
                                            ini (dalam gram)<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" wire:model.change="hargaEmas"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label"><strong>Besar nisab zakat maal per tahun (85
                                                gram)</strong></label>
                                        <input type="number" class="form-control" wire:model.change="nisab"
                                            disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label"><strong>Apakah saya wajib membayar zakat
                                                maal?</strong></label>
                                        <input type="text" class="form-control" wire:model.change="wajibZakat"
                                            disabled>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    wire:model.change="persen" id="gridRadios1" value="2.5"
                                                    checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    2,5%
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    wire:model.change="persen" id="gridRadios2" value="2.7">
                                                <label class="form-check-label" for="gridRadios2">
                                                    2,7%
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    wire:model.change="persen" id="gridRadios3" value="3.0">
                                                <label class="form-check-label" for="gridRadios3">
                                                    3,0%
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label"><strong>Jumlah yang saya harus
                                                bayar per tahun </strong></label>
                                        <input type="number" class="form-control" wire:model.change="jumlahBayar"
                                            disabled>
                                    </div>

                                    <strong>Niat Zakat Maal</strong>
                                    <p style="font-size: 1.5em;">
                                        نَوَيْتُ أَنْ أُخْرِجَ زَكاَةَ مَالِي فَرْضًالِلهِ تَعَالَى
                                    </p>
                                    <div class="fst-italic">
                                        “Nawaitu an ukhrija zakata maali fardha llillahi ta’aala”
                                    </div>
                                    <p>
                                        Saya berniat mengeluarkan zakat harta milikku karena Allah Ta’ala
                                    </p>
                                    <div class="col-12">
                                        <a href="/checkout/{{ 'ziswaf-' . $jumlahBayar }}"
                                            class="btn btn-success w-100">
                                            <i class="ri-hand-heart-line"></i>
                                            <span class="fw-bold">
                                                Bayar Zakat Sekarang
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="bordered-justified-infaq" role="tabpanel" aria-labelledby="infaq-tab">
                belum ada ui infaq nya
            </div>
            <div class="tab-pane fade" id="bordered-justified-wakaf" role="tabpanel" aria-labelledby="wakaf-tab">
                belum ada ui wakaf nya
            </div>
        </div>

    </section>

    <div class="divider"></div>

    @livewire('footer')

    @livewire('nav-bar')

</main>
