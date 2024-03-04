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
        Schema::create('invoice_deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_number', 100)->unique('invoice_delivery_UN');
            $table->string('costumer_name', 250);
            $table->string('costumer_nip', 100)->nullable();
            $table->string('address_street', 250);
            $table->integer('building_number');
            $table->integer('door_number');
            $table->string('post_code', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_deliveries');
    }
};
