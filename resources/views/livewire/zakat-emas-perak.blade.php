<div>
    <div class="blog-post">
        <div class="post-body">
            <p>Zakat yang dikenakan atas Emas dan Perak.</p>
            <p>Nishab Emas: 70 gram (berat 1 dinar = 3,5 gram), Zakat 1,75 gram emas. Kemudian setiap kelipatan 14 gram
                emas ditambah 0,35 gram emas</p>
            <p>Nishab Perak: 500 gram (berat 1 dirham = 2,5 gram), Zakat 12,5 gram perak. Kemudian setiap kelipatan 100
                gram perak ditambah 2,5 gram perak</p>
        </div>
    </div>
    <div class="container">
        <div class="form-group boxed">
            <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                <select class="form-select custom-select text-secondary" wire:model.change="selectedLogam">
                    <option value="">-- Pilih Jenis Zakat --</option>
                    <option value="emas">Emas</option>
                    <option value="perak">Perak</option>
                </select>
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                <input type="number" id="numberInput" class="form-control" wire:model.change="formattedEmasPerak"
                    placeholder="berat {{ $selectedLogam }} yang dimiliki (gram)">
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat {{ $selectedLogam }}?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>

            @if ($wajibZakat == 'Ya')
                <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                    <label class="form-label">Masukan harga {{ $selectedLogam }} saat ini (dalam rupiah)
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedHargaEmasPerak" placeholder="Rp">
                    </div>
                </div>

                <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                    <label class="form-label">
                        <strong>Jumlah yang saya harus bayar per tahun </strong>
                    </label>
                    <div class="input-group">
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedJumlahBayar" placeholder="0" disabled>
                    </div>
                </div>
                <div class="input-wrapper wide-block pb-2 pt-2 g-4">
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
                </div>
                <div class="appBottomMenu container">
                    <div class="col-12">
                        <a href="/checkout/{{ $selectedLogam . '-' . $jumlahBayar }}" class="btn-block">
                            <button type="button" class="btn btn-success btn-lg btn-block">
                                Bayar Zakat {{ $selectedLogam }} Sekarang
                            </button>
                        </a>
                    </div>
                </div>
            @elseif($wajibZakat == 'Tidak')
                <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                    <span class="text-danger">Belum memenuhi syarat wajib zakat, namun tetap dapat beramal dengan</span>
                </div>
                <div class="appBottomMenu container">
                    <div class="col-12">
                        <a href="/checkout/infaq-0" class="btn-block">
                            <button type="button" class="btn btn-success btn-lg btn-block">Berinfak</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
