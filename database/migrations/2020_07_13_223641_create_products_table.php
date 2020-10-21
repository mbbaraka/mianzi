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
            $table->id();
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->text('description');
            $table->text('information');
            $table->string('qty');
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->string('type')->nullable();
            $table->enum('featured', ['0', '1']);
            $table->string('publish_date');
            $table->enum('status', ['1', '0']);            
            $table->string('sold')->nullable();
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
        Schema::dropIfExists('products');
    }
}
