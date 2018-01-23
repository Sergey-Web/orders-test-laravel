<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('id_counterpaty')->unsigned();
            $table->string('name', 50);
            $table->foreign('id_counterpaty')
                ->references('id')
                ->on('counterparties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->float('price', 8, 2)->unsigned();
            $table->smallInteger('count')->unsigned();
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
