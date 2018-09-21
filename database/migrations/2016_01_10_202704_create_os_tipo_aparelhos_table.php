<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsTipoAparelhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Tipo de aparelho significa sua classificação segundo o que ele é.
           Ex: Vídeo game, TV, computador, notebook, tablets. Todos são tipos
           diferentes de aparelhos eletrônicos. */
        Schema::create('os_tipo_aparelhos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('idEmpresa');
            $table->string('tipoAparelho', 30);
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
        Schema::drop('os_tipo_aparelhos');
    }
}
