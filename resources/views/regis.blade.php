<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#d9363e">
	<title>Daftar - RuangTiket</title>
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
				<span class="eyebrow">Temukan pengalaman baru</span>
				<h1>Lebih dekat dengan momen favoritmu.</h1>
				<p>Buat akun RuangTiket dan temukan konser, festival, serta acara seru berikutnya.</p>
			</div>
			<p class="auth-caption">Temukan momen. Rasakan langsung.</p>
		</aside>

		<section class="auth-main" aria-labelledby="register-title">
			<div class="auth-form-wrap">
				<a class="brand auth-mobile-brand" href="/" aria-label="RuangTiket beranda">
					<span class="brand-mark" aria-hidden="true">R</span>
					<span>ruang<span style="color:#d9363e">tiket</span></span>
				</a>
				<h2 id="register-title">Buat akun baru</h2>
				<p class="auth-intro">Daftar gratis dan mulai rencanakan acara favoritmu.</p>

				<form class="auth-fields" action="#" method="get">
					<div class="auth-field">
						<label for="name">Nama lengkap</label>
						<input id="name" name="name" type="text" placeholder="Nama kamu" autocomplete="name" required>
					</div>
					<div class="auth-field">
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="nama@email.com" autocomplete="email" required>
					</div>
					<div class="auth-field">
						<label for="password">Kata sandi</label>
						<input id="password" name="password" type="password" placeholder="Minimal 8 karakter" autocomplete="new-password" minlength="8" required>
					</div>
					<button class="button auth-submit" type="button">Buat akun</button>
				</form>

				<p class="auth-terms">Dengan mendaftar, kamu menyetujui Syarat &amp; Ketentuan serta Kebijakan Privasi RuangTiket.</p>
				<p class="auth-switch">Sudah punya akun? <a class="auth-text-link" href="{{ route('login') }}">Masuk</a></p>
			</div>
		</section>
	</main>
</body>
</html>
