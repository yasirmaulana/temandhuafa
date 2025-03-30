<div class="container">
    @livewire('header-back')

    <div id="appCapsule">

        <div class="blog-post">
            <div class="section full mb-2">
                <img src="{{ $campaign?->image ?? '' }}" alt="image" class="imaged square w-100">
            </div>

            <h2 class="title mb-3 text-primary">{{ $campaign?->title ?? '' }}</h2>

            <div class="section wide-block pt-2 pb-3 mb-3">
                <h6 class="">Jumlah Penghimpunan</h6>
                <span class="text-primary" style="font-size:15pt; font-weight:bold">Rp
                    {{ number_format($campaign->total_gross_amount, 0, ',', '.') }}</span>
                <span style="font-size:9pt">dari
                    {{ 'Rp. ' . number_format($campaign?->target_amount ?? 0, 0, ',', '.') }}</span>

                <div class="progress mt-1 mb-1" style="height:5px;">
                    <div class="progress-bar" role="progressbar"
                        style="width: {{ ($campaign->total_gross_amount / $campaign->target_amount) * 100 }}%;"
                        aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <span
                            style="font-size:12pt; font-weight:bold">{{ number_format($campaign->total_donatur, 0, ',', '.') }}</span><span
                            style="font-size:9pt">&nbsp
                            Jumlah Donatur</span>
                    </div>
                    <div class="col-4 text-right">
                        <span
                            style="font-size:12pt; font-weight:bold">{{ floor(abs(\Carbon\Carbon::parse($campaign->end_date)->diffInDays(now()))) }}</span>
                        <span style="font-size:9pt">hari lagi</span>
                    </div>
                </div>
            </div>

            <div class="section inset mb-4">
                <a href="profil-fundriser.html">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('assets/img/contents/avatar.jpg') }}" alt="avatar"
                                class="imaged w64 rounded mr-05">
                        </div>
                        <div class="col-8">
                            <h6 class="text-secondary mt-1 mb-0">Lembaga/Organisasi</h6>
                            <h3 class="text-primary mb-0">{{ $campaign->fundraiser }}<span
                                    class="badge text-success"><ion-icon name="checkmark-circle"></ion-icon></span></h3>
                            <h5 class="text-secondary">{{ $campaign->domisili_fundraiser }}</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="section inset mb-3">
                <h5 class="">Kategori: {{ $campaign->category_name }}</h5>
                <div class="row mb-1">
                    <div class="col-8">
                        <span style="font-size:10pt; font-weight:normal">Status:</span>
                        <span>&nbsp</span>
                        <span class="text-success"> Aktif</span>
                    </div>
                    <div class="col-4 text-right">
                        <span
                            style="font-size:10pt">{{ \Carbon\Carbon::parse($campaign->created_at)->translatedFormat('d F Y') }}</span>
                    </div>
                </div>
                <h5 class="mb-0">Lokasi Penyaluran: xx</h5>
                <h5>Target Penerima Manfaat: xx</h5>
            </div>

            <div class="section inset mb-3">
                {!! $campaign?->description ?? '' !!}
            </div>

            <div class="section pt-3 pb-3 mt-3 mb-3">
                <button type="button" class="btn btn-outline-primary btn-block rounded" data-toggle="modal"
                    data-target="#actionSheetShare">
                    Bagikan Informasi Program
                </button>
            </div>
        </div>

        <!-- Tabs Donatur dan Laporan -->
        <div class="section wide-block mt-1">

            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#donatur" role="tab">
                        <span>Donatur</span>
                        <span>&nbsp</span>
                        <span
                            class="badge badge-secondary">{{ number_format($campaign->total_donatur, 0, ',', '.') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#laporan2" role="tab">
                        <span>Laporan</span>
                        <span>&nbsp</span>
                        <span class="badge badge-danger">comming soon</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <!-- Dafar Donatur -->
                <div class="tab-pane fade show active" id="donatur" role="tabpanel">

                    <ul class="listview no-line">
                        @foreach ($transactions as $transaction)
                            <li>
                                <div class="col-3">
                                    <img src="{{ asset('assets/img/contents/avatar.jpg') }}" alt="image"
                                        class="imaged w48 rounded mr-05">
                                </div>
                                <div class="col-6">
                                    @if ($transaction->anonim == 1)
                                        <h5 class="text-primary mt-1 mb-0">Teman Baik</h5>
                                    @else
                                        <h5 class="text-primary mt-1 mb-0">{{ $transaction->donor_name }}</h5>
                                    @endif
                                    <h6 class="mb-0">
                                        {{ \Carbon\Carbon::parse($transaction->transaction_time)->translatedFormat('d F Y') }}
                                    </h6>
                                    <h6 class="">{{ $transaction->pray }}</h6>
                                </div>
                                <div class="col-3">
                                    <h5 class="text-right">
                                        {{ number_format($transaction->amount, 0, ',', '.') }}</h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- load more post -->
                    {{-- <div class="section inset pt-2 pb-2 mb-3">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                        </a>
                    </div> --}}

                </div>

                <!-- Laporan -->
                <div class="tab-pane fade" id="laporan" role="tabpanel">

                    <!-- timeline -->
                    <div class="timeline timed">

                        <div class="item">
                            <span class="time">5 April 2020</span>
                            <div class="dot bg-primary"></div>
                            <div class="content">
                                <img src="{{ asset('assets/img/contents/gambar.png') }}" alt="avatar"
                                    class="imaged w-100 mb-1">
                                <h4 class="title text-primary">Bagi Sembako di Jalan Kutilang</h4>
                                <h6 class="sub-title mt-1 mb-0">Penerima Manfaat: 2 orang</h6>
                                <h6 class="mb-0">Lokasi di: Depok</h6>
                                <div class="text">Deskripsi laporan penyaluran dana ke penerima manfaat.</div>
                            </div>
                        </div>

                        <div class="item">
                            <span class="time">5 April 2020</span>
                            <div class="dot bg-primary"></div>
                            <div class="content">
                                <img src="{{ asset('assets/img/contents/gambar.png') }}" alt="avatar"
                                    class="imaged w-100 mb-1">
                                <h4 class="title text-primary">Kasih makan orang terlantar</h4>
                                <h6 class="sub-title mt-1 mb-0">Penerima Manfaat: 2 orang</h6>
                                <h6 class="mb-0">Lokasi di: Depok</h6>
                                <div class="text">Deskripsi laporan penyaluran dana ke penerima manfaat.</div>
                            </div>
                        </div>

                        <div class="item">
                            <span class="time">5 April 2020</span>
                            <div class="dot bg-primary"></div>
                            <div class="content">
                                <img src="{{ asset('assets/img/contents/gambar.png') }}" alt="avatar"
                                    class="imaged w-100 mb-1">
                                <h4 class="title text-primary">Sumbangan Jumat berkah</h4>
                                <h6 class="sub-title mt-1 mb-0">Penerima Manfaat: 2 orang</h6>
                                <h6 class="mb-0">Lokasi di: Depok</h6>
                                <div class="text">Deskripsi laporan penyaluran dana ke penerima manfaat.</div>
                            </div>
                        </div>
                    </div>
                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2 mb-3">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                    </div>
                    <!-- * timeline -->


                </div>

            </div>
        </div>

        <!-- Share Action Sheet -->
        <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content container">
                    <div class="modal-header">
                        <h5 class="modal-title">Semangat Berbagi Kebaikan</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="action-button-list">
                            <li>
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url('/campaign/' . $campaign?->slug ?? '') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social logo-facebook mr-1"></div>
                                        Facebook
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Cek campaign ini! ') }}{{ url('/campaign/' . $campaign?->slug ?? '') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social logo-twitter mr-1"></div>
                                        Twitter
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://t.me/share/url?url={{ url('/campaign/' . $campaign?->slug ?? '') }}&text={{ urlencode('Cek campaign ini!') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social paper-plane mr-1"></div>
                                        Telegram
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://wa.me/?text={{ url('/campaign/' . $campaign?->slug ?? '') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social logo-whatsapp mr-1"></div>
                                        WhatsApp
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Bottom Menu -->
        <div class="appBottomMenu container">
            <a href="{{ url('checkout/' . $campaign?->slug ?? '') }}" wire:navigate class="btn-block">
                <button type="button" class="btn btn-success btn-lg btn-block">Donasi Sekarang</button>
            </a>
        </div>


    </div>

    <script src="{{ asset('assets/js/base.js') }}"></script>

</div>
