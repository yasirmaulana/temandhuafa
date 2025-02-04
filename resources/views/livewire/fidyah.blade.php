<main class="position-relative">

    @livewire('header')

    <div class="header-divider"></div>

    <img src="{{ asset('assets/img/image.jpg') }}" class="img-fluid" alt="">

    <div class="container p-4">
        <h3 class="text-success mb-2"><strong>Fidyah</strong></h3>

        <div>
            <p>Fidyah adalah sejumlah harta benda dalam kadar tertentu yang wajib diberikan kepada fakir miskin sebagai
                ganti suatu ibadah yang telah ditinggalkan.</p>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Jumlah Hari tidak puasa</label>
                    <div class="input-group">
                        <input type="number" id="numberInput" class="form-control"
                            wire:model.change="jumlahHariTidakPuasa" placeholder="0">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Biaya rata-rata makan 1 hari <i>(sesuai kemampuan)</i>
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
            <div class="mb-2">

                <strong style="font-size: 1.2em;" class="text-success">
                    <i class="ri-hand-heart-fill"></i> Niat Fidyah
                </strong>
            </div>

            <p>Untuk Orang Sakit</p>
            <p style="font-size: 1.5em;">
                نَوَيْتُ أَنْ أُخْرِجَ فِدْيَةَالْمَرَضِ الَّذِيْ لاَ يُرْجٰى بَرَؤُهُ فَرْضًاشَرْعًا لِلهِ تَعَالَى
            </p>
            <p>Untuk Wanita hamil/menyusui</p>
            <p style="font-size: 1.5em;">
                نَوَيْتُ أَنْ أُخْرِجَ فِدْيَةَالْمُرْضِعِ فَرْضًاشَرْعًا  لِلهِ تَعَالَى
            </p>
            {{-- </div> --}}

            <div class="col-12">
                <a href="/checkout/{{ 'fidyah-' . $jumlahBayar }}" class="btn w-100" style="background-color: #8CC800;">
                    <i class="ri-hand-heart-line text-white"></i>
                    <span class="fw-bold text-white">
                        Bayar Fidyah Sekarang
                    </span>
                </a>
            </div>

        </div>

    </div>

    <div class="divider"></div>

    @livewire('footer')

    @livewire('nav-bar')

</main>
