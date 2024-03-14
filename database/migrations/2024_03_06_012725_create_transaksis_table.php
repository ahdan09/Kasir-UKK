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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('kasir');
            $table->string('nota')->unique();
            $table->double('total_harga');
            $table->enum('pembayaran',['QRIS','DANA','ShopeePay','GoPay','OVO','LinkAja','Transfer Bank','Kartu Kredit']);
            $table->dateTime('waktu')->useCurrent();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
