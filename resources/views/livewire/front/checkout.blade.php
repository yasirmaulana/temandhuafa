<main class="position-relative">


    @livewire('header')
    @livewire('nav-bar')

    <section class="section-t-space">
        <form id="getPaymentMethod"><input type="hidden" name="_token" value="QjKqYhanGtcKrSkqC6zwqNTCPVs26Sns6axjFjaK"
                autocomplete="off">
            <div class="custom-container mb-4">
                <div class="alert alert-danger alert-dismissible fade show print-error-msg d-none" role="alert">
                    <ul></ul><button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                <div class="d-flex bd-highlight align-items-center">
                    <div class="bd-highlight">
                        <a href="{{ url('campaign/' . $campaign->slug) }}" class="btn btn-default border shadow-sm">
                            <i class="ri-arrow-go-back-line text-warning"></i>
                        </a>
                    </div>
                    <div class="flex-fill bd-highlight justify-content-center text-center">
                        <div class="border shadow-sm rounded height py-3">
                            <h4>{{ $campaign->title }}</h4>
                        </div>
                    </div>
                </div>

                <div class="title-2 mt-4">
                    <h3>Nominal Donasi</h3>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight border text-center" onclick="fillAmount(100000)">
                        100,000</div>
                    <div class="p-2 flex-fill bd-highlight border text-center" onclick="fillAmount(250000)">
                        250,000</div>
                    <div class="p-2 flex-fill bd-highlight border text-center" onclick="fillAmount(500000)">
                        500,000</div>
                    <div class="p-2 flex-fill bd-highlight border text-center" onclick="fillAmount(1000000)">
                        1,000,000</div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3 rounded-0"><span class="input-group-text rounded-0"
                                id="basic-addon1">Rp</span><input type="text" id="nominal" name="nominal"
                                class="form-control rounded-0 form-control-lg" style="background: #DCF9DD"
                                data-type="currency" placeholder="0" aria-label="Username"
                                aria-describedby="basic-addon1" required><input type="hidden" id="nominal_raw">
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
                <p class="text-center fs-6"><a href="https://tarahum.id/login"
                        class="text-decoration-underline fw-bold">Masuk</a> atau lengkapi data dibawah ini:</p>
                <div class="mb-0"><label for="title" class="form-label">Panggilan <span
                            class="text-danger">(*)</span></label><select id="title" name="title"
                        class="form-select select2 form-select" required>
                        <option value=""></option>
                        <option value="bapak">Bapak</option>
                        <option value="ibu">Ibu</option>
                        <option value="saudara">Saudara</option>
                        <option value="saudari">Saudari</option>
                        <option value="kakak">Kak</option>
                    </select></div>
                <div class="mb-1"><label for="name" class="form-label">Nama Lengkap <span
                            class="text-danger">*</span></label><input id="name" type="text"
                        class="form-control form-control " name="name" value="" placeholder="Nama lengkap">
                </div>
                <div class="mb-2"><label for="email" class="form-label">email <span
                            class="text-danger">*</span></label><input id="email" type="email"
                        class="form-control form-control " name="email" value=""
                        placeholder="Alamat Email Anda"></div>
                <div class="mb-4"><label for="phone" class="form-label">Telepon <span
                            class="text-danger">*</span></label><input id="phone" type="text"
                        class="form-control form-control " name="phone" value="" placeholder="Nomor Telepon">
                </div>
                <hr class="mt-0">
                <div class="d-flex flex-fill bd-highlight">
                    <div class="w-100 flex-grow-1 bd-highlight"><label class="form-check-label small"
                            for="checkbox">Sembunyikan nama saya (Donasi Anonim)</label></div>
                    <div class="flex-fill bd-highlight align-content-end">
                        <div class="form-check mb-3"><input id="checkbox" name="isAnonim" class="form-check-input"
                                type="checkbox" value=""></div>
                    </div>
                </div>
                <div class="d-flex flex-fill bd-highlight">
                    <div class="w-100 flex-grow-1 bd-highlight"><label class="form-check-label small"
                            for="isTestimonial">Seutas Do'a (Opsional)</label></div>
                    <div class="flex-fill bd-highlight align-content-end">
                        <div class="form-check mb-3"><input id="isTestimonial" name="isTestimonial"
                                class="form-check-input" type="checkbox" value=""></div>
                    </div>
                </div>
                <div class="testimonialBox d-none">
                    <textarea class="form-control mb-4" placeholder="Seutas do'a" id="testimonial" name="testimonial"></textarea>
                </div><button class="btn btn-warning shadow">Pilih Metode Pembayaran</button>
            </div>
        </form>
    </section>

    @livewire('footer')



</main>
