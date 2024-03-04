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
        Schema::create('supplier_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('telegram', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('website', 100)->nullable();
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
        Schema::dropIfExists('supplier_contacts');
    }
};
