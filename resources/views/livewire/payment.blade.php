<div>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <section>
        {{-- <div class="custom-container">
            <div class="d-flex bd-highlight align-items-center">
                <div class="bd-highlight">
                    <a href="{{ url('campaign/') }}" wire:navigate class="btn btn-default">
                        <i class="ri-arrow-go-back-line text-primary"></i>
                    </a>
                </div>
                <div class="flex-fill bd-highlight justify-content-center text-center">
                    <div class="height py-3">
                        <h4 class="fw-bold">judul</h4>
                    </div>
                </div>
            </div>
        </div> --}}
        <div id="snap-container" class="w-100 h-100"></div>
    </section>


    <script>
        // Ambil snapToken yang diteruskan dari backend
        const snapToken = "{{ $snapToken }}";

        // Cetak ke console untuk verifikasi
        // console.log('Snap Token:', snapToken);

        // Contoh penggunaan snapToken untuk memanggil Midtrans Snap
        // window.snap.pay(snapToken, {
        //     onSuccess: function(result) {
        //         console.log('Payment Success:', result);
        //     },
        //     onPending: function(result) {
        //         console.log('Payment Pending:', result);
        //     },
        //     onError: function(result) {
        //         console.log('Payment Error:', result);
        //     },
        //     onClose: function() {
        //         console.log('Payment Popup Closed');
        //     }
        // });

        window.snap.embed(snapToken, {
            embedId: 'snap-container',
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                // console.log(result);
                sendResultToBackend(result);
            },
            onPending: function(result) {
                alert("Menunggu pembayaran Anda!");
                // console.log(result);
                sendResultToBackend(result);
            },
            onError: function(result) {
                alert("payment failed!");
                // console.log(result);
                sendResultToBackend(result);
            },
            onClose: function() {
                alert('Anda menutup halaman pembayaran tanpa menyelesaikannya');
            }
        });

        // Fungsi untuk mengirim data result ke backend
        function sendResultToBackend(result) {
            fetch('/payment-callback', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(result)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response from backend:', data);
                })
                .catch(error => {
                    console.error('Error sending result to backend:', error);
                });
        }
    </script>
</div>
