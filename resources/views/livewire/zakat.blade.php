<main class="position-relative">

    @livewire('header')
    <div class="header-divider"></div>


    <img src="{{ asset('assets/img/image.jpg') }}" class="img-fluid" alt="">

    <section class="custom-container py-3">

        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="zakat-maal-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-zakat-maal" type="button" role="tab"
                    aria-controls="zakat-maal" aria-selected="true">
                    <i class="ri-scales-3-fill"></i>
                    {{-- Zakat Maal --}}
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="zakat-profesi-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-zakat-profesi" type="button" role="tab"
                    aria-controls="zakat-profesi" aria-selected="false">
                    <i class="ri-briefcase-fill"></i>
                    {{-- Zakat Penghasilan --}}
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="fidyah-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-fidyah" type="button" role="tab" aria-controls="Fidyah"
                    aria-selected="false">
                    <i class="ri-restaurant-fill"></i>
                    {{-- Fidyah --}}
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="kafarat-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-kafarat" type="button" role="tab" aria-controls="kafarat"
                    aria-selected="false">
                    <i class="ri-hand-coin-fill"></i>
                    {{-- Kafarat --}}
                </button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-zakat-maal" role="tabpanel"
                aria-labelledby="zakat-maal-tab">
                @livewire('zakat-maal')
            </div>
            <div class="tab-pane fade" id="bordered-justified-zakat-profesi" role="tabpanel"
                aria-labelledby="zakat-profesi-tab">
                @livewire('zakat-penghasilan')
            </div>
            <div class="tab-pane fade" id="bordered-justified-fidyah" role="tabpanel" aria-labelledby="fidyah-tab">
                @livewire('fidyah')
            </div>
            <div class="tab-pane fade" id="bordered-justified-kafarat" role="tabpanel" aria-labelledby="kafarat-tab">
                @livewire('kafarat')
            </div>
        </div>

    </section>

    <div class="divider"></div>

    @livewire('footer')

    @livewire('nav-bar')

</main>
