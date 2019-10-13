<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->string('items');
            $table->integer('cost_kg');
            $table->integer('user_id'); 
            $table->integer('weight');
            $table->float('price');          
            $table->mediumText('remark');
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
        Schema::dropIfExists('stocks');
    }
}
