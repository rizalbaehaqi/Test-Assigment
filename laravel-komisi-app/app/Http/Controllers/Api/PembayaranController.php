<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        return response()->json(Pembayaran::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penjualan_id' => 'required|exists:penjualan,id',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:1',
            'notes' => 'nullable|string'
        ]);

        $pembayaran = Pembayaran::create($validated);

        return response()->json($pembayaran, 201);
    }
}