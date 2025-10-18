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
        Schema::table('payments', function (Blueprint $table) {
            // Add new columns if they don't exist
            if (!Schema::hasColumn('payments', 'type')) {
                $table->string('type')->default('SPP')->after('student_id'); 
            }
            if (!Schema::hasColumn('payments', 'description')) {
                $table->text('description')->nullable();
            }
            
            // Rename columns if they exist with old names
            if (Schema::hasColumn('payments', 'payment_type') && !Schema::hasColumn('payments', 'type')) {
                $table->renameColumn('payment_type', 'type');
            }
            if (Schema::hasColumn('payments', 'notes') && !Schema::hasColumn('payments', 'description')) {
                $table->renameColumn('notes', 'description');
            }
            if (Schema::hasColumn('payments', 'paid_date') && !Schema::hasColumn('payments', 'payment_date')) {
                $table->renameColumn('paid_date', 'payment_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Rename columns back if needed
            if (Schema::hasColumn('payments', 'type')) {
                $table->renameColumn('type', 'payment_type');
            }
            if (Schema::hasColumn('payments', 'description')) {
                $table->renameColumn('description', 'notes');
            }
            if (Schema::hasColumn('payments', 'payment_date')) {
                $table->renameColumn('payment_date', 'paid_date');
            }
        });
    }
};
