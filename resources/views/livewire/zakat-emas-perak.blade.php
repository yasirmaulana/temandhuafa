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
                    <select class="form-select" wire:model.change="selectedLogam">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="emas">Emas</option>
                        <option value="perak">Perak</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">{{ $selectedLogam }} yang dimiliki</label>
                <div class="input-group">
                    <input type="number" id="numberInput" class="form-control" wire:model.change="formattedEmasPerak"
                        placeholder="berat emas atau perak">
                    <span class="input-group-text" id="basic-addon1">Gram</span>
                </div>
            </div>


            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat {{ $selectedLogam }}?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            @if ($wajibZakat == 'Ya')
                <div class="col-12">
                    <label class="form-label">Masukan harga {{ $selectedLogam }} saat ini (dalam gram)
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
                        <strong>Jumlah yang saya harus bayar per tahun </strong>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedJumlahBayar" placeholder="0" disabled>
                    </div>
                </div>
            @elseif($wajibZakat == 'Tidak')
                <span class="text-danger">Belum memenuhi syarat wajib zakat, namun tetap dapat beramal dengan
                    <div class="col-12">
                        <a href="/checkout/infaq-0" class="btn w-100" style="background-color: #8CC800;">
                            <i class="ri-hand-heart-line text-white"></i>
                            <span class="fw-bold text-white">
                                Berinfak
                            </span>
                        </a>
                    </div>
                </span>
            @endif
        </div>

        <p></p>
        @if ($wajibZakat == 'Ya')
            <strong style="font-size: 1.2em;" class="text-success">
                <i class="ri-hand-heart-fill"></i> Niat Zakat Emas/Perak
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
            <a href="/checkout/{{ $selectedLogam. '-' . $jumlahBayar }}" class="btn w-100" style="background-color: #8CC800;">
                <i class="ri-hand-heart-line text-white"></i>
                <span class="fw-bold text-white">
                    Bayar Zakat {{ $selectedLogam }} Sekarang
                </span>
            </a>
        </div>
    @endif

</div>
