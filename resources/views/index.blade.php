<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#d9363e">
    <title>RuangTiket - Temukan Acara Favoritmu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/index.css'])
    <style>
        
    </style>
</head>
<body>
    <header class="site-header">
        <a class="brand" href="/" aria-label="RuangTiket beranda">
            <span class="brand-mark" aria-hidden="true">R</span>
            <span>ruang<span style="color:#d9363e">tiket</span></span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="#cari-tiket">Cari tiket</a>
            <a href="#ticket-options">Jelajahi acara</a>
            <a href="#bantuan">Bantuan</a>
        </nav>
        <div class="nav-actions">
            <a class="login" href="{{ route('login') }}">Masuk</a>
            <a class="button" href="{{ route('register') }}">Daftar</a>
        </div>
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-content">
                <span class="eyebrow">Momen seru dimulai di sini</span>
                <h1 id="hero-title">Temukan acara yang bikin hidup lebih berwarna.</h1>
                <p class="hero-copy">Konser, festival, sampai pengalaman baru. Pilih acara favoritmu dan amankan tiketnya dalam beberapa klik.</p>
            </div>

            <form class="search-panel" id="cari-tiket" action="{{ route('home') }}#ticket-options" method="get">
                <div class="field">
                    <label for="event">Nama acara</label>
                    <input id="event" name="event" type="search" value="{{ $filters['event'] ?? '' }}" placeholder="Konser, festival, ...">
                </div>
                <div class="field">
                    <label for="city">Kota</label>
                    <select id="city" name="city">
                        <option value="">Semua kota</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}" @selected(($filters['city'] ?? '') === $location)>{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="date">Tanggal</label>
                    <input id="date" name="date" type="date" value="{{ $filters['date'] ?? '' }}" aria-label="Pilih tanggal acara">
                </div>
                <button class="button search-button" type="submit">Cari acara <span aria-hidden="true">&nbsp;→</span></button>
            </form>
        </section>

        <section class="ticket-section" id="ticket-options" aria-labelledby="ticket-title">
            <div class="ticket-inner">
                <div class="ticket-heading">
                    <div>
                        <p class="section-kicker">Pilih tiketmu</p>
                            <h2 id="ticket-title">Temukan acara berikutnya.</h2>
                    </div>
                        <p class="event-note">Acara pilihan dari berbagai lokasi</p>
                </div>

                <div class="ticket-grid">
                        @forelse ($tikets as $tiket)
                            <article class="ticket-card">
                                <p class="ticket-label">{{ $tiket->Lokasi }}</p>
                                <h3>{{ $tiket->Nama }}</h3>
                                <p class="ticket-date">{{ \Illuminate\Support\Carbon::parse($tiket->Tanggal)->translatedFormat('d F Y') }}</p>
                                <p class="ticket-price">Rp{{ number_format($tiket->harga, 0, ',', '.') }} <span>/ orang</span></p>
                                <p class="ticket-description">{{ $tiket->deskripsi }}</p>
                                <a class="button ticket-buy" href="{{ route('tikets.beli', $tiket) }}">Beli tiket</a>
                            </article>
                        @empty
                            <p class="event-empty">Belum ada acara yang tersedia untuk pilihan pencarian ini.</p>
                        @endforelse
                </div>
                    <p class="ticket-note">Pesanan akan disimpan dengan status menunggu pembayaran.</p>
            </div>
        </section>
    </main>
</body>
</html>