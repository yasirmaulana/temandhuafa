<div>
    <div class="container">
        <p>Zakat yang dikenakan atas Emas dan perak yang telah mencapai nisab dan haul. Zakat Emas dan
            Perak ditunaikan jika seorang muzaki (orang yang menunaikan zakat) memiliki Emas mencapai nisab senilai 85
            gram (atau 91,92 gram Emas) atau perak dengan mencapai nisab 595 gram. Zakat yang harus dibayarkan
            adalah sebesar 2,5% dari Emas atau perak yang dimiliki. Haul Zakat Emas dan Perak adalah satu tahun</p>
        <div class="row g-3">
            <div class="col-12">
                <label class="col-sm-12 col-form-label">Pilih jenis zakat di bawah ini.</label>
                <div class="col-sm-12">
                    <select class="form-select" wire:model.change="selectedZakat">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="emas">Emas</option>
                        <option value="perak">Perak</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Emas atau Perak yang dimiliki</label>
                <div class="input-group">
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedEmasPerak"
                    placeholder="berat emas atau perak">
                    <span class="input-group-text" id="basic-addon1">Gram</span>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Masukan harga emas atau perak saat ini (dalam gram)
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHargaEmasPerak" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat emas/perak?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Jumlah yang saya harus bayar per tahun </strong>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedJumlahBayar" placeholder="0" disabled>
                </div>
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
