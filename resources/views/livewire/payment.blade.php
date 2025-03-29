<div>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script>
        // Ambil snapToken yang diteruskan dari backend
        const snapToken = "{{ $snapToken }}";

        // Cetak ke console untuk verifikasi
        // console.log('Snap Token:', snapToken);

        // Contoh penggunaan snapToken untuk memanggil Midtrans Snap
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                // console.log('Payment Success:', result);
                sendResultToBackend(result);
                alert("Pembayaran berhasil!");
                window.location.href = "/";
            },
            onPending: function(result) {
                // console.log('Payment Pending:', result);
                sendResultToBackend(result);
                alert("Menunggu pembayaran Anda!");
                window.location.href = "/";
            },
            onError: function(result) {
                // console.log('Payment Error:', result);
                sendResultToBackend(result);
                alert("payment failed!");
                window.location.reload();
            },
            onClose: function() {
                // console.log('Payment Popup Closed');
                alert(
                    'Anda menutup halaman pembayaran tanpa menyelesaikannya, jika ingin cancel, silakan tekan tombol back pada browser anda');
                window.location.reload();
            }
        });

        // window.snap.embed(snapToken, {
        //     embedId: 'snap-container',
        //     onSuccess: function(result) {
        //         alert("Pembayaran berhasil!");
        //         // console.log(result);
        //         sendResultToBackend(result);
        //     },
        //     onPending: function(result) {
        //         alert("Menunggu pembayaran Anda!");
        //         // console.log(result);
        //         sendResultToBackend(result);
        //     },
        //     onError: function(result) {
        //         alert("payment failed!");
        //         // console.log(result);
        //         sendResultToBackend(result);
        //     },
        //     onClose: function() {
        //         alert('Anda menutup halaman pembayaran tanpa menyelesaikannya');
        //     }
        // });

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
