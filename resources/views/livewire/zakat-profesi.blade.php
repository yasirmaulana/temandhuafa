<div>
    <div class="container">
        <p>Zakat yang dikeluarkan individu maupun lembaga atas harta/penghasilan yang
            diperolehnya dengan syarat dan ketentuan yang sudah ditetapkan</p>
    </div>

    <div class="accordion " id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong class="text-success">
                        <i class="ri-calculator-fill"></i>
                        Kalkulator Zakat Penghasilan
                    </strong>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk tabungan/giro/deposito
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" wire:model.change="hartaTabungan" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk logam mulia</label>
                            <input type="number" class="form-control" wire:model.change="hartaLM">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk surat berharga</label>
                            <input type="number" class="form-control" wire:model.change="hartaSuratBerharga">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk properti</label>
                            <input type="number" class="form-control" wire:model.change="hartaProperti">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk kendaraan</label>
                            <input type="number" class="form-control" wire:model.change="hartaKendaraan">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk koleksi seni & barang
                                antik</label>
                            <input type="number" class="form-control" wire:model.change="hartaBarangAntik">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk stok barang dagangan</label>
                            <input type="number" class="form-control" wire:model.change="hartaBarangDagang">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harta dalam bentuk lainnya</label>
                            <input type="number" class="form-control" wire:model.change="hartaLainnya">
                        </div>
                        <div class="col-12">
                            <label class="form-label"><strong>Jumlah yang saya harus
                                    bayar per tahun </strong></label>
                            <input type="number" class="form-control" wire:model.change="jumlahBayar" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 px-4 g-2">
        <strong style="font-size: 1.2em;" class="text-success">
            <i class="ri-hand-heart-fill"></i> Niat Zakat Penghasilan
        </strong>
        <p></p>
        <p style="font-size: 1.5em;">
            نَوَيْتُ أَنْ أُخْرِجَ زَكاَةَ مَالِي فَرْضًالِلهِ تَعَالَى
        </p>
        <div class="fst-italic">
            “Nawaitu an ukhrija zakata maali fardha llillahi ta’aala”
        </div>
        <p>
            Saya berniat mengeluarkan zakat harta milikku karena Allah Ta’ala
        </p>
    </div>

    <div class="col-12">
        <a href="/checkout/{{ 'penghasilan-' . $jumlahBayar }}" wire:navigate class="btn btn-success w-100">
            <i class="ri-prayer-fill"></i>
            <span class="fw-bold">
                Bayar Zakat Sekarang
            </span>
        </a>
    </div>


</div>
