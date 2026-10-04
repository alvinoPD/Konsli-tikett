<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    public function run(): void
    {
        $tikets = [
            [
                'Nama' => 'Festival Suara Kota 2026',
                'Tanggal' => now()->addDays(20)->toDateString(),
                'Lokasi' => 'Jakarta',
                'harga' => 150000,
                'deskripsi' => 'Satu hari penuh musik dan pertunjukan dari musisi pilihan.',
            ],
            [
                'Nama' => 'Konser Senja',
                'Tanggal' => now()->addDays(35)->toDateString(),
                'Lokasi' => 'Bandung',
                'harga' => 275000,
                'deskripsi' => 'Nikmati musik live dalam suasana senja yang hangat.',
            ],
            [
                'Nama' => 'Pasar Musik Nusantara',
                'Tanggal' => now()->addDays(50)->toDateString(),
                'Lokasi' => 'Yogyakarta',
                'harga' => 95000,
                'deskripsi' => 'Panggung musik dan ruang temu bagi talenta lokal.',
            ],
        ];

        foreach ($tikets as $tiket) {
            Tiket::firstOrCreate(['Nama' => $tiket['Nama']], $tiket);
        }
    }
}