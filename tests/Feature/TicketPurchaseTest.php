<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketPurchaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_create_an_order_using_the_server_ticket_price(): void
    {
        $tiket = Tiket::create([
            'Nama' => 'Konser Malam',
            'Tanggal' => now()->addDays(10)->toDateString(),
            'Lokasi' => 'Jakarta',
            'harga' => 150000,
            'deskripsi' => 'Konser musik malam.',
        ]);

        $this->get(route('tikets.beli', $tiket))
            ->assertOk()
            ->assertSeeText($tiket->Nama)
            ->assertSeeText('Batal beli')
            ->assertSee('Kurangi jumlah tiket')
            ->assertSee('Tambah jumlah tiket');

        $response = $this->post(route('tikets.store', $tiket), [
            'nama_pembeli' => 'Nadia Putri',
            'email_pembeli' => 'nadia@example.com',
            'jumlah' => 2,
            'total_price' => 1,
        ]);

        $order = Order::firstOrFail();

        $response->assertRedirect(route('orders.show', ['order' => $order->code]));
        $this->get(route('orders.show', ['order' => $order->code]))
            ->assertOk()
            ->assertSeeText($order->code)
            ->assertSeeText('Menunggu pembayaran');
        $this->assertDatabaseHas('orders', [
            'code' => $order->code,
            'tiket_id' => $tiket->id,
            'quantity' => 2,
            'unit_price' => 150000,
            'total_price' => 300000,
            'status' => 'pending',
        ]);
    }

    public function test_homepage_lists_events_from_the_catalog(): void
    {
        $tiket = Tiket::create([
            'Nama' => 'Festival Kota',
            'Tanggal' => now()->addDays(10)->toDateString(),
            'Lokasi' => 'Bandung',
            'harga' => 275000,
            'deskripsi' => 'Festival akhir pekan.',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSeeText($tiket->Nama)
            ->assertSeeText('Rp275.000');
    }
}