<div class="container">
    <style>
        .chevron-back{
            filter: invert(1);
        }
    </style>
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="chevron Icon" class="chevron-back" height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">

        </div>
    </div>

    <div id="appCapsule">

        <div class="section mt-3 mb-0">
            <h2 class="text-primary mb-2">Hitung Zakat Maal</h2>
        </div>

        <div class="container">
            <div class="form-group boxed">
                <div class="input-wrapper wide-block pb-2 pt-2">
                    <select class="form-select custom-select text-secondary" wire:model.change="selectedZakat">
                        <option value="">-- Pilih Jenis Zakat Maal --</option>
                        <option value="zakat-peternakan">Zakat Peternakan</option>
                        <option value="zakat-pertanian">Zakat Pertanian</option>
                        <option value="zakat-emas-perak">Zakat Emas & Perak</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if ($selectedZakat)
                        @livewire($selectedZakat, [], key($selectedZakat))
                    @else
                        <div class="blog-post">
                            <div class="post-body">
                                <p>
                                    Zakat maal (harta) adalah zakat yang harus dikeluarkan dari harta tertentu yang kita
                                    miliki
                                    setelah terpenuhinya syarat umum dan khusus.
                                </p>
                                <p>
                                    Syarat umum wajib zakat: baligh, berakal sehat, merdeka, pemilik harta, pemilik hak
                                    penuh atas
                                    harta
                                    (tasharruf),
                                    dan telah memenuhi jumlah kadar minimal (nishab).
                                </p>
                                <p>
                                    Harta yang wajib dizakati: peternakan (unta, sapi/kerbau, kambing/domba), pertanian
                                    (gandum, jelai, kurma, kismis), emas, dan perak.
                                </p>
                                Berdasarkan Fiqh Ja'fari, zakat maal hanya sebatas pada sembilan harta di atas. Namun,
                                ijtihad
                                Ahlus Sunnah, menerapkan qiyas pada harta lain, seperti tabungan, surat berharga,
                                pendapatan kerja
                                dan
                                perdagangan,
                                sebagaimana yang tertuang dalam Undang-undang (UU) Republik Indonesia Nomor 23 Tahun
                                2011
                                tentang Pengelolaan Zakat.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>

        @if (!$selectedZakat)
            {{-- @livewire('nav-bar')  --}}
        @endif

    </div>

</div>