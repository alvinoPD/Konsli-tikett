<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#d9363e">
	<title>Beli Tiket - RuangTiket</title>
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
		<a class="login" href="{{ route('home') }}">Kembali ke acara</a>
	</header>

	<main class="checkout-wrap">
		<div class="checkout-heading">
			<p class="section-kicker">Checkout</p>
			<h1>Amankan tiketmu.</h1>
			<p>Isi detail pemesan untuk membuat pesanan acara ini.</p>
		</div>

		<div class="checkout-grid">
			<form class="checkout-form" action="{{ route('tikets.store', $tiket) }}" method="post">
				@csrf
				<h2>Detail pemesan</h2>

				<label for="nama_pembeli">Nama lengkap</label>
				<input id="nama_pembeli" name="nama_pembeli" type="text" value="{{ old('nama_pembeli') }}" autocomplete="name" required maxlength="120">
				@error('nama_pembeli') <p class="field-error">{{ $message }}</p> @enderror

				<label for="email_pembeli">Email</label>
				<input id="email_pembeli" name="email_pembeli" type="email" value="{{ old('email_pembeli') }}" autocomplete="email" required maxlength="255">
				@error('email_pembeli') <p class="field-error">{{ $message }}</p> @enderror

				<label for="jumlah">Jumlah tiket</label>
				<div class="quantity-control">
					<button class="quantity-button" type="button" data-step="-1" aria-label="Kurangi jumlah tiket" disabled>&minus;</button>
					<input id="jumlah" name="jumlah" type="number" value="{{ old('jumlah', 1) }}" min="1" max="10" required aria-label="Jumlah tiket">
					<button class="quantity-button" type="button" data-step="1" aria-label="Tambah jumlah tiket">+</button>
				</div>
				@error('jumlah') <p class="field-error">{{ $message }}</p> @enderror

				@if ($errors->any())
					<p class="form-error">Periksa kembali data pemesan sebelum melanjutkan.</p>
				@endif
				<button class="button checkout-submit" type="submit">Buat pesanan</button>
				<a class="cancel-purchase" href="{{ route('home') }}">Batal beli</a>
				<p class="payment-note">Pembayaran belum diproses di aplikasi. Pesanan akan tercatat sebagai menunggu pembayaran.</p>
			</form>

			<aside class="order-summary" aria-label="Ringkasan acara">
				<p class="ticket-label">Ringkasan acara</p>
				<h2>{{ $tiket->Nama }}</h2>
				<p>{{ \Illuminate\Support\Carbon::parse($tiket->Tanggal)->translatedFormat('l, d F Y') }}</p>
				<p>{{ $tiket->Lokasi }}</p>
				<div class="summary-price">
					<span>Harga per tiket</span>
					<strong>Rp{{ number_format($tiket->harga, 0, ',', '.') }}</strong>
				</div>
				<p class="summary-description">{{ $tiket->deskripsi }}</p>
			</aside>
		</div>
	</main>
	<script>
		const quantityInput = document.querySelector('#jumlah');
		const quantityButtons = document.querySelectorAll('.quantity-button');
		const minimumQuantity = Number(quantityInput.min);
		const maximumQuantity = Number(quantityInput.max);

		function updateQuantityButtons() {
			const quantity = Number(quantityInput.value);
			quantityButtons.forEach((button) => {
				const step = Number(button.dataset.step);
				button.disabled = step < 0 ? quantity <= minimumQuantity : quantity >= maximumQuantity;
			});
		}

		quantityButtons.forEach((button) => {
			button.addEventListener('click', () => {
				const currentQuantity = Number(quantityInput.value) || minimumQuantity;
				const nextQuantity = currentQuantity + Number(button.dataset.step);
				quantityInput.value = Math.min(maximumQuantity, Math.max(minimumQuantity, nextQuantity));
				updateQuantityButtons();
			});
		});

		quantityInput.addEventListener('input', updateQuantityButtons);
		updateQuantityButtons();
	</script>
</body>
</html>
