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
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->string('code'); // Kode unik barang, bisa hasil generate
            $table->string('name'); // Nama barang
            $table->integer('stock')->default(0); // Stok awal, default 0
            $table->decimal('sell_price', 10, 2); // Harga jual
            $table->decimal('buy_price', 10, 2)->default(0); // Harga beli (jika ada)
            $table->text('description')->nullable(); // Keterangan tambahan (opsional)
            $table->string('image')->nullable(); // Path gambar barang
            $table->timestamps(); // Kolom created_at & updated_at otomatis
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
