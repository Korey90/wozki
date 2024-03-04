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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable()->index('products_FK');
            $table->unsignedBigInteger('description_id')->nullable()->index('products_FK_1');
            $table->unsignedBigInteger('detail_id')->nullable()->index('products_FK_2');
            $table->string('ean_number', 100)->index('ean_number');
            $table->decimal('price', 10)->nullable()->comment('cena netto');
            $table->decimal('sale_price', 10)->nullable();
            $table->string('delivery_cost', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('code', 50)->nullable();
            $table->decimal('vat', 10)->nullable();
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
};
