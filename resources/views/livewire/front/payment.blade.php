<div>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script>
        // Ambil snapToken yang diteruskan dari backend
        const snapToken = "{{ $snapToken }}";

        // Cetak ke console untuk verifikasi
        console.log('Snap Token:', snapToken);

        // Contoh penggunaan snapToken untuk memanggil Midtrans Snap
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                console.log('Payment Success:', result);
            },
            onPending: function(result) {
                console.log('Payment Pending:', result);
            },
            onError: function(result) {
                console.log('Payment Error:', result);
            },
            onClose: function() {
                console.log('Payment Popup Closed');
            }
        });
    </script>
</div>
