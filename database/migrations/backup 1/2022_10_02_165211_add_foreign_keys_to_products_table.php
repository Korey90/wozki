<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['description_id'], 'products_FK_1')->references(['id'])->on('product_descriptions');
            $table->foreign(['supplier_id'], 'products_FK')->references(['id'])->on('suppliers');
            $table->foreign(['detail_id'], 'products_FK_2')->references(['id'])->on('product_details');
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
            $table->dropForeign('products_FK_1');
            $table->dropForeign('products_FK');
            $table->dropForeign('products_FK_2');
        });
    }
}
