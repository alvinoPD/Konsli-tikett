<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tiket $tiket)
    {
        abort_if($tiket->Tanggal < today()->toDateString(), 404);

        return view('beli', ['tiket' => $tiket]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tiket $tiket)
    {
        abort_if($tiket->Tanggal < today()->toDateString(), 404);

        $data = $request->validate([
            'nama_pembeli' => ['required', 'string', 'max:120'],
            'email_pembeli' => ['required', 'email', 'max:255'],
            'jumlah' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $order = Order::create([
            'code' => 'RT-' . Str::upper(Str::random(10)),
            'tiket_id' => $tiket->id,
            'buyer_name' => $data['nama_pembeli'],
            'buyer_email' => $data['email_pembeli'],
            'quantity' => $data['jumlah'],
            'unit_price' => $tiket->harga,
            'total_price' => $tiket->harga * $data['jumlah'],
            'status' => 'pending',
        ]);

        return redirect()->route('orders.show', ['order' => $order->code]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('pesanan', ['order' => $order->load('tiket')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        //
    }
}
