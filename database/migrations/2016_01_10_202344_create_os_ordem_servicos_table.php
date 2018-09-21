<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_ordem_servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idEmpresa');
            $table->timestamps();
            $table->bigInteger('idCliente');
            $table->dateTime('dataEntrada');
            $table->dateTime('dataFechamento');
            $table->text('outrosContatos');
            $table->text('observacoes');
            $table->string('acessorios', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('os_ordem_servicos');
    }
}
