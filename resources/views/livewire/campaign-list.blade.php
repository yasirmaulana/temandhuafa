<div>
    <section class="section-t-space popular-course-section">
        <div class="custom-container mb-4">
            <div class="d-flex bd-highlight">
                <div class="flex-fill bd-highlight title px-15">
                    <h4>Mau beramal apa hari ini?</h4>
                </div>
                <div class="d-flex bd-highlight me-3 title pb-2">
                    <a href="#">
                        <i class="ri-align-left"></i>
                        Lihat semua
                    </a>
                </div>
            </div>
            <div class="row g-4">

                @foreach ($campaigns as $campaign)
                    <div class="col-12">
                        <div class="popular-box p-0">
                            <div class="d-flex">
                                <div class="p-2 w-25 flex-fill bd-highlight align-self-center">
                                    <a href="#">
                                        <img src="{{ $campaign->image }}" class="img-fluid rounded" alt="">
                                    </a>
                                </div>
                                <div class="popular-detail ms-2 m-2 p-2 flex-fill bd-highlight">
                                    <a href="#">
                                        <h5>{{ $campaign->title }}</h5>
                                    </a>
                                    <div class="progress mt-2" style="height: 3px;">
                                        <div class="progress-bar" role="progressbar" style="width: 91%;"></div>
                                    </div>
                                    <ul class="rating-box mt-2">
                                        <li>
                                            <ul class="rating">
                                                <li class="title-color text-dark">Rp 1,000,000,000</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

</div>
