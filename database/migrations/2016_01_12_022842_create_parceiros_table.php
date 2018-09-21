    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('parceiros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idEmpresa');
            $table->timestamps();
            $table->char('cod_cplus', 8); //codigo do cliente no CPlus
            $table->string('cnpj', 18);
            $table->string('inscricao', 12);
            $table->char('tipoParceiro', 1); //c=cliente; f=fornecedor; a=ambos
            $table->string('nome', 100);
            $table->string('endereco',150);
            $table->string('bairro',30);
            $table->string('cidade',30);
            $table->string('uf',2);
            $table->string('cep',10);
            $table->string('telefone',13);
            $table->string('celular', 15);
            $table->string('email', 60);
            $table->decimal('credito',10,2);
            $table->boolean('bloqueado');
            $table->text('observacoes');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('parceiros');
    }
}
