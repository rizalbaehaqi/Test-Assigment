<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran'; // tambahkan baris ini

    protected $fillable = [
        'penjualan_id',
        'payment_date',
        'amount_paid',
        'notes',
    ];
}