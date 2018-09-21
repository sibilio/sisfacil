<?php

use Illuminate\Database\Seeder;
use App\OsOrdemServico as OS;
use App\OsAparelho as Aparelho;

class OrdemServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $osCount = 0;
      for ($c=0; $c<10; $c++)
            {
          //Gera dados na tabela de ordem de serviço
             $os = new OS(); //id=1
             $os->idEmpresa = 1;
             $os->idCliente = 25693+$c;
             $os->dataEntrada = "2016-01-10";
             $os->outrosContatos = "";
             $os->save();

             $os = new OS(); //id=2
             $os->idEmpresa = 1;
             $os->idCliente = 28743+$c;
             $os->dataEntrada = "2016-01-12";
             $os->outrosContatos = "";
             $os->save();

             $os = new OS(); //id=3
             $os->idEmpresa = 1;
             $os->idCliente = 24799+$c;
             $os->dataEntrada = "2016-01-16";
             $os->outrosContatos = "Roberto";
             $os->save();

             $os = new OS(); //id=4
             $os->idEmpresa = 1;
             $os->idCliente = 25449+$c;
             $os->dataEntrada = "2016-01-17";
             $os->outrosContatos = "Josefa";
             $os->save();


          //Gera os dados dos aparelhos na tabela os_aparelhos
             //1ª ordem de serviço
             $aparelho = new Aparelho();
             $aparelho->idOs = 1+$osCount;
             $aparelho->idTipoAparelho = 2;
             $aparelho->idTipoServico = 1;
             $aparelho->aparelho = "notebook samsung";
             $aparelho->marca = "Samsung";
             $aparelho->modelo = "RV411";
             $aparelho->descricaoDefeito = "Inicializa o windows mas está muito lento";
             $aparelho->situacaoOrcamento = '2';
             $aparelho->valorOrcamento = 90;
             $aparelho->descricaoConserto = "Formatação com backup";
             $aparelho->aguardarCliente = 'n';
             $aparelho->situacaoServico = '1';
             $aparelho->garantia = 'n';
             $aparelho->identificador = "112901";
             $aparelho->save();

             $aparelho = new Aparelho();
             $aparelho->idOs = 1+$osCount;
             $aparelho->idTipoAparelho = 4;
             $aparelho->idTipoServico = 2;
             $aparelho->aparelho = "xbox 360";
             $aparelho->marca = "microsoft";
             $aparelho->modelo = "xbox-360 slim";
             $aparelho->descricaoDefeito = "Fazer destravamento";
             $aparelho->situacaoOrcamento = '3';
             $aparelho->descricaoConserto = "Feito destravamento com LTU e LT3.0";
             $aparelho->valorOrcamento = 250;
             $aparelho->aguardarCliente = 'n';
             $aparelho->situacaoServico = '2';
             $aparelho->garantia = 'n';
             $aparelho->identificador = "112902";
             $aparelho->save();

             //2ª ordem de serviço
             $aparelho = new Aparelho();
             $aparelho->idOs = 2+$osCount;
             $aparelho->idTipoAparelho = 4;
             $aparelho->idTipoServico = 4;
             $aparelho->aparelho = "play 2";
             $aparelho->marca = "sony";
             $aparelho->modelo = "75001";
             $aparelho->descricaoDefeito = "Troca da unidade optica";
             $aparelho->situacaoOrcamento = '3';
             $aparelho->valorOrcamento = 130;
             $aparelho->descricaoConserto = "Unidade optica e flat trocados";
             $aparelho->aguardarCliente = 'n';
             $aparelho->situacaoServico = '3';
             $aparelho->garantia = 'n';
             $aparelho->identificador = "112903";
             $aparelho->save();

             //3ª ordem de serviço
             $aparelho = new Aparelho();
             $aparelho->idOs = 3+$osCount;
             $aparelho->idTipoAparelho = 3;
             $aparelho->idTipoServico = 1;
             $aparelho->aparelho = "PC";
             $aparelho->marca = "";
             $aparelho->modelo = "core 2 duo";
             $aparelho->descricaoDefeito = "Está lento, formatar. Não esquecer fazer o backup dos meus documentos";
             $aparelho->situacaoOrcamento = '3';
             $aparelho->valorOrcamento = 90;
             $aparelho->descricaoConserto = "Formatado";
             $aparelho->aguardarCliente = 'n';
             $aparelho->situacaoServico = '3';
             $aparelho->garantia = 'n';
             $aparelho->identificador = "112904";
             $aparelho->save();

             //4ª ordem de serviço
             $aparelho = new Aparelho();
             $aparelho->idOs = 4+$osCount;
             $aparelho->idTipoAparelho = 2;
             $aparelho->idTipoServico = 1;
             $aparelho->aparelho = "notebook asus";
             $aparelho->marca = "asus";
             $aparelho->modelo = "K44";
             $aparelho->descricaoDefeito = "liga mas não dá vídeo";
             $aparelho->situacaoOrcamento = '4';
             $aparelho->valorOrcamento = 250;
             $aparelho->descricaoConserto = "Reballing de chipset BGA";
             $aparelho->aguardarCliente = 'n';
             $aparelho->situacaoServico = '4';
             $aparelho->garantia = 'n';
             $aparelho->identificador = "112905";
             $aparelho->save();

             $osCount += 4;
      }
    }
}
