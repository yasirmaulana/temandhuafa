<main class="position-relative">
    @livewire('header')
    @livewire('nav-bar')
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

    <section class="section-t-space">
        <div class="custom-container mb-4">
            <div class="d-flex bd-highlight align-items-center">
                <div class="bd-highlight">
                    <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate
                        class="btn btn-default border shadow-sm">
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
                <div class="p-2 flex-fill bd-highlight border text-center">
                    <i class="bi bi-emoji-smile emoji"></i>
                    <span class="fw-bold">
                        Rp30.000
                    </span>
                </div>
                <div class="p-2 flex-fill bd-highlight border text-center">
                    <i class="bi bi-emoji-laughing emoji"></i>
                    <span class="fw-bold">
                        Rp50.000
                    </span>
                </div>
                <div class="p-2 flex-fill bd-highlight border text-center">
                    <i class="bi bi-emoji-heart-eyes emoji"></i>
                    <span class="fw-bold">
                        Rp95.000
                    </span>
                </div>
                <div class="p-2 flex-fill bd-highlight border text-center">
                    <i class="bi bi-heart-fill emoji emoji-love"></i>
                    <span class="fw-bold">
                        Rp100.000
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3 rounded-0">
                        <span class="input-group-text rounded-0 fw-bold">Rp</span>
                        <input type="number" wire:model="amount" class="form-control rounded-0 form-control-lg fw-bold"
                            placeholder="0" required>
                    </div>
                </div>
            </div>

            {{-- <div class="d-flex flex-fill bd-highlight">
                <div class="flex-fill bd-highlight">
                    <div class="form-check mb-3">
                        <input wire:model="infaqSistem" class="form-check-input" type="checkbox">
                    </div>
                </div>
                <div class="w-100 flex-grow-1 bd-highlight">
                    <label class="form-check-label small">
                        infaq sistem 2.000
                    </label>
                </div>
            </div> --}}

            <div class="d-flex flex-fill bd-highlight">
                <div class="form-check">
                    <input wire:model="infaqSistem" class="form-check-input" type="checkbox">
                    <label class="form-check-label small">Infaq sistem 2.000</label>
                </div>
            </div>

            {{-- <div class="d-flex flex-fill bd-highlight">
                <div class="flex-fill bd-highlight">
                    <div class="form-check mb-3">
                        <input wire:model="infaqSistem" class="form-check-input" type="checkbox">
                    </div>
                </div>
                <div class="w-100 flex-grow-1 bd-highlight">
                    <label class="form-check-label small">
                        infaq sistem 2.000
                    </label>
                </div>
            </div> --}}

            <hr class="mt-0">

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
            {{-- 
            <div class="mb-1">
                <label for="name" class="form-label">
                    Nama Lengkap
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" wire:model="namaLengkap" placeholder="Nama lengkap">
            </div>

            <div class="mb-2">
                <label for="email" class="form-label">
                    email
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" wire:model="email" value=""
                    placeholder="Alamat Email Anda">
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label">
                    Telepon
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" wire:model="phone" placeholder="Nomor Telepon">
            </div> --}}


            <div class="d-flex flex-fill bd-highlight">
                <div class="w-100 flex-grow-1 bd-highlight">
                    <label class="form-check-label small" for="checkbox">
                        Sembunyikan nama saya (Donasi Anonim)
                    </label>
                </div>
                <div class="flex-fill bd-highlight align-content-end">
                    <div class="form-check mb-3">
                        <input id="checkbox" name="isAnonim" class="form-check-input" type="checkbox" value="">
                    </div>
                </div>
            </div>

            <div class="d-flex flex-fill bd-highlight">
                <div class="w-100 flex-grow-1 bd-highlight">
                    <label class="form-check-label small fw-bold" for="isTestimonial">
                        Sertakan doa dan dukungan (opsional)
                    </label>
                </div>

            </div>
            <div class="testimonialBox mb-10 ">
                <textarea class="form-control mt-2" rows="4"
                    placeholder="Tulis doa untuk penggalang dana atau dirimu agar bisa diamini oleh orang shaleh" id="testimonial"
                    wire:model="doa">
                    </textarea>
            </div>

        </div>

        <div class="mobile-style-1 border p-3 bg-light">
            <div class="row position-fixed bottom-0 start-0 end-0 bg-white p-3 shadow g-1">
                <div class="col-3">
                    <span class="text-muted small">Total Donasi</span>
                    <div class="fw-bold text-danger fs-5">Rp{{ $totalAmount }}</div>
                </div>
                <div class="col-9">
                    <button wire:click="bayar" class="btn btn-success w-100">
                        <span class="fw-bold">
                            Lanjut Pembayaran
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- </form> --}}

    </section>

</main>
