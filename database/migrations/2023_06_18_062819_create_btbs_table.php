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
        Schema::create('btbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kod', 65)->nullable();
            $table->string('nazwa')->nullable();
            $table->decimal('cena', 10)->nullable();
            $table->integer('VAT')->nullable();
            $table->string('stan', 100)->nullable();
            $table->string('EAN', 100)->nullable();
            $table->string('grupa', 100)->nullable();
            $table->text('opis')->nullable();
            $table->text('zdjecia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('btbs');
    }
};
