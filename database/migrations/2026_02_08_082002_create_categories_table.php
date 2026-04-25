//2026_03_08_082002_create_categories_table.php
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
    // Membuat tabel baru bernama 'categories'
    Schema::create('categories', function (Blueprint $table) {
        // Membuat kolom 'id' sebagai Primary Key (Auto Increment)
        $table->id();

        // Membuat kolom 'name' untuk nama kategori
        // ->unique() memastikan tidak ada nama kategori yang ganda di database
        $table->string('name')->unique();

        // Otomatis membuat dua kolom: 'created_at' dan 'updated_at' 
        // untuk mencatat waktu data dibuat dan diubah
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
