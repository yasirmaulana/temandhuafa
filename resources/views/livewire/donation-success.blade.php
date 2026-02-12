<div class="container">
    @livewire('header-back')

    <div id="appCapsule">
        <div class="card">
            <div class="card-body text-center py-4">
                <div class="mb-2">
                    <ion-icon name="checkmark-circle" class="text-success" style="font-size: 64px;"></ion-icon>
                </div>
                <h2 class="text-success mb-1">Terima Kasih!</h2>
                <p>Donasi Anda telah kami terima.</p>

                <div class="divider mt-2 mb-2"></div>

                <div class="row text-left px-3">
                    <div class="col-6 text-muted">Order ID</div>
                    <div class="col-6 text-right font-weight-bold">{{ $transaction->order_id }}</div>
                    
                    <div class="col-6 text-muted mt-1">Program</div>
                    <div class="col-6 text-right mt-1">{{ $transaction->campaign_title }}</div>

                    <div class="col-6 text-muted mt-1">Donatur</div>
                    <div class="col-6 text-right mt-1">{{ $transaction->donor_name }}</div>

                    <div class="col-6 text-muted mt-1">Jumlah Donasi</div>
                    <div class="col-6 text-right mt-1 font-weight-bold text-success">
                        Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}
                    </div>
                </div>

                <div class="divider mt-2 mb-3"></div>

                <div class="row px-3">
                    <div class="col-12">
                        <a href="/" class="btn btn-primary btn-block btn-lg">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 text-center">
            <p class="text-muted" style="font-size: 0.9rem;">
                Semoga donasi Anda menjadi amal jariyah dan memberikan manfaat bagi mereka yang membutuhkan.
            </p>
        </div>
    </div>
</div>
