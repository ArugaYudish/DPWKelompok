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
        Schema::table('raw_materials_products', function (Blueprint $table) {
            // Drop existing foreign key constraints
            $table->dropForeign(['raw_material_id']);
            $table->dropForeign(['product_id']);

            // Add foreign key constraint to 'raw_material_id' column with "cascade" onDelete
            $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('cascade');

            // Add foreign key constraint to 'product_id' column with "cascade" onDelete
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('raw_materials_products', function (Blueprint $table) {
            // Drop existing foreign key constraints
            $table->dropForeign(['raw_material_id']);
            $table->dropForeign(['product_id']);

            // Add foreign key constraint to 'raw_material_id' column without "cascade" onDelete
            $table->foreign('raw_material_id')->references('id')->on('raw_materials');

            // Add foreign key constraint to 'product_id' column without "cascade" onDelete
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
