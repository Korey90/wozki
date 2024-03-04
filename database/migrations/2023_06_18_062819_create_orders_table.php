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
        Schema::create('orders', function (Blueprint $table) {
            $table->comment('8653d010-cb08-11ed-b1fe-7bfc986b8bb8');
            $table->bigIncrements('order_id');
            $table->string('numer_zamowienia', 30)->unique('orders_UN');
            $table->string('type', 50);
            $table->dateTime('order_date');
            $table->decimal('total_to_pay_amount', 10);
            $table->string('total_to_pay_currency', 10);
            $table->decimal('total_paid_amount', 10)->nullable();
            $table->string('total_paid_currency', 10)->nullable();
            $table->text('seller_notes')->nullable();
            $table->text('buyer_notes')->nullable();
            $table->string('status', 50);
            $table->text('tracking_numbers')->nullable();
            $table->unsignedBigInteger('user_id')->index('orders_FK');
            $table->string('payment_id', 40)->nullable()->index('orders2_FK_2');
            $table->unsignedBigInteger('delivery_id')->nullable()->index('orders2_FK_3');
            $table->unsignedBigInteger('invoice_id')->nullable()->index('orders2_FK_4');
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
        Schema::dropIfExists('orders');
    }
};
