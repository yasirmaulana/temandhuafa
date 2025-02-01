<div>
    <div class="container">
        {{-- <strong class="text-success">Zakat Maal</strong> --}}
        <p>zakat yang dikenakan atas segala jenis harta, yang secara zat maupun substansi perolehannya tidak bertentangan dengan ketentuan agama.</p>
        {{-- <strong class="text-success">
            <i class="ri-calculator-fill"></i>
            Kalkulator Zakat Maal
        </strong> --}}
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk tabungan/giro/deposito
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaTabungan" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk logam mulia</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaLM" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk surat berharga</label>
                <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Yang dimaksud Kebutuhan Pokok adalah kebutuhan sandang, pangan, papan, pendidikan, kesehatan dan alat transportasi primer."
                        style="cursor: pointer;"></i>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaSuratBerharga" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk properti</label>
                <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Rumah (properti) yang digunakan sehari-hari, TIDAK DIKENAKAN ZAKAT"
                        style="cursor: pointer;"></i>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaProperti" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk kendaraan</label>
                <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Kendaraan yang digunakan sehari-hari, TIDAK DIKENAKAN ZAKAT."
                        style="cursor: pointer;"></i>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaKendaraan" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk koleksi seni & barang
                    antik</label>
                    <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Nilai Koleksi dapat ditaksir sendiri, bila dimungkinkan dapat dibantu kurator seni."
                        style="cursor: pointer;"></i>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaBarangAntik" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk stok barang dagangan</label>
                <i class="ri-information-line" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Contoh bagi pedagang yang harus melunasi cicilan hutang atas barang yang diperdagangkan."
                        style="cursor: pointer;"></i>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaBarangDagang" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk lainnya</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaLainnya" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Harta dalam bentuk piutang lancar</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaPiutangLancar" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah Harta</strong></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedJumlahHarta" placeholder="0" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Hutang jatuh tempo saat membayar kewajiban zakat</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHutangJatuhTempo" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Jumlah harta yang dihitung zakatnya</strong>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHartaDihitungZakat" placeholder="0" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Masukan harga emas saat ini (dalam gram)
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedHargaEmas" placeholder="0">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Besar nisab zakat maal per tahun (85 gram)</strong>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control"
                        wire:model.change="formattedNisab" placeholder="0" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat maal?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            {{-- <div class="col-12">
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
            </div> --}}
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
