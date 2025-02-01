<div>
    <div class="container">
        <p>Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari penghasilannya tersebut.
            </p>
            <p>(Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomor 31 Tahun 2019, Fatwa MUI Nomor 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</p>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">
                    Penghasilan/Gaji saya per bulan
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedPenghasilan"
                        placeholder="0" required>
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
                <div class="d-inline-flex align-items-center">
                    <label class="form-label mb-0 me-1">Hutang jatuh tempo kebutuhan pokok</label>
                    <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Yang dimaksud Kebutuhan Pokok adalah kebutuhan sandang, pangan, papan, pendidikan, kesehatan dan alat transportasi primer."
                        style="cursor: pointer;"></i>
                </div>
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
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedHargaEmas"
                        placeholder="0" required>
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
