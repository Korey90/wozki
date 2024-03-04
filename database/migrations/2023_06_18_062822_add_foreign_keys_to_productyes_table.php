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
        Schema::table('productyes', function (Blueprint $table) {
            $table->foreign(['detail_id'], 'products_FK_2_copy')->references(['id'])->on('product_details')->onDelete('CASCADE');
            $table->foreign(['description_id'], 'products_FK_1_copy')->references(['id'])->on('product_descriptions')->onDelete('CASCADE');
            $table->foreign(['supplier_id'], 'products_FK_copy')->references(['id'])->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productyes', function (Blueprint $table) {
            $table->dropForeign('products_FK_2_copy');
            $table->dropForeign('products_FK_1_copy');
            $table->dropForeign('products_FK_copy');
        });
    }
};
