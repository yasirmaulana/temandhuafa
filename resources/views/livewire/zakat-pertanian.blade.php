<div>
    <div class="container">
        <p>Zakat Pertanian adalah zakat hasil pertanian. Objeknya meliputi hasil tumbuh-tumbuhan atau tanaman yang
            bernilai ekonomis seperti biji-bijian, umbi-umbian, sayur-mayur, buah-buahan, tanaman hias, rumput-rumputan,
            dedaunan, dan lain-lain.
            <br>
            Nisab Zakat Pertanian adalah sama dengan/setara dengan 815 kg beras atau 1.481 kg gabah. Zakatnya 5% jika
            perairan berbayar dan 10% jika perairannya menggunakan tadah hujan.
        </p>
        <div class="row g-3">
            <div class="col-12">
                <label class="col-sm-12 col-form-label">Pilih Jenis Pertanian</label>
                <div class="col-sm-12">
                    <select class="form-select" wire:model.change="selectedHasilPertanian">
                        <option value="gabah">Gabah</option>
                        <option value="beras">Beras</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Hasil Pertanian</label>
                <div class="input-group">
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedJumlahHasilPertanian" placeholder="input hasil panen">
                    <span class="input-group-text" id="basic-addon1">Kg</span>
                </div>
            </div>
            <div class="col-12">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="perairan" id="gridRadios1"
                            value="berbayar">
                        <label class="form-check-label" for="gridRadios1">Perairan Berbayar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.change="perairan" id="gridRadios2"
                            value="tadahHujan">
                        <label class="form-check-label" for="gridRadios2">Perairan Tadah Hujan</label>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat pertanian?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>

            @if ($wajibZakat == 'Ya')
                <div class="col-12">
                    <label class="form-label">Harga jual komoditas (per Kg)
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedHargaJual" placeholder="0">
                    </div>
                </div>
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

        @if ($wajibZakat == 'Ya')
            <p></p>
            <strong style="font-size: 1.2em;" class="text-success">
                <i class="ri-hand-heart-fill"></i> Niat Zakat Pertanian
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
            <a href="/checkout/{{ 'maal-' . $jumlahBayar }}" class="btn w-100" style="background-color: #8CC800;">
                <i class="ri-hand-heart-line"></i>
                <span class="fw-bold">
                    Bayar Zakat Sekarang
                </span>
            </a>
        </div>
    @endif

</div>
