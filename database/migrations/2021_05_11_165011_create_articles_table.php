<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id'); // invoice reference
            $table->unsignedBigInteger('product_id'); // product reference

            $table->integer("quantity")->nullable;
            $table->decimal('price', $precision = 10, $scale = 2)->nullable; // sellingPrice * quantity
            $table->decimal('discount', $precision = 10, $scale = 2)->nullable;
            $table->decimal('taxRate', $precision = 10, $scale = 2)->nullable;

            $table->timestamps();

            $table->index('invoice_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Articles');
    }
}
