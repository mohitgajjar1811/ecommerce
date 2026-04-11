<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // ❌ old wrong FK (classes) remove
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_unit_id_foreign');

            // ✅ correct FK add
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onDelete('cascade');

            $table->foreign('unit_id')
                  ->references('id')
                  ->on('unit')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['unit_id']);
        });
    }
};