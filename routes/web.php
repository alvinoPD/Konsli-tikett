<?php

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $filters = $request->validate([
        'event' => ['nullable', 'string', 'max:120'],
        'city' => ['nullable', 'string', 'max:120'],
        'date' => ['nullable', 'date'],
    ]);

    $query = Tiket::query()->whereDate('Tanggal', '>=', today());
    $locations = (clone $query)->select('Lokasi')->distinct()->orderBy('Lokasi')->pluck('Lokasi');

    if (! empty($filters['event'])) {
        $query->where('Nama', 'like', '%' . $filters['event'] . '%');
    }

    if (! empty($filters['city'])) {
        $query->where('Lokasi', $filters['city']);
    }

    if (! empty($filters['date'])) {
        $query->whereDate('Tanggal', $filters['date']);
    }

    return view('index', [
        'tikets' => $query->orderBy('Tanggal')->get(),
        'locations' => $locations,
        'filters' => $filters,
    ]);
})->name('home');

Route::get('/tiket/{tiket}/beli', [App\Http\Controllers\TiketController::class, 'create'])
    ->name('tikets.beli');
Route::post('/tiket/{tiket}/beli', [App\Http\Controllers\TiketController::class, 'store'])
    ->name('tikets.store');
Route::get('/pesanan/{order:code}', [App\Http\Controllers\TiketController::class, 'show'])
    ->name('orders.show');

Route::view('/login', 'login')->name('login');
Route::view('/regis', 'regis')->name('register');

Route::get('/admin', function () {
    $tikets = Tiket::query()->orderBy('Tanggal')->get();

    return view('admin', [
        'tikets' => $tikets,
        'totalTiket' => $tikets->count(),
        'acaraMendatang' => $tikets->filter(fn (Tiket $tiket) => $tiket->Tanggal >= now()->toDateString())->count(),
        'hargaMulai' => $tikets->min('harga'),
    ]);
})->name('admin.dashboard');


