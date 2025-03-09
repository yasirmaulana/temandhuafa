<div>
    <div class="blog-post">
        <div class="post-body">
            <p>Zakat yang dikeluarkan terhadap hewan ternak yang dimiliki. Ternak yang wajib dizakati adalah ternak
                sudah satu tahun dalam perawatan dan digembalakan.
            </p>
            <p>Nishab: 30-39 ekor sapi zakatnya 1 ekor anak sapi yang beumur dua tahun (tabi').
                40 ekor sapi zakatnya 1 ekor anak sapi yang berumur tiga tahun (musinnah). Berlaku untuk
                kelipatannya
            </p>
            <p>
                Nishab: 40-120 ekor kambing zakatnya 1 ekor kambing. 121-200 ekor kambing zakatnya 2 ekor kambing.
                201-300 ekor kambing zakatnya 3 ekor kambing. 301-400 ekor kambing zakatnya 4 ekor kambing.
                400++ ekor kambing zakatnya 4 ekor kambing ditambah 1 ekor setiap kelipatan 100.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="form-group boxed">
            <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                <select class="form-select custom-select text-secondary" wire:model.change="selectedTernak">
                    <option value="">-- Pilih Jenis Ternak --</option>
                    <option value="kambing">Kambing/Domba</option>
                    <option value="sapi">Sapi/Kerbau</option>
                </select>
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2">
                <input type="number" id="numberInput" class="form-control" wire:model.change="formattedJumlahTernak"
                    placeholder="Isi jumlah hewan ternak">
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2">
                <label class="form-label">Apakah saya wajib membayar zakat peternakan?</label> test
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>

        </div>

        @if($wajibZakat == 'Ya')
            <div class="input-wrapper wide-block pb-2 pt-2">
                <label class="form-label">Harga jual komoditas (per ekor)<span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" class="form-control" wire:model.change="formattedHargaTernak">
                </div>
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2">
                <label class="form-label">Jumlah Zakat yang harus saya tunaikan</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" id="numberInput" class="form-control" wire:model.change="formattedJumlahBayar"
                        placeholder="0" disabled>
                </div>
            </div>
            <div class="appBottomMenu container">
                <div class="col-12">
                    <a href="/checkout/{{ 'peternakan-' . $jumlahBayar }}" class="btn-block">
                        <button type="button" class="btn btn-success btn-lg btn-block">Bayar Zakat Sekarang</button>
                    </a>
                </div>
            </div>
        @elseif($wajibZakat == 'Tidak')
            <div class="input-wrapper wide-block pb-2 pt-2">
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
