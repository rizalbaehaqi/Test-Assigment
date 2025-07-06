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
    Schema::create('penjualan', function (Blueprint $table) {
        $table->id();
        $table->string('transaction_number');
        $table->unsignedBigInteger('marketing_id');
        $table->date('date');
        $table->bigInteger('cargo_fee')->default(0);
        $table->bigInteger('total_balance')->default(0);
        $table->bigInteger('grand_total')->default(0);
        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
