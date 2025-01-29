<div>
    <div class="container">
        <strong class="text-success">Zakat Penghasilan</strong>
        <p>Zakat yang dikeluarkan individu maupun lembaga atas harta/penghasilan yang
            diperolehnya dengan syarat dan ketentuan yang sudah ditetapkan</p>
        <strong class="text-success">
            <i class="ri-calculator-fill"></i>
            Kalkulator Zakat Penghasilan
        </strong>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">
                    Penghasilan/Gaji saya per bulan
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedPenghasilan" placeholder="0" required>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Penghasilan lain-lain saya per bulan</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedPenghasilanLain" placeholder="0" required>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Hutang jatuh tempo kebutuhan pokok</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHutangJatuhTempo" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah penghasilan per bulan</strong></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedPenghasilanPerBulan" placeholder="0" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    Masukan harga emas saat ini (per gram)
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHargaEmas" placeholder="0" required>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Besarnya nishab zakat penghasilan per bulan</strong></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedNisabPerBulan" placeholder="0" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat penghasilan?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            <div class="col-12">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios1"
                            value="2.5" checked>
                        <label class="form-check-label" for="gridRadios1">2,5%</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios2"
                            value="2.7">
                        <label class="form-check-label" for="gridRadios2">2,7%</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="persen" id="gridRadios3"
                            value="3.0">
                        <label class="form-check-label" for="gridRadios3">3,0%</label>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Jumlah yang saya harus bayar per bulan</strong>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedJumlahZakatPenghasilan" placeholder="0" disabled>
                </div>
            </div>
        </div>

        <p></p>
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
        <a href="/checkout/{{ 'penghasilan-' . $jumlahZakatPenghasilan }}" wire:navigate class="btn btn-success w-100">
            <i class="ri-hand-heart-line"></i>
            <span class="fw-bold">
                Bayar Zakat Sekarang
            </span>
        </a>
    </div>


</div>
