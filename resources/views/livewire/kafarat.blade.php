<main class="position-relative">

    @livewire('header')

    <div class="header-divider"></div>

    <img src="{{ asset('assets/img/image.jpg') }}" class="img-fluid" alt="">

    <div class="container p-4">
        <h3 class="text-success mb-2"><strong>Kafarat</strong></h3>

        <div>
            <p>Kafarat sendiri berarti denda yang harus dibayar karena melanggar larangan Allah atau melanggar janji.
                Kafarat ditunaikan dikarenakan melakukan sebuah kesalahan agar tidak lagi mendapat dosa akibat melakukan
                kesalahan tersebut.
            </p>
            <div class="row g-3">
                <div class="col-12">
                    <label class="col-sm-12 col-form-label">Jenis Kafarat</label>
                    <div class="col-sm-12">
                        <select class="form-select" wire:model.change="selectedKafarat">
                            <option value="sumpahPalsu">Sumpah Palsu</option>
                            <option value="ila">Ila'</option>
                            <option value="dzihar">Dzihar</option>
                            <option value="jimak">Jimak</option>
                        </select>
                    </div>
                </div>
                {{ $selectedKafarat }}
                @if ($denda)
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $denda }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="col-12">
                    <label class="form-label">Berapa kali anda melanggar kafarat tersebut</label>
                    <div class="input-group">
                        <input type="number" id="numberInput" class="form-control"
                            wire:model.change="formattedJumlahMelanggarKafarat">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Biaya rata-rata sekali makan (1 mud - <i>sesuai kemampuan)</i>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="number" id="numberInput" class="form-control"
                            wire:model.change="formattedBiayaMakan" placeholder="0">
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
            </div>

            <p></p>

        </div>

        <div class="col-12">
            <a href="/checkout/{{ 'kafarat-' . $jumlahBayar }}" class="btn w-100"
                style="background-color: #8CC800;">
                <i class="ri-hand-heart-line text-white"></i>
                <span class="fw-bold text-white">
                    Bayar Kafarat Sekarang
                </span>
            </a>
        </div>

    </div>

    <div class="divider"></div>

    @livewire('footer')

    @livewire('nav-bar')
</main>
