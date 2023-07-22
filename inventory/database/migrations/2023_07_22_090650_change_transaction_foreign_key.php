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
        Schema::table('transactions', function (Blueprint $table) {
            // Drop existing foreign key constraint
            $table->dropForeign('transactions_customer_id_foreign');

            // Add foreign key constraint to 'customer_id' column with "cascade" onDelete
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop existing foreign key constraint
            $table->dropForeign('transactions_customer_id_foreign');

            // Add foreign key constraint to 'customer_id' column without "cascade" onDelete
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }
};
