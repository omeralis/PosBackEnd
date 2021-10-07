<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('purchaseNo');
            $table->date('purchaseDate');
            $table->integer('itemNo');
            $table->integer('supplierNo');
            $table->integer('quantity');
            $table->integer('alarmQuantity');
            $table->integer('cost');
            $table->integer('priceItem');
            $table->text('other')->nullable();;
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
        Schema::dropIfExists('stores');
    }
}
