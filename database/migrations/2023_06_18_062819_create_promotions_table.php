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
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('nazwa rabatu/promocji');
            $table->string('typ', 100)->comment('rabat kwotowy, rabat kwotowy na zamowienie, kup X, a dostaniesz Y, darmowa wysylka');
            $table->string('value', 100)->comment('10pln off, 5% off, shipping free');
            $table->string('products')->nullable();
            $table->string('status', 100)->nullable()->comment('aktywny nie aktywne');
            $table->string('requirements', 100)->nullable()->comment('minimalna wartosc zamowienia, minimalna ilosc produktow');
            $table->string('valid_from', 100)->comment('poczatek promocji');
            $table->string('valid_to', 100)->nullable()->comment('koniec promocji');
            $table->string('code', 100)->comment('kod ktory trzeba wpisac');
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
        Schema::dropIfExists('promotions');
    }
};
