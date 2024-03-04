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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'orders2_FK_4')->references(['id'])->on('invoices');
            $table->foreign(['payment_id'], 'orders2_FK_2')->references(['payment_id'])->on('payments');
            $table->foreign(['user_id'], 'orders_FK')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders2_FK_4');
            $table->dropForeign('orders2_FK_2');
            $table->dropForeign('orders_FK');
        });
    }
};
