<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            
            $table->string('nama');
            $table->integer('harga');
            
            // 2 Kolom baru yang ditagih sama Controller:
            $table->text('deskripsi'); 
            $table->string('gambar');  
            
            // Kolom bawaan lama kita kasih 'nullable()' biar MySQL nggak marah kalau dikosongin dari form
            $table->enum('kategori', ['kemeja','celana','jaket','dress'])->nullable();
            $table->integer('tinggi_min')->nullable();
            $table->integer('tinggi_max')->nullable();
            $table->enum('bentuk_badan', ['kurus','sedang','berisi'])->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};