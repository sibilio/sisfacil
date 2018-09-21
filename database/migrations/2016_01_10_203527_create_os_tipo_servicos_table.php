<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsTipoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*  Tipo de serviço é o serviço principal para se fazer em um aparelho
            Ex.: Um computador entra para formatar, mas a pedido do cliente
            também é preciso verificar se o leitor de DVD está funcionando
            no tipo de serviço vamos colocar "Formatação", isso também facilita
            para o técnico pois na tabela de servços pode ter vários serviços de formatação
            (ex. com backup ou sem backup) e pelo serviço principal é possível com mais
            facilidade prever um tempo de serviço. */
        Schema::create('os_tipo_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('idEmpresa');
            $table->string('tipoServico', 50);
            $table->decimal('preco', 6, 2);
            $table->integer('custo');   //custo de horas de um serviço
            $table->smallInteger('grauDificuldade'); // grau de dificuldade do serviço de 1 a 5,
                                                     // onde 1 é baixissímo e 5 é altíssimo
            $table->integer('prazoEntrega');    //prazo estimado para conclusão do serviço (em dias)
            $table->text('observacoes');
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
        Schema::drop('os_tipo_servicos');
    }
}
