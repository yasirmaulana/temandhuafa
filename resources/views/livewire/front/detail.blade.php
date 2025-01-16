<main class="position-relative">

    @livewire('header')
    {{-- {{ dd($campaign) }} --}}
    <header class="learning-header overflow-hidden">
        <div class="watch-video">
            <div class="video-header" id="video-header">
                <img src="{{ $campaign->image }}" class="img-fluid" alt="">
            </div>
        </div>
    </header>

    <section class="video-name-section pt-3">
        <div class="custom-container">
            <div class="name-title">
                <h4>{{ $campaign->title }}</h4>
                <h5 class="fw-bolder text-success">Rp 0</h5>
                <div class="popular-detail">
                    <div class="d-flex justify-content-between mt-2">
                        <p class="theme-color">Terkumpul dari kebutuhan
                            <strong>{{ 'Rp. ' . number_format($campaign->target_amount, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 71%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-4 mb-2 ms-3 mx-3 d-flex justify-content-end">
        <div id="social-links">
            <ul>
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/campaign/' . $campaign->slug) }}"
                        class="social-button " id="" title="" rel="">
                        <i class="ri-facebook-box-fill"></i>
                    </a>
                </li>
                {{-- <li><a href="https://twitter.com/intent/tweet?text=Muliakan+Guru%2C+Jalan+Keberkahan&amp;url=https://temandhuafa.id/campaign/wakaf-air-alirkan-pahala-selamanya"
                        class="social-button " id="" title="" rel=""><span
                            class="fab fa-twitter"></span></a></li>
                <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=https://temandhuafa.id/campaign/wakaf-air-alirkan-pahala-selamanya&amp;title=Muliakan+Guru%2C+Jalan+Keberkahan&amp;summary=Extra+linkedin+summary+can+be+passed+here"
                        class="social-button " id="" title="" rel=""><span
                            class="fab fa-linkedin"></span></a></li> --}}
                <li><a target="_blank" href="https://wa.me/?text={{ url('/campaign/' . $campaign->slug) }}"
                        class="social-button " id="" title="" rel="">
                        <i class="ri-whatsapp-fill"></i>
                    </a></li>
                <li><a target="_blank"
                        href="https://telegram.me/share/url?url={{ url('/campaign/' . $campaign->slug) }}"
                        class="social-button " id="" title="" rel="">
                        <i class="ri-telegram-fill"></i></a></li>
            </ul>
        </div>
    </div>

    <section class="custom-container pt-3">
        <div class="row">
            <div class="col-md-12 mb-4">
                <ul id="tabs" class="nav nav-tabs nav-fill nav-tabs-nostyle">
                    <li class="nav-item">
                        <a href="#home1" data-bs-target="#home1" data-bs-toggle="tab" class="nav-link active">
                            <i class="ri-information-line"></i>
                            Informasi
                        </a>
                    </li>
                    <li class="nav-item"><a href="#profile1" data-bs-target="#profile1" data-bs-toggle="tab"
                            class="nav-link">
                            <i class="ri-booklet-fill"></i>
                            Laporan
                            <span class="badge rounded-pill bg-danger">
                                Segera hadir
                            </span>
                        </a>
                    </li>
                </ul>
                <div id="tabsContent" class="tab-content p-2 border border-top-0 rounded">
                    <div id="home1" class="tab-pane fade active show">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-blog-container p-2">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="d-inline-flex mt-2">
                                                <div class="me-2 flex-fill">
                                                    <img src="{{ asset('assets/img/favicon.png') }}" width="40px"
                                                        alt="Rounded circle Image" class="rounded-circle border">
                                                    {{-- <img src="https://placehold.co/40x40" alt="Rounded circle Image"
                                                        class="rounded-circle"> --}}
                                                </div>
                                                <div class="flex-fill">
                                                    <h5 class="text-dark">Temandhuafa
                                                        <i class="ri-shield-check-line text-success fw-bolder"></i>
                                                    </h5>
                                                    <p>Identitas terverifikasi</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 py-2"></div>
                                    </div>
                                    <div class="quotes-details">
                                        {!! $campaign->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="profile1" class="tab-pane fade">Belum ada laporan</div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    @livewire('footer')

    <div class="mobile-style-1 border p-3 bg-light">
        <div class="row position-fixed bottom-0 start-0 end-0 bg-white p-3 shadow g-1">
            <div class="col-2">
                <a href="/" wire:navigate class="btn btn-secondary w-100">
                    <i class="ri-arrow-go-back-line"></i>
                </a>
            </div>
            <div class="col-10">
                <a href="{{ url('checkout/' . $campaign->slug) }}" wire:navigate class="btn btn-success w-100">
                    <i class="ri-hand-heart-line"></i>
                    <span class="fw-bold">
                        Donasi Sekarang
                    </span>
                </a>
            </div>
        </div>
    </div>
</main>
