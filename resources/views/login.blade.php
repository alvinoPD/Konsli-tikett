<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#d9363e">
	<title>Masuk - RuangTiket</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	@vite(['resources/css/login.css','resources/css/index.css'])
</head>
<body>
	<main class="auth-page">
		<aside class="auth-visual">
			<a class="brand" href="/" aria-label="RuangTiket beranda">
				<span class="brand-mark" aria-hidden="true">R</span>
				<span>ruang<span style="color:#ffaaa8">tiket</span></span>
			</a>
			<div class="auth-message">
				<span class="eyebrow">Momen seru dimulai di sini</span>
				<h1>Acara seru sudah menunggumu.</h1>
				<p>Masuk dan lanjutkan rencanamu. Tiket untuk pengalaman berikutnya ada di RuangTiket.</p>
			</div>
			<p class="auth-caption">Temukan momen. Rasakan langsung.</p>
		</aside>

		<section class="auth-main" aria-labelledby="login-title">
			<div class="auth-form-wrap">
				<a class="brand auth-mobile-brand" href="/" aria-label="RuangTiket beranda">
					<span class="brand-mark" aria-hidden="true">R</span>
					<span>ruang<span style="color:#d9363e">tiket</span></span>
				</a>
				<h2 id="login-title">Selamat datang kembali</h2>
				<p class="auth-intro">Masuk ke akunmu untuk melanjutkan.</p>

				<form class="auth-fields" action="#" method="get">
					<div class="auth-field">
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="nama@email.com" autocomplete="email" required>
					</div>
					<div class="auth-field">
						<label for="password">Kata sandi</label>
						<input id="password" name="password" type="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
					</div>
					<div class="auth-meta">
						<label class="auth-check"><input type="checkbox" name="remember"> Ingat saya</label>
						<a class="auth-text-link" href="#lupa-password">Lupa kata sandi?</a>
					</div>
					<button class="button auth-submit" type="button">Masuk</button>
				</form>

				<div class="auth-divider">ATAU</div>
				<p class="auth-switch">Belum punya akun? <a class="auth-text-link" href="{{ route('register') }}">Daftar sekarang</a></p>
			</div>
		</section>
	</main>
</body>
</html>
