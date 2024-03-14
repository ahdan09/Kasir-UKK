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
        Schema::create('detail__transaksis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_product');
            $table->double('quantity');
            $table->double('sub_total');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__transaksis');
    }
};
