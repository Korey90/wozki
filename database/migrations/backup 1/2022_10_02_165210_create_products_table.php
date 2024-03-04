<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id')->nullable()->index('products_FK');
            $table->unsignedBigInteger('description_id')->nullable()->index('products_FK_1');
            $table->unsignedBigInteger('detail_id')->nullable()->index('products_FK_2');
            $table->string('title', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('ean_number', 100)->nullable()->unique('products_UN');
            $table->string('price', 100)->nullable();
            $table->string('sale_price', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
