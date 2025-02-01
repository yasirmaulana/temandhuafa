<main class="position-relative">
    <style>
        .emoji {
            font-size: 2rem;
            color: #ffc107;
            font-size: 1rem;
            margin-right: 5px;
        }

        .emoji-love {
            color: #ff5e57;
        }
    </style>
    <style>
        .custom-font-size {
            font-size: 11px;
        }

        .hidden-zero {
            visibility: hidden;
        }
    </style>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    @livewire('header')
    <div class="header-divider"></div>

    <p></p>
    <section class="">
        <form wire:submit="createPayment">
            {{ csrf_field() }}
            <div class="custom-container mb-4">
                <div class="d-flex bd-highlight align-items-center">
                    @if (!in_array($this->titleRowBayar, ['infaq', 'maal', 'penghasilan', 'fidyah', 'kafarat']))
                        <div class="bd-highlight">
                            <a href="{{ url('campaign/' . $campaign->slug) }}" class="btn btn-default border shadow-sm ">
                                <i class="ri-arrow-go-back-line text-warning"></i>
                            </a>
                        </div>
                        <div class="flex-fill bd-highlight justify-content-center text-center">
                            <div class="border shadow-sm rounded height py-3">
                                <h4 class="fw-bold">{{ $campaign->title }}</h4>
                            </div>
                        </div>
                    @else
                        <div class="bd-highlight">
                            @if ($titleBayar == 'Infaq')
                                <a href="{{ url('/') }}" class="btn btn-default border shadow-sm">
                                    <i class="ri-arrow-go-back-line text-warning"></i>
                                </a>
                            @else
                                <a href="{{ url('zakat/') }}" class="btn btn-default border shadow-sm">
                                    <i class="ri-arrow-go-back-line text-warning"></i>
                                </a>
                            @endif
                        </div>
                        <div class="flex-fill bd-highlight justify-content-center text-center">
                            <div class="border shadow-sm rounded height py-3">
                                <h4 class="fw-bold">{{ $titleBayar }}</h4>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="title-2 mt-4">
                    @if ($titleBayar == 'Infaq')
                        <h3>Nominal Infak</h3>
                    @elseif($titleBayar == 'Infaq')
                        <h3>Nominal Zakat</h3>
                    @elseif($titleBayar == 'Wakaf')
                        <h3>Nominal Wakaf</h3>
                    @else
                        <h3>Nominal Donasi</h3>
                    @endif
                </div>
                @if (!$isZiswaf)
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(30000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-smile emoji"></i>
                            <span class="fw-bold custom-font-size">
                                Rp30.000<span class="hidden-zero">0</span>
                            </span>

                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(50000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-smile emoji"></i>
                            <span class="fw-bold custom-font-size">Rp50.000<span class="hidden-zero">0</span></span>
                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(95000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-laughing emoji"></i>
                            <span class="fw-bold custom-font-size">Rp95.000<span class="hidden-zero">0</span></span>
                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(100000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-laughing emoji"></i>
                            <span class="fw-bold custom-font-size">Rp100.000</span>
                        </div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(250000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-heart-eyes emoji"></i>
                            <span class="fw-bold custom-font-size">Rp250.000</span>
                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(500000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-heart-eyes emoji"></i>
                            <span class="fw-bold custom-font-size">Rp500.000</span>
                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(750000)" style="cursor: pointer;">
                            <i class="bi bi-emoji-heart-eyes emoji"></i>
                            <span class="fw-bold custom-font-size">Rp750.000</span>
                        </div>
                        <div class="p-2 flex-grow-1 border text-center d-flex flex-column align-items-center justify-content-center"
                            wire:click="setAmount(950000)" style="cursor: pointer;">
                            <i class="bi bi-heart-fill emoji emoji-love"></i>
                            <span class="fw-bold custom-font-size">Rp950.000</span>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3 rounded-0">
                            <div class="input-group">
                                <span class="input-group-text rounded-0 fw-bold" id="basic-addon1">Rp.</span>
                                <input type="text" id="numberInput" class="form-control rounded-0 fw-bold"
                                    wire:model.change="formattedAmount" placeholder="0" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-fill bd-highlight">
                    <div class="form-check">
                        <input wire:model="infaqSistem" wire:click="togle" class="form-check-input" type="checkbox">
                        <label class="form-check-label small">Infaq sistem 2.000</label>
                    </div>
                </div>

                <hr class="my-3">

                <p class="text-center fs-6">
                    <a href="" class="text-decoration-underline fw-bold text-success" data-bs-toggle="modal"
                        data-bs-target="#basicModal">Masuk</a> atau lengkapi
                    data dibawah ini:
                </p>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" wire:model="namaLengkap" class="form-control" placeholder="Nama lengkap"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" wire:model="email" class="form-control" placeholder="Alamat Email Anda"
                        required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="number" wire:model="phone" class="form-control" placeholder="Nomor Telepon"
                        required>
                </div>

                @if (!$isZiswaf)
                    <div class="d-flex flex-fill bd-highlight">
                        <div class="form-check">
                            <input wire:model="anonim" class="form-check-input" type="checkbox">
                            <label class="form-check-label small">Sembunyikan nama saya (Donasi Teman Baik)</label>
                        </div>
                    </div>

                    <hr class="my-3">

                    <div class="mb-3">
                        <label for="doa" class="form-label small fw-bold">Doa dan Dukungan (opsional)</label>
                        <textarea wire:model="doa" class="form-control" rows="4"
                            placeholder="Tulis doa untuk penggalang dana atau dirimu"></textarea>
                    </div>
                @endif
            </div>

            <div class="mobile-style-1 border p-3 bg-light">
                <div class="row g-1 align-items-center justify-content-between">
                    <div class="col-auto">
                        <span class="text-muted small">Total Donasi</span>
                        <div class="fw-bold text-danger fs-5">Rp
                            {{ number_format($totalAmount, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <button type="submit" class="btn btn-success" id="pay-button">
                            <span class="fw-bold">Lanjut Pembayaran</span>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </section>

    @livewire('footer')

    <!-- Basic Modal -->

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Basic Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit.
                    Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur
                    nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->


</main>
