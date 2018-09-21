<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsLaudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_laudos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idOsAparelho');
            $table->dateTime('data');
            $table->text('laudo');
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
        Schema::drop('os_laudos');
    }
}
