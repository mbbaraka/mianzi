<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->references('id')->on('customers')->ondelete('cascade');
            $table->unsignedBigInteger('region_id')->references('id')->on('regions');
            $table->unsignedBigInteger('district_id')->references('id')->on('districts');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
            $table->enum('default', ['0', '1']);
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
        Schema::dropIfExists('addresses');
    }
}
