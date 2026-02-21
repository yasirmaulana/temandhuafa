<div class="container">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .chevron-back {
            filter: invert(1);
        }

        .accordion-body {
            display: none;
        }

        .accordion-body.show {
            display: block;
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
        <div class="section mt-3 mb-0 text-center">
            <h2 class="mb-2">Rp{{ isset($paymentData['gross_amount']) ? number_format($paymentData['gross_amount'], 0, ',', '.') : '0' }}</h2>
            <small>Order ID #{{ $paymentData['order_id'] ?? 'N/A' }}</small>
            <div class="text-muted mt-2">Bayar sebelum <span
                    class="fw-bold text-danger">{{ $paymentData['expiry_time'] ?? '-' }}</span></div>
        </div>

        <div class="wide-block mt-3 p-3">
            <h4>{{ $bank }}</h4>
            <p>Lakukan pembayaran dari rekening {{ $bank }} ke nomor virtual account di bawah ini.</p>

            @if ($id == 'permata-va')
                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                    <span id="vaNumber" class="fw-bold text-dark">{{ $paymentData['permata_va_number'] ?? '-' }}</span>
                    <button type="button" class="btn btn-link btn-sm copy-btn"
                        data-copy="{{ $paymentData['permata_va_number'] ?? '' }}">Salin</button>
                </div>
            @endif

            @if ($id == 'bni-va')
                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                    <span id="vaNumber"
                        class="fw-bold text-dark">{{ $paymentData['va_numbers'][0]['va_number'] ?? '-' }}</span>
                    <button type="button" class="btn btn-link btn-sm copy-btn"
                        data-copy="{{ $paymentData['va_numbers'][0]['va_number'] ?? '' }}">Salin</button>
                </div>
            @endif

            @if ($id == 'bri-va')
                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                    <span id="vaNumber"
                        class="fw-bold text-dark">{{ $paymentData['va_numbers'][0]['va_number'] ?? '-' }}</span>
                    <button type="button" class="btn btn-link btn-sm copy-btn"
                        data-copy="{{ $paymentData['va_numbers'][0]['va_number'] ?? '' }}">Salin</button>
                </div>
            @endif

            @if ($id == 'channel')
                Nomor Virtual Account:
                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                    <span id="vaNumber" class="fw-bold text-dark">{{ $paymentData['bill_key'] ?? '-' }}</span>
                    <button type="button" class="btn btn-link btn-sm copy-btn"
                        data-copy="{{ $paymentData['bill_key'] ?? '' }}">Salin</button>
                </div>
                Kode Bank:
                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                    <span id="vaNumber" class="fw-bold text-dark">{{ $paymentData['biller_code'] ?? '-' }}</span>
                    <button type="button" class="btn btn-link btn-sm copy-btn"
                        data-copy="{{ $paymentData['biller_code'] ?? '' }}">Salin</button>
                </div>
            @endif

            @if ($id == 'gopay')
                <div class="text-center">
                    <p>Scan kode QR di bawah ini menggunakan aplikasi pembayaran pilihan Anda.</p>
                    @php
                        $qrCodeUrl = null;
                        if (isset($paymentData['actions'])) {
                            foreach ($paymentData['actions'] as $action) {
                                if ($action['name'] === 'generate-qr-code') {
                                    $qrCodeUrl = $action['url'];
                                    break;
                                }
                            }
                        }
                    @endphp

                    @if ($qrCodeUrl)
                        <div class="bg-white p-3 rounded mb-3 d-inline-block mx-auto">
                            <img src="{{ $qrCodeUrl }}" alt="QRIS QR Code" class="img-fluid" style="max-width: 250px;">
                        </div>
                        <div class="mt-2 text-center">
                            <a href="{{ $qrCodeUrl }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i> Unduh QR Code
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Gagal memuat QR Code. Silakan coba cek status secara manual atau hubungi dukungan.
                        </div>
                    @endif
                </div>
            @endif

        </div>

        @if ($id == 'permata-va')
            <div class="section full mt-2">
                <div class="section-title">Cara Bayar</div>
                <div class="accordion" id="accordionExample1">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion1">
                                ATM Permata/ALTO
                            </button>
                        </div>
                        <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                            <div class="accordion-content">
                                1. Pilih <b>transaksi lainnya</b> pada menu utama.<br>
                                2. Pilih <b>pembayaran</b>.<br>
                                3. Pilih <b>pembayaran lainnya</b>.<br>
                                4. Pilih <b>virtual account</b><br>
                                5. Masukkan <b>nomor virtual account permata</b>, lalu <b>konfirmasi</b>.<br>
                                6. Pembayaran berhasil.<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample2">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion2">
                                via bank lainnya
                            </button>
                        </div>
                        <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample2">
                            <div class="accordion-content">
                                1. Pilih <b>bank</b> & <b>cara bayar</b> (ATM/internet/mobile banking) <b>yang Anda
                                    inginkan</b>.<br>
                                2. Pilih <b>transfer ke bank lain</b>.<br>
                                3. Masukkan <b>nomor virtual account</b>.<br>
                                4. Masukkan <b>jumlah yang akan dibayar, lalu konfirmasi</b>.<br>
                                5. Pembayaran selesai.<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($id == 'bni-va')
            <div class="section full mt-2">
                <div class="section-title">Cara Bayar</div>
                <div class="accordion" id="accordionExample1">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion1">
                                ATM BNI
                            </button>
                        </div>
                        <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                            <div class="accordion-content">
                                1. Pilih <b>menu lain</b> pada menu utama.
                                2. Pilih <b>transfer</b>.
                                3. Pilih <b>ke rekening BNI</b>.
                                4. Masukkan <b>nomor rekening pembayaran</b>.
                                5. Masukkan <b>jumlah yang akan dibayar</b>, lalu <b>konfirmasi</b>.
                                6. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample2">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion2">
                                Internet Banking
                            </button>
                        </div>
                        <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample2">
                            <div class="accordion-content">
                                1. Pilih <b>transaksi</b>, lalu <b>info & administrasi transfer</b>.
                                2. Pilih <b>atur rekening tujuan</b>.
                                3. Masukkan <b>informasi rekening</b>, lalu <b>konfirmasi</b>.
                                4. Pilih <b>transfer, lalu transfer ke rekening BNI</b>.
                                5. Masukkan <b>detail pembayaran</b>, lalu <b>konfirmasi</b>.
                                6. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample3">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion3">
                                Mobile Banking
                            </button>
                        </div>
                        <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample3">
                            <div class="accordion-content">
                                1. Pilih <b>transfer</b>.
                                2. Pilih <b>virtual account billing</b>.
                                3. Pilih <b>rekening debit</b> yang akan digunakan.
                                4. Masukkan <b>nomor virtual account</b>, lalu <b>konfirmasi</b>.
                                5. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample4">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion4">
                                via bank lainnya
                            </button>
                        </div>
                        <div id="accordion4" class="accordion-body collapse" data-parent="#accordionExample4">
                            <div class="accordion-content">
                                1. Pilih <b>bank</b> & <b>cara bayar</b> (ATM/internet/mobile banking) <b>yang Anda
                                    inginkan</b>.<br>
                                2. Pilih <b>transfer ke bank lain</b>.<br>
                                3. Masukkan <b>nomor virtual account</b>.<br>
                                4. Masukkan <b>jumlah yang akan dibayar, lalu konfirmasi</b>.<br>
                                5. Pembayaran selesai.<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($id == 'bri-va')
            <div class="section full mt-2">
                <div class="section-title">Cara Bayar</div>
                <div class="accordion" id="accordionExample1">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion1">
                                ATM BRI
                            </button>
                        </div>
                        <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                            <div class="accordion-content">
                                1. Pilih <b>transaksi lainnya</b> pada menu utama.
                                2. Pilih <b>pembayaran</b>.
                                3. Pilih <b>lainnya</b>.
                                4. Pilih <b>BRIVA</b>.
                                5. Masukkan <b>nomor BRIVA</b>, lalu <b>konfirmasi</b>.
                                6. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample2">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion2">
                                IB BRI
                            </button>
                        </div>
                        <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample2">
                            <div class="accordion-content">
                                1. Pilih <b>pembayaran & pembelian</b>.
                                2. Pilih <b>BRIVA</b>.
                                3. Masukkan <b>nomor BRIVA</b>, lalu <b>konfirmasi</b>.
                                4. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample3">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion3">
                                BRImo
                            </button>
                        </div>
                        <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample3">
                            <div class="accordion-content">
                                1. Pilih <b>pembayaran</b>.
                                2. Pilih <b>BRIVA</b>.
                                3. Masukkan <b>nomor BRIVA</b>, lalu <b>konfirmasi</b>.
                                4. Pembayaran berhasil.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample4">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion4">
                                via bank lainnya
                            </button>
                        </div>
                        <div id="accordion4" class="accordion-body collapse" data-parent="#accordionExample4">
                            <div class="accordion-content">
                                1. Pilih <b>bank</b> & <b>cara bayar</b> (ATM/internet/mobile banking) <b>yang Anda
                                    inginkan</b>.<br>
                                2. Pilih <b>transfer ke bank lain</b>.<br>
                                3. Masukkan <b>nomor virtual account</b>.<br>
                                4. Masukkan <b>jumlah yang akan dibayar, lalu konfirmasi</b>.<br>
                                5. Pembayaran selesai.<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($id == 'channel')
            <div class="section full mt-2">
                <div class="section-title">Cara Bayar</div>
                <div class="accordion" id="accordionExample1">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion1">
                                Livin’ by Mandiri
                            </button>
                        </div>
                        <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                            <div class="accordion-content">
                                1. Pilih <b>bayar/va</b> pada menu utama.
                                2. Pilih <b>e-commerce</b>.
                                3. Pilih <b>Midtrans</b> atau cari menggunakan kode <b>70012</b> pada kolom penyedia jasa.
                                4. Masukkan <b>nomor virtual account</b> pada bagian <b>kode bayar</b>.
                                5. Klik <b>lanjutkan</b> untuk konfirmasi.
                                6. Pembayaran selesai.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample2">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion2">
                                ATM Mandiri
                            </button>
                        </div>
                        <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample2">
                            <div class="accordion-content">
                                1. Pilih <b>bayar/beli</b> pada menu utama.
                                2. Pilih <b>lainnya</b>.
                                3. Pilih <b>multi payment</b>.
                                4. Masukkan kode perusahaan Midtrans <b>70012</b>.
                                5. Masukkan <b>kode pembayaran</b>, lalu <b>konfirmasi</b>.
                                6. Pembayaran selesai.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample3">
                    <div class="item">
                        <div class="accordion-header">
                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                data-target="#accordion3">
                                Mandiri Internet Banking
                            </button>
                        </div>
                        <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample3">
                            <div class="accordion-content">
                                1. Pilih <b>bayar</b> pada menu utama.
                                2. Pilih <b>multi payment</b>.
                                3. Pilih <b>dari rekening</b>.
                                4. Pilih <b>Midtrans</b> di bagian <b>penyedia jasa</b>.
                                5. Masukkan <b>kode pembayaran</b>, lalu <b>konfirmasi</b>.
                                6. Pembayaran selesai.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="appBottomMenu container mt-0">
            <div class="col-12">
                <button type="button" wire:click="checkPaymentStatus" class="btn btn-success btn-lg btn-block" wire:loading.attr="disabled">
                    <span wire:loading.remove>Cek status</span>
                    <span wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </span>
                </button>
            </div>
        </div>

    </div>

</div>

<script>
    const attachCopyHandlers = () => {
        document.querySelectorAll('.copy-btn').forEach(button => {
            if (button.dataset.copyBound === 'true') {
                return;
            }

            button.addEventListener('click', () => {
                const valueToCopy = button.dataset.copy;
                if (!valueToCopy) {
                    return;
                }

                const handleSuccess = () => {
                    const originalLabel = button.textContent;
                    button.textContent = 'Disalin!';
                    setTimeout(() => {
                        button.textContent = originalLabel;
                    }, 2000);
                };

                const fallbackCopy = () => {
                    const helper = document.createElement('input');
                    helper.value = valueToCopy;
                    document.body.appendChild(helper);
                    helper.select();
                    document.execCommand('copy');
                    document.body.removeChild(helper);
                    handleSuccess();
                };

                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(valueToCopy).then(handleSuccess).catch(
                        fallbackCopy);
                } else {
                    fallbackCopy();
                }
            });

            button.dataset.copyBound = 'true';
        });
    };

    const initAccordion = () => {
        document.querySelectorAll('.accordion .accordion-header button').forEach(button => {
            if (button.dataset.accordionBound === 'true') {
                return;
            }

            button.addEventListener('click', () => {
                const targetSelector = button.dataset.target;
                if (!targetSelector) {
                    return;
                }

                const target = document.querySelector(targetSelector);
                if (!target) {
                    return;
                }

                const accordion = button.closest('.accordion');
                const isOpen = target.classList.contains('show');

                if (accordion) {
                    accordion.querySelectorAll('.accordion-body').forEach(body => {
                        body.classList.remove('show');
                    });
                    accordion.querySelectorAll('.accordion-header button').forEach(btn => {
                        btn.classList.add('collapsed');
                    });
                }

                if (!isOpen) {
                    target.classList.add('show');
                    button.classList.remove('collapsed');
                }
            });

            button.dataset.accordionBound = 'true';
        });
    };

    document.addEventListener('DOMContentLoaded', () => {
        attachCopyHandlers();
        initAccordion();
    });

    document.addEventListener('livewire:load', () => {
        attachCopyHandlers();
        initAccordion();
    });

    document.addEventListener('livewire:navigated', () => {
        attachCopyHandlers();
        initAccordion();
    });

    window.addEventListener('payment-status-checked', event => {
        const data = Array.isArray(event.detail) ? event.detail[0] : event.detail;
        Swal.fire({
            title: data.type === 'success' ? 'Berhasil' : 'Informasi',
            text: data.message,
            icon: data.type,
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    });
</script>
