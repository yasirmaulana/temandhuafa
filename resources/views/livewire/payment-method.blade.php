<div class="container">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .chevron-back {
            filter: invert(1);
        }
    </style>

    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="chevron Icon" class="chevron-back"
                    height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>

    <div id="appCapsule">

        <div class="section mt-3 mb-0">
            <h2 class="text-primary mb-3">{{ $dataDonasi['campaign_title'] }}</h2>
            <h4>Pilih Metode Pembayaran</h4>
        </div>

        <div class="container">
            <ul class="listview image-listview flush transparent mt-0 mb-0">
                @foreach ($paymentMethods as $method)
                <li>
                    <label class="item" style="display: flex; align-items: center; cursor: pointer; gap: 10px;"
                        wire:click="selectMethod('{{ $method['id'] }}')">
                        <div class="icon-box">
                            <input class="form-check-input" type="radio" name="paymethod"
                                value="{{ $method['id'] }}" {{ $loop->first ? 'required' : '' }}>
                        </div>
                        <div class="in" style="display: flex; align-items: center; gap: 8px;">
                            <img src="{{ asset($method['image']) }}" alt="{{ $method['title'] }}"
                                style="height: 20px; width: auto;">
                            {{ $method['title'] }}
                        </div>
                    </label>
                </li>
                @endforeach

            </ul>

            <div class="section full mt-10 mb-0">
                <div class="wide-block pb-2 pt-2">
                    <h4 class="mb-3">Data Donasi Anda</h4>
                    <table class="table table-bordered">
                        <thead>
                            {{-- <tr>
                                    <th>Item</th>
                                    <th>Value</th>
                                </tr> --}}
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah Donasi</td>
                                <td>Rp. {{ number_format($dataDonasi['amount'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Nama Donatur</td>
                                <td>{{ $dataDonasi['donor_name'] }}</td>
                            </tr>
                            <tr>
                                <td>Email Donatur</td>
                                <td>{{ $dataDonasi['email'] }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>{{ $dataDonasi['phone'] }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" wire:model="infakSistem" wire:click="togle"
                            checked>
                        <div class="d-flex align-items-center">
                            <h5 class="text-secondary mb-0 mr-1">Biaya Transaksi Rp
                                {{ $infakSistem ? number_format($infakSistemAmount, 0, ',', '.') : 0 }}
                            </h5>
                            <i class="bi bi-info-circle text-secondary ms-2" data-bs-toggle="tooltip"
                                data-bs-placement="right"
                                title="Biaya transaksi digunakan untuk memproses pembayaran. Anda dapat memilih untuk menanggung biaya ini, atau jika tidak dicentang, jumlahnya akan dikurangi dari total donasi Anda."></i>
                        </div>
                    </div>
                </div>


                <form wire:submit="createMidtransPayment">
                    {{ csrf_field() }}
                    <div class="appBottomMenu container">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-lg btn-block" @disabled(!$selectedMethod)>Lanjut Pembayaran</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>