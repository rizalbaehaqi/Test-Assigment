@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pembayaran</h2>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>ID Penjualan</label>
            <input type="number" name="penjualan_id" class="form-control" value="{{ $pembayaran->penjualan_id }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="payment_date" class="form-control" value="{{ $pembayaran->payment_date }}" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Dibayar</label>
            <input type="number" name="amount_paid" class="form-control" value="{{ $pembayaran->amount_paid }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="notes" class="form-control" value="{{ $pembayaran->notes }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
