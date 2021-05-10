<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('client_id');

            // dates
            $table->date('invoiceDate')->nullable(); // datum računa
            $table->date('invoiceServiceFrom')->nullable(); // datum opravljene storitve od
            $table->date('invoiceServiceUntil')->nullable(); // datum opravljene storitve do
            $table->date('invoiceDateOfMaturity')->nullable(); // datum zapadlosti
            $table->date('invoiceDateOfOrder')->nullable(); // datum naročila

            // prices
            $table->decimal('totalExcludingVAT', $precision = 10, $scale = 2)->nullable(); // skupaj brez DDV
            $table->decimal('discountPercent', $precision = 10, $scale = 2)->nullable(); // popust v %
            $table->decimal('discountAmount', $precision = 10, $scale = 2)->nullable(); // popust v €
            $table->decimal('amountExludingVAT', $precision = 10, $scale = 2)->nullable(); // znesek brez DDV
            $table->decimal('amountIncludingVAT', $precision = 10, $scale = 2)->nullable(); // znesek z DDV

            // status
            $table->decimal('paidAmount', $precision = 10, $scale = 2)->nullable(); // koliko je plačano
            $table->timestamps();

            // indexes
            $table->index('user_id');
            $table->index('client_id');
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
}
