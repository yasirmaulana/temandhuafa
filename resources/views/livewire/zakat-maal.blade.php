<div>
    <div class="container">
        <strong class="text-success">Zakat Maal</strong>
        <p>Zakat yang dikeluarkan individu maupun lembaga atas harta/penghasilan yang
            diperolehnya dengan syarat dan ketentuan yang sudah ditetapkan</p>
        <strong class="text-success">
            <i class="ri-calculator-fill"></i>
            Kalkulator Zakat Maal
        </strong>
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
                <label class="form-label">Harta dalam bentuk piutang lancar</label>
                <input type="number" class="form-control" wire:model.change="hartaPiutangLancar">
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah Harta</strong></label>
                <input type="number" class="form-control" wire:model.change="jumlahHarta" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Hutang jatuh tempo saat membayar kewajiban
                    zakat</label>
                <input type="number" class="form-control" wire:model.change="hutangJatuhTempo">
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah harta yang dihitung
                        zakatnya</strong></label>
                <input type="number" class="form-control" wire:model.change="hartaDihitungZakat" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Masukan harga emas saat
                    ini (dalam gram)<span class="text-danger">*</span></label>
                <input type="number" class="form-control" wire:model.change="hargaEmas" required>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Besar nisab zakat maal per tahun (85
                        gram)</strong></label>
                <input type="number" class="form-control" wire:model.change="nisab" disabled>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Apakah saya wajib membayar zakat
                        maal?</strong></label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            <div class="col-12">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios1"
                            value="2.5" checked>
                        <label class="form-check-label" for="gridRadios1">
                            2,5%
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios2"
                            value="2.7">
                        <label class="form-check-label" for="gridRadios2">
                            2,7%
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios3"
                            value="3.0">
                        <label class="form-check-label" for="gridRadios3">
                            3,0%
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah yang saya harus
                        bayar per tahun </strong></label>
                <input type="number" class="form-control" wire:model.change="jumlahBayar" disabled>
            </div>
        </div>

        <p></p>
        <strong style="font-size: 1.2em;" class="text-success">
            <i class="ri-hand-heart-fill"></i> Niat Zakat Maal
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
        <a href="/checkout/{{ 'maal-' . $jumlahBayar }}" class="btn btn-success w-100">
            <i class="ri-hand-heart-line"></i>
            <span class="fw-bold">
                Bayar Zakat Sekarang
            </span>
        </a>
    </div>
</div>
