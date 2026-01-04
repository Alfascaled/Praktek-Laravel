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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('toko_id')->constrained('tokos')->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->integer('stok_minimum')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Unique constraint untuk memastikan satu produk hanya punya satu record stok per toko
            $table->unique(['product_id', 'toko_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
