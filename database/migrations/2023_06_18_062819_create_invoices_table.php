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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', 20)->unique('invoices_UN');
            $table->string('delivery_reference', 100)->index('invoices_FK');
            $table->date('date_of_issue');
            $table->date('sale_date');
            $table->string('payment_method', 50);
            $table->decimal('total_netto', 10);
            $table->decimal('total_brutto', 10);
            $table->string('status', 20);
            $table->string('invoice_name', 100);
            $table->string('invoice_company_name', 100);
            $table->string('invoice_street', 200);
            $table->string('invoice_zip_code', 20);
            $table->string('invoice_city', 100);
            $table->string('invoice_country', 100);
            $table->string('invoice_tax_id', 50);
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
        Schema::dropIfExists('invoices');
    }
};
