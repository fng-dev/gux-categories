<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuxProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gux_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('gux_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gux_products');
    }
}
