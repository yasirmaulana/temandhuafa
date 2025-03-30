<div class="container">

    @livewire('header-back')

    <div id="appCapsule">

        <div class="section full mb-3">
            <div class="section full mb-3 position-relative" style="height: 230px; overflow: hidden;">
                <img src="{{ asset('storage/' . $fundraiser->cover) }}" alt="image" class="w-100 h-100 object-cover">

                <img src="{{ $user->avatar }}" alt="avatar" class="imaged rounded-circle position-absolute shadow"
                    style="width: 86px; height: 86px; bottom: 5px; left: 15px;">
            </div>

            <div class="section inset mb-2">
                <div class="row">
                    <div class="col-4">
                        <span style="font-size:10pt">Lembaga/Organisasi</span>
                    </div>
                    <div class="col-8 text-right">
                        <span style="font-size:10pt; font-weight:bold">{{ $fundraiser->kota_domisili }}</span>
                    </div>
                </div>

                <h2 class="title text-primary">{{ $fundraiser->nama_lembaga }}</h2>
                <h6>Akun telah terverifikasi<span class="text-success">
                        <img src="{{ asset('assets/img/checkmark-circle.svg') }}" alt="" height="15"
                            class="checkmark-circle">
            </div>

            <div class="section wide-block pt-2 pb-3 mb-3">
                <h4 class="text-secondary">Total Penghimpunan</h4>
                <span class="text-primary" style="font-size:15pt; font-weight:bold">Rp {{ number_format($fundraiser->total_gross_amount ?? 0, 0, ',', '.') }}</span>
                <span style="font-size:10pt">sejak {{ $fundraiser->created_at->translatedFormat('d F Y') }}</span>
                <h5>Total Penerima Manfaat: 0</h5>
            </div>

            <div class="section inset mb-3">
                <h3 class="mb-1">Profil Fundriser</h3>
                {{ $fundraiser->profile_lembaga }}
            </div>

            <div class="section pt-3 pb-3 mt-3 mb-3">
                <button type="button" class="btn btn-outline-primary btn-block rounded" data-toggle="modal"
                    data-target="#actionSheetShare">
                    <ion-icon name="share-outline"></ion-icon>
                    Bagikan Profil Fundriser
                </button>
            </div>
        </div>

        <div class="section full mt-1 mb-3">

            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#programAktif" role="tab">
                        <span>Program Aktif</span>
                        <span>&nbsp</span>
                        <span class="badge badge-secondary">{{ $campaigns->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#programSelesai" role="tab">
                        <span>Program Selesai</span>
                        <span>&nbsp</span>
                        <span class="badge badge-danger">{{ $campaignComplateds->count() }}</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="programAktif" role="tabpanel">

                    <ul class="listview">
                        @foreach ($campaigns as $campaign)
                            <li style="width: 100%;">
                                <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate
                                    style="display: block; width: 100%;">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="mt-1 mb-1">
                                                <img src="{{ $campaign->image }}" alt="image" class="imaged w-100"
                                                    style="height:120px">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="mt-1 mb-1">
                                                <h5 class="mb-1 text-primary" style="font-weight:bold">
                                                    {{ $campaign->title }}</h5>
                                                <h6>{{ $campaign->fundraiser }}</h6>
                                                <div class="progress mt-1 mb-1" style="height:5px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ ($campaign->total_gross_amount / $campaign->target_amount) * 100 }}%;"
                                                        aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6 class="mb-0">Terkumpul</h6>
                                                        <h5 style="font-weight:bold">Rp
                                                            {{ number_format($campaign->total_gross_amount, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                    <div class="col-4 margin-top">
                                                        <h6 class="text-right mb-0">Sisa hari</h6>
                                                        <h5 class="text-right" style="font-weight:bold">
                                                            {{ floor(abs(\Carbon\Carbon::parse($campaign->end_date)->diffInDays(now()))) }}
                                                            </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{-- <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                        </a>
                    </div> --}}

                </div>

                <div class="tab-pane fade" id="programSelesai" role="tabpanel">

                    <ul class="listview">
                        @foreach ($campaignComplateds as $campaignComplated)
                            <li style="width: 100%;">
                                <a href="{{ url('campaign/' . $campaignComplated->slug) }}" wire:navigate
                                    style="display: block; width: 100%;">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="mt-1 mb-1">
                                                <img src="{{ $campaignComplated->image }}" alt="image" class="imaged w-100"
                                                    style="height:120px">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="mt-1 mb-1">
                                                <h5 class="mb-1 text-primary" style="font-weight:bold">
                                                    {{ $campaignComplated->title }}</h5>
                                                <h6>{{ $campaignComplated->fundraiser }}</h6>
                                                <div class="progress mt-1 mb-1" style="height:5px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ ($campaignComplated->total_gross_amount / $campaignComplated->target_amount) * 100 }}%;"
                                                        aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6 class="mb-0">Terkumpul</h6>
                                                        <h5 style="font-weight:bold">Rp
                                                            {{ number_format($campaignComplated->total_gross_amount, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                    <div class="col-4 margin-top">
                                                        <h6 class="text-right mb-0">Sisa hari</h6>
                                                        <h5 class="text-right" style="font-weight:bold">
                                                            {{ floor(abs(\Carbon\Carbon::parse($campaignComplated->end_date)->diffInDays(now()))) }}
                                                            </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
                        </a>
                        </a>
                    </div>

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
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social logo-facebook mr-1"></div>
                                        Facebook
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Cek fundraiser ini! ') }}{{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social logo-twitter mr-1"></div>
                                        Twitter
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://t.me/share/url?url={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}&text={{ urlencode('Cek fundraiser ini!') }}"
                                    class="btn btn-list d-flex align-items-center">
                                    <span class="text-primary">
                                        <div class="icon-social paper-plane mr-1"></div>
                                        Telegram
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank"
                                    href="https://wa.me/?text={{ url('/fundraiser/' . $fundraiser?->slug ?? '') }}"
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

    </div>

    @livewire('nav-bar')


</div>
