<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penjualan_id' => 'required|numeric',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:1',
            'notes' => 'nullable|string'
        ]);

        Pembayaran::create($validated);

        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'penjualan_id' => 'required|numeric',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:1',
            'notes' => 'nullable|string'
        ]);

        $pembayaran->update($validated);

        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil dihapus.');
    }
}
