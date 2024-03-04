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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', 20)->index('invoice_products_FK');
            $table->string('product_name');
            $table->integer('qty');
            $table->decimal('price_netto', 10);
            $table->decimal('product_vat', 5);
            $table->decimal('price_brutto', 10);
            $table->decimal('total_price_netto', 10);
            $table->decimal('total_vat', 10);
            $table->decimal('total_price_brutto', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_products');
    }
};
