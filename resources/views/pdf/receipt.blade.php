<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            text-transform: uppercase;
        }
        .receipt-title {
            font-size: 22px;
            margin-top: 10px;
            color: #555;
        }
        .content {
            margin-bottom: 30px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .details-table th, .details-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .details-table th {
            width: 35%;
            color: #777;
            font-weight: normal;
        }
        .details-table td {
            font-weight: bold;
        }
        .amount-box {
            background-color: #f8f9fa;
            border-left: 5px solid #28a745;
            padding: 15px;
            margin-top: 30px;
            font-size: 18px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .thank-you {
            font-style: italic;
            margin-top: 20px;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">Teman Duafa</div>
        <div class="receipt-title">Kuitansi Donasi Digital</div>
    </div>

    <div class="content">
        @if($transaction->transaction_status == 'settlement')
            <p>Terima kasih atas donasi Anda. Berikut adalah rincian transaksi donasi yang telah kami terima:</p>
        @elseif($transaction->transaction_status == 'pending')
             <p>Mohon segera selesaikan pembayaran Anda. Berikut adalah rincian tagihan donasi:</p>
        @else
             <p>Berikut adalah rincian transaksi donasi:</p>
        @endif

        <table class="details-table">
            <tr>
                <th>Nomor Order</th>
                <td>{{ $transaction->order_id }}</td>
            </tr>
            <tr>
                <th>Tanggal Transaksi</th>
                <td>{{ \Carbon\Carbon::parse($transaction->transaction_time)->translatedFormat('d F Y H:i') }} WIB</td>
            </tr>
            <tr>
                <th>Program</th>
                <td>{{ $transaction->program_name }}</td>
            </tr>
            <tr>
                <th>Donatur</th>
                <td>{{ $transaction->donor_name }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ strtoupper(str_replace('_', ' ', $transaction->payment_type)) }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td style="color: {{ $transaction->transaction_status == 'settlement' ? 'green' : ($transaction->transaction_status == 'pending' ? 'red' : 'black') }}">
                    {{ strtoupper($transaction->transaction_status) }}
                    @if($transaction->transaction_status == 'settlement') (BERHASIL) @endif
                    @if($transaction->transaction_status == 'pending') (MENUNGGU PEMBAYARAN) @endif
                </td>
            </tr>
        </table>

        <div class="amount-box">
            Total Donasi: <strong>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</strong>
        </div>

        @if($transaction->transaction_status == 'settlement')
        <div class="thank-you text-center">
            <p>"Semoga Allah memberikan pahala atas apa yang telah engkau berikan, dan menjadikannya pembersih bagimu, serta memberkahimu atas apa yang masih ada padamu."</p>
        </div>
        @endif
    </div>

    <div class="footer">
        <p>Dokumen ini diterbitkan secara otomatis dan sah tanpa tanda tangan basah.</p>
        <p>© {{ date('Y') }} Temandhuafa.id - Menebar Kebaikan, Berbagi Kebahagiaan</p>
    </div>
</body>
</html>
