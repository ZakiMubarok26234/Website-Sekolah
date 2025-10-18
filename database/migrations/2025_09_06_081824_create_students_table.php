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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20)->unique();
            $table->string('name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->text('address');
            $table->string('phone', 20)->nullable();
            $table->string('class', 10);
            $table->foreignId('parent_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
