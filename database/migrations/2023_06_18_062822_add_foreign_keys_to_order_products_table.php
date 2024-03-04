<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreign(['numer_zamowienia'], 'order_products_FK')->references(['numer_zamowienia'])->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'order_products_FK_3')->references(['id'])->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign('order_products_FK');
            $table->dropForeign('order_products_FK_3');
        });
    }
};
