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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('payment_type'); // SPP, Uang Gedung, dll
            $table->decimal('amount', 12, 2); // Jumlah pembayaran
            $table->string('month'); // Bulan pembayaran (untuk SPP)
            $table->string('year'); // Tahun pembayaran
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
            $table->date('due_date'); // Tanggal jatuh tempo
            $table->date('paid_date')->nullable(); // Tanggal dibayar
            $table->string('payment_method')->nullable(); // Cash, Transfer, dll
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
