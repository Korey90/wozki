<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStockRotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_rotations', function (Blueprint $table) {
            $table->foreign(['product_ean'], 'stock_rotation_FK')->references(['ean_number'])->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_rotations', function (Blueprint $table) {
            $table->dropForeign('stock_rotation_FK');
        });
    }
}
