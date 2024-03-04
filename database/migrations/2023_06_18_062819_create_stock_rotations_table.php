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
        Schema::create('stock_rotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_number', 100)->nullable();
            $table->string('product_ean', 100)->index('stock_rotation_FK');
            $table->string('stage', 100);
            $table->decimal('qty', 10, 0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('location', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_rotations');
    }
};
