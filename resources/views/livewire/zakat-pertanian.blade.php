<div>
    <div class="blog-post">
        <div class="post-body">
            <p>Zakat yang dikeluarkan dari hasil tumbuh-tumbuhan atau tanaman yang
                bernilai ekonomis seperti biji-bijian, umbi-umbian, sayur-mayur, buah-buahan, tanaman hias,
                rumput-rumputan,
                dedaunan, dan lain-lain.
            </p>
            <p>Nisab Zakat sama dengan/setara dengan 207 kg beras atau 847 kg gabah. Zakatnya 5% jika
                perairan berbayar dan 10% jika perairannya menggunakan tadah hujan.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="form-group boxed">
            <div class="input-wrapper wide-block pb-2 pt-2 g-4">
                <label class="col-sm-12 col-form-label">Pilih Jenis Pertanian</label>
                <select class="form-select custom-select text-secondary" wire:model.change="selectedHasilPertanian">
                    <option value="gabah">Gabah</option>
                    <option value="beras">Beras</option>
                </select>
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2">
                <input type="text" id="numberInput" class="form-control"
                    wire:model.change="formattedJumlahHasilPertanian" placeholder="input hasil panen (kg)">
            </div>
            <div class="input-wrapper wide-block pb-2 pt-2">
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
            <div class="input-wrapper wide-block pb-2 pt-2">
                <label class="form-label">Apakah saya wajib membayar zakat pertanian?</label>
                <input type="text" class="form-control" wire:model.change="wajibZakat" disabled>
            </div>

            @if ($wajibZakat == 'Ya')
                <div class="input-wrapper wide-block pb-2 pt-2">
                    <label class="form-label">Harga jual komoditas (per Kg)<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" wire:model.change="formattedHargaJual">
                    </div>
                </div>
                <div class="input-wrapper wide-block pb-2 pt-2">
                    <label class="form-label">Jumlah Zakat yang harus saya tunaikan</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" id="numberInput" class="form-control"
                            wire:model.change="formattedJumlahBayar" placeholder="0" disabled>
                    </div> 
                </div>
                <div class="appBottomMenu container">
                    <div class="col-12">
                        <a href="/checkout/{{ 'pertanian-' . $jumlahBayar }}" class="btn-block">
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

</div>
