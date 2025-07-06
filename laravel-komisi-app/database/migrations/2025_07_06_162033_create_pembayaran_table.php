<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('penjualan_id');
        $table->date('payment_date');
        $table->bigInteger('amount_paid');
        $table->string('notes')->nullable();
        $table->timestamps();

    });
}  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
