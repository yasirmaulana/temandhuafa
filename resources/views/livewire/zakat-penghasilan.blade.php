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
                <input type="number" class="form-control" wire:model.change="hartaTabungan" required>
            </div>
            <div class="col-12">
                <label class="form-label">Penghasilan lain-lain saya per bulan</label>
                <input type="number" class="form-control" wire:model.change="hartaLM">
            </div>
            <div class="col-12">
                <label class="form-label">Hutang/Cicilan saya untuk kebutuhan pokok</label>
                <input type="number" class="form-control" wire:model.change="hartaSuratBerharga">
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Jumlah penghasilan per bulan</strong></label>
                <input type="number" class="form-control" wire:model.change="hartaProperti" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">
                    Masukan harga emas saat ini (per gram)
                    <span class="text-danger">*</span>
                </label>
                <input type="number" class="form-control" wire:model.change="hartaKendaraan">
            </div>
            <div class="col-12">
                <label class="form-label"><strong>Besarnya nishab zakat penghasilan per bulan</strong></label>
                <input type="number" class="form-control" wire:model.change="hartaBarangAntik" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Apakah saya wajib membayar zakat penghasilan?</label>
                <input type="number" class="form-control" wire:model.change="hartaBarangDagang" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Jumlah yang saya harus bayar per bulan</label>
                <input type="number" class="form-control" wire:model.change="hartaLainnya" disabled>
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
        <a href="/checkout/{{ 'penghasilan-' . $jumlahBayar }}" wire:navigate class="btn btn-success w-100">
            <i class="ri-hand-heart-line"></i>
            <span class="fw-bold">
                Bayar Zakat Sekarang
            </span>
        </a>
    </div>


</div>
