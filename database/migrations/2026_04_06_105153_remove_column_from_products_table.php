<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sku');
            $table->dropColumn('description'); 
            $table->dropColumn('price'); 
            $table->dropColumn('item_code'); 
            $table->dropColumn('hsn_number'); 
            $table->dropColumn('item_category'); 
            $table->dropColumn('mrp'); 
           
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // $table->string('column_name')->nullable(); // optional rollback
        });
    }
};
