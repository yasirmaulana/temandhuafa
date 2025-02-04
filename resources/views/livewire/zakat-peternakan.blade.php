<div>
    <div class="container">
        <p>zakat yang dikeluarkan terhadap hewan ternak yang dimiliki. Ternak yang wajib dizakati adalah ternak sudah
            satu tahun dalam perawatan dan digembalakan. Untuk 5 ekor unta zakatnya adalah 1 ekor kambing, untuk 25 ekor
            unta adalah 1 ekor unta. Untuk 40 - 120 ekor zakatnya 1 ekor kambing, untuk 121 - 200 zakatnya 2 ekor
            kambing. Untuk 30 sapi/kerbau zakatnya 1 ekor sapi/kerbau, untuk 60 ekor sapi/kerbau zakatnya 2 ekor
            sapi/kerbau. Untuk kuda dan hewan ternak lainnya nisabnya adalah setara dengan nisab sapi/kerbau. Zakat
            Peternakan dibayarkan setiap tahun sekali.</p>
        <div class="row g-3">
            <div class="col-12">
                <label class="col-sm-12 col-form-label">Pilih Jenis Hewan Ternak</label>
                <div class="col-sm-12">
                    <select class="form-select" wire:model.change="selectedLogam">
                        <option value="gabah">Domba/Biri-biri/Kambing</option>
                        <option value="beras">Sapi/Kerbau/Kuda</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Jumlah Hewan Ternak</label>
                <div class="input-group">
                    <input type="number" id="numberInput" class="form-control" wire:model.change="formattedEmasPerak"
                        placeholder="isi jumlah hewan ternak">
                    <span class="input-group-text" id="basic-addon1">Kg</span>
                </div>
            </div>

            
            <div class="col-12">
                <label class="form-label">
                    <strong>Apakah saya wajib membayar zakat peternakan?</strong>
                </label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">
                    <strong>Jumlah yang saya harus bayar</strong>
                </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedJumlahBayar"
                        placeholder="0" disabled>
                </div>
            </div>
        </div>

        <p></p>
        {{-- <strong style="font-size: 1.2em;" class="text-success">
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
        </p> --}}
    </div>

    <div class="col-12">
        <a href="/checkout/{{ 'maal-' . $jumlahBayar }}" class="btn w-100" style="background-color: #8CC800;">
            <i class="ri-hand-heart-line"></i>
            <span class="fw-bold">
                Bayar Zakat Sekarang
            </span>
        </a>
    </div>

</div>
