<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_counterpaty')->unsigned();
            $table->foreign('id_counterpaty')
                ->references('id')
                ->on('counterpaties')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->smallInteger('receipt');
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
        Schema::dropIfExists('storage');
    }
}
