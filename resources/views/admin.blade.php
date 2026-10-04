<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#d9363e">
    <title>Dashboard Admin - RuangTiket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/admin.css'])
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="/" aria-label="RuangTiket beranda">
                <span class="admin-brand-mark" aria-hidden="true">R</span>
                <span>ruang<span style="color:#d9363e">tiket</span></span>
            </a>
            <p class="admin-caption">Menu utama</p>
            <nav class="admin-nav" aria-label="Navigasi admin">
                <a class="active" href="{{ route('admin.dashboard') }}" aria-current="page"><span class="nav-mark" aria-hidden="true"></span>Dashboard</a>
                <a href="#ticket-list"><span class="nav-mark" aria-hidden="true"></span>Daftar acara</a>
            </nav>
            <div class="admin-sidebar-bottom">
                <a href="/"><span class="nav-mark" aria-hidden="true"></span>Kembali ke website</a>
            </div>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <p class="breadcrumb">RuangTiket <span aria-hidden="true">/</span> <strong>Dashboard</strong></p>
                <div class="admin-profile">
                    <span class="profile-avatar" aria-hidden="true">AD</span>
                    <span><span class="profile-name">Administrator</span><span class="profile-role">Admin</span></span>
                </div>
            </header>

            <section class="page-heading" aria-labelledby="page-title">
                <div>
                    <h1 id="page-title">Dashboard</h1>
                    <p>Ringkasan dan daftar acara RuangTiket.</p>
                </div>
                <span class="today-label">{{ now()->format('d/m/Y') }}</span>
            </section>

            <section class="stats-grid" aria-label="Ringkasan acara">
                <article class="stat-card">
                    <div class="stat-top"><span class="stat-label">Acara terdaftar</span><span class="stat-mark" aria-hidden="true">A</span></div>
                    <p class="stat-value">{{ number_format($totalTiket, 0, ',', '.') }}</p>
                    <p class="stat-foot">Total acara di katalog</p>
                </article>
                <article class="stat-card">
                    <div class="stat-top"><span class="stat-label">Akan datang</span><span class="stat-mark" aria-hidden="true">↗</span></div>
                    <p class="stat-value">{{ number_format($acaraMendatang, 0, ',', '.') }}</p>
                    <p class="stat-foot">Acara hari ini dan berikutnya</p>
                </article>
                <article class="stat-card">
                    <div class="stat-top"><span class="stat-label">Harga mulai</span><span class="stat-mark" aria-hidden="true">Rp</span></div>
                    <p class="stat-value">{{ $hargaMulai !== null ? 'Rp' . number_format($hargaMulai, 0, ',', '.') : '—' }}</p>
                    <p class="stat-foot">Harga terendah di katalog</p>
                </article>
            </section>

            <section class="table-section" id="ticket-list" aria-labelledby="event-list-title">
                <div class="table-heading">
                    <h2 id="event-list-title">Daftar acara</h2>
                    <span class="table-count">{{ $totalTiket }} acara</span>
                </div>

                @if ($tikets->isEmpty())
                    <div class="table-scroll">
                        <div class="empty-state">
                            <span class="empty-mark" aria-hidden="true">+</span>
                            <h3>Belum ada acara</h3>
                            <p>Acara yang ditambahkan akan muncul di daftar ini.</p>
                        </div>
                    </div>
                @else
                    <div class="table-scroll">
                        <table class="event-table">
                            <thead>
                                <tr>
                                    <th>Nama acara</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Harga tiket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tikets as $tiket)
                                    <tr>
                                        <td>
                                            <span class="event-name">{{ $tiket->Nama }}</span>
                                            <span class="event-description">{{ $tiket->deskripsi }}</span>
                                        </td>
                                        <td class="event-date">{{ \Illuminate\Support\Carbon::parse($tiket->Tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $tiket->Lokasi }}</td>
                                        <td class="event-price">Rp{{ number_format($tiket->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>
            <footer class="admin-footer">RuangTiket Admin · Data diperbarui dari katalog acara</footer>
        </main>
    </div>
</body>
</html>