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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['in', 'out', 'adjustment', 'transfer']); // sesuai dengan 4 tipe transaksi
            $table->string('reference')->nullable(); // bisa no faktur, kode mutasi, dll.
            $table->text('description')->nullable(); // keterangan umum
            $table->timestamp('transacted_at'); // waktu transaksi
            $table->foreignId('from_location_id')->nullable()->constrained('locations')->restrictOnDelete(); // untuk transfer
            $table->foreignId('to_location_id')->nullable()->constrained('locations')->restrictOnDelete();   // untuk transfer
            $table->foreignId('created_by')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
