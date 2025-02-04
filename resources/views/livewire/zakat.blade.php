<main class="position-relative">

    @livewire('header')

    <div class="header-divider"></div>

    <img src="{{ asset('assets/img/image.jpg') }}" class="img-fluid" alt="">

    <div class="container p-4">
        <h3 class="text-success"><strong>Hitung Zakatmu Sekarang</strong></h3>
        <div class="row mb-3">
            <label class="col-sm-12 col-form-label">Pilih jenis zakat di bawah ini.</label>
            <div class="col-sm-12">
                <select class="form-select" wire:model.change="selectedZakat">
                    <option value="">-- Pilih Jenis Zakat --</option>
                    <option value="zakat-emas-perak">Zakat Emas & Perak</option>
                    <option value="zakat-pertanian">Zakat Pertanian</option>
                    {{-- <option value="zakat-peternakan">Zakat Peternakan</option> --}}
                    <option value="zakat-maal">Zakat Maal</option>
                    <option value="zakat-perniagaan">Zakat Perniagaan</option>
                    <option value="zakat-penghasilan">Zakat Penghasilan</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if ($selectedZakat)
                    @livewire($selectedZakat, [], key($selectedZakat))
                @endif
            </div>
        </div>
    </div>

    <div class="divider"></div>

    @livewire('footer')

    @livewire('nav-bar')

</main>
