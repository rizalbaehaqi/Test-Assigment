@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pembayaran</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ID Penjualan</label>
            <input type="number" name="penjualan_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="payment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Dibayar</label>
            <input type="number" name="amount_paid" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="notes" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
