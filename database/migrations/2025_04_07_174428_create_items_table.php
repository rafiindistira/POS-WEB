<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel items.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('kategori')->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga_jual', 15, 2);
            $table->decimal('harga_beli', 15, 2);
            $table->timestamps();
        });
    }


    /**
     * Menghapus tabel items jika rollback.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
