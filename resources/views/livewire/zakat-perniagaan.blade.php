<div>
    <div class="container">
        <p>Zakat perrniagaan disebut juga dengan Zakat Tijarah, adalah zakat yang dikeluarkan atas kepemilikan harta
            yang diperuntukkan untuk kegiatan jual-beli. Syarat yang harus dipenuhi untuk mengeluarkan zakat perniagaan,
            adalah usaha telah berjalan selama setahun, dan laba bersih dari kegiatan perniagaan tersebut ditaksir telah
            mencapai zakat 85 gram Emas atau 91,92 gram Emas (dalam setahun), maka wajib membayarkan zakat sebesar 2,5%.
        </p>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Nominal Laba Bersih
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedLabaBersih"
                        placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Masukan harga emas saat ini (dalam gram)
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedHargaEmas"
                        placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat perniagaan?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>

            @if ($wajibZakat == 'Ya')
                <div class="col-12">
                    <label class="form-label">
                        <strong>Jumlah yang saya harus bayar</strong>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedJumlahBayar" placeholder="0" disabled>
                    </div>
                </div>
            @elseif($wajibZakat == 'Tidak')
                <span class="text-danger">Belum memenuhi syarat wajib zakat, namun tetap dapat beramal dengan
                    <a href="/checkout/infaq-0" wire:navigate class="text-primary">
                        bersedekah.
                    </a>
                </span>
            @endif
        </div>

        <p></p>

        @if ($wajibZakat == 'Ya')
            <strong style="font-size: 1.2em;" class="text-success">
                <i class="ri-hand-heart-fill"></i> Niat Zakat Perniagaan
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
        @endif

    </div>

    @if ($wajibZakat == 'Ya')
        <div class="col-12">
            <a href="/checkout/{{ 'perniagaan-' . $jumlahBayar }}" class="btn w-100" style="background-color: #8CC800;">
                <i class="ri-hand-heart-line text-white"></i>
                <span class="fw-bold text-white">
                    Bayar Zakat Sekarang
                </span>
            </a>
        </div>
    @endif
</div>
