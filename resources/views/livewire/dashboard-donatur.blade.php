<div class="container">
    @livewire('header')

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
                    <a href="/akun/dashboard-fundraiser" class="text-primary"><button type="botton"
                            class="btn">Daftar Fundriser</botton></a>
                </div>
            </li>
        </ul>

        <! -- total donasi -->
            <div class="section inset pt-2 pb-2 mb-1">
                <button type="button" class="btn btn-success btn-lg btn-block">Total Donasi Rp xx</button>
                <! -- * total donasi -->

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
                                                <td>{{ $transaksi->transaction_time }}</td>
                                                <td>{{ $transaksi->order_id }}</td>
                                                <td>{{ $transaksi->gross_amount }}</td>
                                                <td>{{ $transaksi->transaction_status }}</td>
                                                <td>Lihat</td>
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


            <!-- ///////////// Js Files ////////////////////  -->
            <!-- Jquery -->
            <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
            <!-- Bootstrap-->
            <script src="assets/js/lib/popper.min.js"></script>
            <script src="assets/js/lib/bootstrap.min.js"></script>
            <!-- Ionicons -->
            <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
            <!-- Owl Carousel -->
            <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
            <!-- Base Js File -->
            <script src="assets/js/base.js"></script>
            <!-- Load More -->
            <script src="assets/js/plugins/loadMore.js"></script>

    </div>
