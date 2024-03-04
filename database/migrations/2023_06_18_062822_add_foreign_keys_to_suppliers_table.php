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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->foreign(['address_id'], 'suppliers_FK')->references(['id'])->on('supplier_addresses')->onDelete('CASCADE');
            $table->foreign(['company_id'], 'suppliers_FK_2')->references(['id'])->on('supplier_companies')->onDelete('CASCADE');
            $table->foreign(['contact_id'], 'suppliers_FK_1')->references(['id'])->on('supplier_contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign('suppliers_FK');
            $table->dropForeign('suppliers_FK_2');
            $table->dropForeign('suppliers_FK_1');
        });
    }
};
