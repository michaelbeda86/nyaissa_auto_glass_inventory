<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Rename description to category
            $table->dropColumn('description');
            $table->string('category')->after('name');
            
            // Rename price to unit_price
            $table->renameColumn('price', 'unit_price');

            // Stock will remain the same, no changes needed for this column here
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Rollback changes
            $table->dropColumn('category');
            $table->string('description')->after('name');
            
            // Rename unit_price back to price
            $table->renameColumn('unit_price', 'price');
        });
    }
}
