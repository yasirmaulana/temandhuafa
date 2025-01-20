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
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    @livewire('header')

    <section class="section-t-space">
        <form wire:submit="createPayment">
            {{ csrf_field() }}
            <div class="custom-container mb-4">
                <div class="d-flex bd-highlight align-items-center">
                    <div class="bd-highlight">
                        <a href="{{ url('campaign/' . $campaign->slug) }}" class="btn btn-default border shadow-sm">
                            <i class="ri-arrow-go-back-line text-warning"></i>
                        </a>
                    </div>
                    <div class="flex-fill bd-highlight justify-content-center text-center">
                        <div class="border shadow-sm rounded height py-3">
                            <h4 class="fw-bold">{{ $campaign->title }}</h4>
                        </div>
                    </div>
                </div>

                <div class="title-2 mt-4">
                    <h3>Nominal Donasi</h3>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight border text-center" wire:click="setAmount(30000)"
                        style="cursor: pointer;">
                        <i class="bi bi-emoji-smile emoji"></i>
                        <span class="fw-bold">Rp30.000</span>
                    </div>
                    <div class="p-2 flex-fill bd-highlight border text-center" wire:click="setAmount(50000)"
                        style="cursor: pointer;">
                        <i class="bi bi-emoji-laughing emoji"></i>
                        <span class="fw-bold">Rp50.000</span>
                    </div>
                    <div class="p-2 flex-fill bd-highlight border text-center" wire:click="setAmount(95000)"
                        style="cursor: pointer;">
                        <i class="bi bi-emoji-heart-eyes emoji"></i>
                        <span class="fw-bold">Rp95.000</span>
                    </div>
                    <div class="p-2 flex-fill bd-highlight border text-center" wire:click="setAmount(100000)"
                        style="cursor: pointer;">
                        <i class="bi bi-heart-fill emoji emoji-love"></i>
                        <span class="fw-bold">Rp100.000</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3 rounded-0">
                            <span class="input-group-text rounded-0 fw-bold">Rp</span>
                            <input type="number" wire:model.change="amount"
                                class="form-control rounded-0 form-control-lg fw-bold" placeholder="0" required>
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
                    <a href="/login" wire:navigate class="text-decoration-underline fw-bold">Masuk</a> atau lengkapi
                    data dibawah ini:
                </p>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" wire:model="namaLengkap" class="form-control" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" wire:model="email" class="form-control" placeholder="Alamat Email Anda">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="text" wire:model="phone" class="form-control" placeholder="Nomor Telepon">
                </div>

                <div class="d-flex flex-fill bd-highlight">
                    <div class="form-check">
                        <input wire:model="anonim" class="form-check-input" type="checkbox">
                        <label class="form-check-label small">Sembunyikan nama saya (Donasi Anonim)</label>
                    </div>
                </div>

                <hr class="my-3">

                <div class="mb-3">
                    <label for="doa" class="form-label small fw-bold">Doa dan Dukungan (opsional)</label>
                    <textarea wire:model="doa" class="form-control" rows="4"
                        placeholder="Tulis doa untuk penggalang dana atau dirimu"></textarea>
                </div>
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
</main>
