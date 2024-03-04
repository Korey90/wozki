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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('user_addresses_FK');
            $table->string('stline', 100)->nullable();
            $table->string('ndline', 40)->nullable();
            $table->string('town', 30)->nullable();
            $table->string('post_code', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('phone', 100);
            $table->string('email', 100)->nullable();
            $table->string('recivier', 100);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
};
