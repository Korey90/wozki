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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index('deliveries_FK');
            $table->string('delivery_method', 100);
            $table->decimal('delivery_amount', 10)->nullable();
            $table->string('delivery_currency', 10)->nullable();
            $table->string('delivery_address_company_name', 100)->nullable();
            $table->string('delivery_address_name', 100)->nullable();
            $table->string('delivery_address_phone', 50)->nullable();
            $table->string('delivery_address_street', 200);
            $table->string('delivery_address_zip_code', 20);
            $table->string('delivery_address_city', 100);
            $table->string('delivery_address_country', 100);
            $table->string('delivery_pickup_point_id', 10)->nullable();
            $table->string('delivery_pickup_point_name', 100)->nullable();
            $table->string('delivery_pickup_point_street', 200)->nullable();
            $table->string('delivery_pickup_point_zip_code', 20)->nullable();
            $table->string('delivery_pickup_point_city', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
