<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#d9363e">
    <title>Pesanan {{ $order->code }} - RuangTiket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/index.css', 'resources/css/checkout.css'])
</head>
<body class="checkout-page">
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="RuangTiket beranda">
            <span class="brand-mark" aria-hidden="true">R</span>
            <span>ruang<span style="color:#d9363e">tiket</span></span>
        </a>
        <a class="login" href="{{ route('home') }}">Jelajahi acara</a>
    </header>

    <main class="receipt-wrap">
        <p class="section-kicker">Pesanan tercatat</p>
        <h1>Terima kasih, {{ $order->buyer_name }}.</h1>
        <p class="receipt-intro">Simpan kode pesanan ini untuk menindaklanjuti pembayaran.</p>

        <section class="receipt-details" aria-label="Detail pesanan">
            <div class="receipt-code"><span>Kode pesanan</span><strong>{{ $order->code }}</strong></div>
            <dl>
                <div><dt>Acara</dt><dd>{{ $order->tiket->Nama }}</dd></div>
                <div><dt>Tanggal</dt><dd>{{ \Illuminate\Support\Carbon::parse($order->tiket->Tanggal)->translatedFormat('d F Y') }}</dd></div>
                <div><dt>Lokasi</dt><dd>{{ $order->tiket->Lokasi }}</dd></div>
                <div><dt>Pemesan</dt><dd>{{ $order->buyer_email }}</dd></div>
                <div><dt>Jumlah tiket</dt><dd>{{ $order->quantity }} tiket</dd></div>
                <div><dt>Status</dt><dd><span class="status-pending">Menunggu pembayaran</span></dd></div>
                <div class="receipt-total"><dt>Total</dt><dd>Rp{{ number_format($order->total_price, 0, ',', '.') }}</dd></div>
            </dl>
        </section>

        <p class="payment-note">Pembayaran belum diproses di aplikasi. Hubungi penyelenggara acara dengan kode pesanan di atas untuk menyelesaikan pembayaran.</p>
        <a class="button receipt-button" href="{{ route('home') }}">Kembali ke acara</a>
    </main>
</body>
</html>