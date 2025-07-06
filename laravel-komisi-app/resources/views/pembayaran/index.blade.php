@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pembayaran</h2>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->penjualan_id }}</td>
                <td>{{ $item->payment_date }}</td>
                <td>{{ number_format($item->amount_paid) }}</td>
                <td>{{ $item->notes }}</td>
                <td>
                    <a href="{{ route('pembayaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
