<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('category_id');
    
                $table->string('name');
                $table->string('shortName')->nullable();
                $table->string('brand')->nullable();
                $table->string('type')->nullable(); //artikel ali storitev
                $table->string('unitOfMeasure')->nullable(); //kos, liter, meter, ...
                $table->decimal('purchasePrice', $precision = 10, $scale = 2)->nullable();
                $table->decimal('sellingPrice', $precision = 10, $scale = 2)->nullable();
    
                $table->timestamps();
                $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
