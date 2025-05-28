<div>
    <style>
        .log-out-outline {
            filter: invert(1);
        }
    </style>

    <div class="container">

        <div class="appHeader bg-primary text-light container">
            <div class="left">
                <a href="/akun/dashboard-donatur" wire:navigate class="headerButton goBack">
                    <img src="{{ asset('assets/img/logo.png') }}" height="30"></img>
                </a>
            </div>
            <div class="pageTitle"></div>
            <div class="right">
                <a href="/logout" wire:navigate class="headerButton goBack">
                    <img src="{{ asset('assets/img/log-out-outline.svg') }}" alt="Log out Icon" class="log-out-outline"
                        height="24">
                </a>
            </div>
        </div>

        @include('_message')

        <!-- App Capsule -->
        <div id="appCapsule">

            <ul class="listview no-line">
                <li>
                    <div class="col-3">
                        <img src="{{ $user->avatar }}" alt="image" class="imaged w64 rounded mr-05">
                    </div>
                    <div class="col-6">
                        <h4 class="name mt-1 mb-0 text-primary">{{ $user->name }}</h5>
                            <h6 class="subtext mb-0">Sejak {{ $user->created_at->translatedFormat('d F Y') }}</h6>
                    </div>
                    <div class="col-3">
                        {{-- {{ $fundraiser_status }} --}}
                        @if ($fundraiser_status == 'not register')
                            <a href="/akun/dashboard-fundraiser" wire:navigate class="text-primary"><button
                                    type="botton" class="btn">Daftar Fundriser</botton></a>
                        @elseif ($fundraiser_status == 'register')
                            <a href="">Fundraiser Detail</a>
                        @else
                            <a href="/panel/campaign">Dashboard Fundraiser</a>
                        @endif
                    </div>
                </li>
            </ul>

            <div class="section inset pt-2 pb-2 mb-1">
                <button type="button" class="btn btn-success btn-lg btn-block">Total Donasi Rp {{ number_format($total_donasi->total_gross_amount ?? 0, 0, ',', '.') }}</button>

                <!-- Table riwayat donasi -->
                <div class="section full mt-1 mb-2">
                    <div class="section-title">Riwayat Donasi</div>
                    <div class="content-header mb-05"></div>
                    <div class="wide-block p-0">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tgl</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaksi)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($transaksi->transaction_time)->translatedFormat('d F Y') }}</td>
                                            <td>{{ $transaksi->campaign_title }}</td>
                                            <td>{{ number_format($transaksi->gross_amount, 0, ',', '.')  }}</td>
                                            <td>{{ $transaksi->transaction_status }}</td>
                                            <td><a href="{{ $transaksi->pdf_url }}" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat
                                Lagi</button>
                        </a>
                        </a>
                    </div>
                    <!-- * riwayat donasi -->
                </div>

                <!-- * App Capsule -->

            </div>



            @livewire('nav-bar')

        </div>
    </div>
</div>