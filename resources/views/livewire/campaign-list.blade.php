<div>
    <div class="mt-4 px-3">
        <h4><strong>Pengumpulan Dana Darurat</strong></h4>
    </div>
    <section class="section-t-space popular-course-section  pb-4">
        <div class="custom-container">
            <div class="row g-4">
                @foreach ($campaigns as $campaign)
                    <div class="col-12">
                        <div class=" p-0 shadow">
                            <div class="d-flex">
                                <div class="col-6 d-flex align-items-center">
                                    <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate>
                                        <img src="{{ $campaign->image }}" class="img-fluid rounded-start" alt="">
                                    </a>
                                </div>
                    
                                <div class="col-6 m-2 flex-fill d-flex flex-column">
                                    <div class="mb-3">
                                        <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate>
                                            <h5 class="fw-bold">{{ $campaign->title }}</h5>
                                        </a>
                                        <span class="text-muted small">BAZNAS Hub</span>
                                        <i class="ri-shield-check-line text-success fw-bolder"></i>
                                    </div>
                    
                                    <div class="mt-auto">
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 71%;"></div>
                                        </div>
                                    </div>
                    
                                    <div class="mt-3">
                                        <span class="text-muted small">Terkumpul</span>
                                        <p class="title-color text-primary fw-bold m-0">Rp 1,000,000,000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </section>

</div>
