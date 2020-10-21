<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('customer_id')->references('id')->on('customers')->ondelete('cascade');
            $table->unsignedBigInteger('address_id')->references('id')->on('addresses');
            $table->unsignedBigInteger('order_status_id')->references('id')->on('order_status');
            $table->unsignedBigInteger('shipping_id')->references('id')->on('shippings');
            $table->string('total_price');
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
        Schema::dropIfExists('orders');
    }
}
