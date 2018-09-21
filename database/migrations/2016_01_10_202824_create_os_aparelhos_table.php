<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsAparelhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_aparelhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('idOs');
            $table->integer('idTipoAparelho');
            $table->integer('idTipoServico');
            
            $table->string('aparelho', 50);
            $table->string('marca', 20);
            $table->string('modelo',20);
            $table->string('identificador', 12);
            $table->string('numeroSerie', 30);
            $table->text("descricaoDefeito");
            $table->text("observacoes");
            $table->text('descricaoConserto');
            $table->char('situacaoOrcamento',1);//1-Não Feito; 2-Feito; 3-Aprovado; 4-Recusado
            $table->char('aguardarCliente', 1)->default('n'); //s-sim; n=não
//situacaoServico = 1-Não Feito; 2-Em execução; 3-Finalizado; 4-Aguardando peça; 5-Em orçamento
            $table->char('situacaoServico',1);
            $table->char('orcamentoPassado', 1)->default('n');
            $table->char('consertoAvisado', 1)->default('n');
            $table->char('garantia', 1)->default('n'); //s-sim; n-não
            $table->decimal('valorOrcamento', 10, 2);
            $table->decimal('valorPago', 10, 2);
            $table->date('dataAgendada');
            $table->date('dataRetirada');
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
        Schema::drop('os_aparelhos');
    }
}
