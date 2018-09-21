<?php

use Illuminate\Database\Seeder;
use App\Parceiro;

class ParceirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        for($i=0; $i<30; $i++)
        {
            $cli = new Parceiro;
            $cli->idEmpresa = "1";
            $cli->nome = "Rui Alexandre Sibilio";
            $cli->cnpj = "45.650.118/0001-01";
            $cli->inscricao = "";
            $cli->endereco = str_random(7)." ".str_random(8);
            $cli->bairro = str_random(10);
            $cli->cidade = "Peruibe";
            $cli->uf = "SP";
            $cli->cep = "11.750-000";
            $cli->telefone = "(13)8885-3332";
            $cli->celular = "(13)97-676-3233";
            $cli->email = str_random(10)."@gmail.com";
            $cli->credito=0.00;
            $cli->bloqueado = false;
            $cli->tipoParceiro = 'a';
            $cli->save();

            $cli = new Parceiro;
            $cli->idEmpresa = "1";
            $cli->nome = "Carlos Eduardo Sibilio";
            $cli->cnpj = "65.783.786/0001-06";
            $cli->inscricao = "";
            $cli->endereco = str_random(7)." ".str_random(8);
            $cli->bairro = str_random(10);
            $cli->cidade = "Peruibe";
            $cli->uf = "SP";
            $cli->cep = "11.750-000";
            $cli->telefone = "(13)8235-3332";
            $cli->celular = "(13)95-676-3098";
            $cli->email = str_random(10)."@gmail.com";
            $cli->credito=0.00;
            $cli->bloqueado = false;
            $cli->tipoParceiro = 'f';
            $cli->save();

            $cli = new Parceiro;
            $cli->idEmpresa = "1";
            $cli->nome = "Kátia Cristina Sibilio";
            $cli->cnpj = "72.036.552/0001-60";
            $cli->inscricao = "";
            $cli->endereco = str_random(7)." ".str_random(8);
            $cli->bairro = str_random(10);
            $cli->cidade = "Peruibe";
            $cli->uf = "SP";
            $cli->cep = "11.750-000";
            $cli->telefone = "(13)8435-1111";
            $cli->celular = "(13)97-211-0099";
            $cli->email = str_random(10)."@gmail.com";
            $cli->credito=0.00;
            $cli->bloqueado = false;
            $cli->tipoParceiro = 'c';
            $cli->save();

            $cli = new Parceiro;
            $cli->idEmpresa = "1";
            $cli->nome = "Beatriz Duarte Sibilio";
            $cli->cnpj = "525.721.870-43";
            $cli->inscricao = "";
            $cli->endereco = str_random(7)." ".str_random(8);
            $cli->bairro = str_random(10);
            $cli->cidade = "Peruibe";
            $cli->uf = "SP";
            $cli->cep = "11.750-000";
            $cli->telefone = "(13)8333-1199";
            $cli->celular = "(13)94-222-0077";
            $cli->email = str_random(10)."@gmail.com";
            $cli->credito=0.00;
            $cli->bloqueado = false;
            $cli->tipoParceiro = 'c';
            $cli->save();
        }
    }*/
        $user = "SYSDBA";
        $pass = "m74e71";
        $str_conn="firebird:host=localhost;dbname=/home/marcos/Documentos/cplus/CPLUS.GDB;charset=CP1252";
        $count = 1;
        try{
            $lokos=new PDO($str_conn,$user,$pass);
            $sql = "select * from CLIENTE";
            $stmt = $lokos->prepare($sql);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($dados as $cplus) {
                $parceiro = new Parceiro();

                if($cplus->CNPJ == NULL)
                    $cnpj = $cplus->CNPJ;
                else
                    $cnpj = $cplus->CPF;

                if($cplus->INSCR == NULL)
                    $inscricao = $cplus->INSCR;
                else
                    $inscricao = $cplus->IDENTIDADE;

                $parceiro->idEmpresa = 1;
                $parceiro->cod_cplus = $cplus->CODCLI;
                $cnpj == null ? $parceiro->cnpj="":$parceiro->cnpj=$cnpj;
                $inscricao == null ? $parceiro->inscricao="":$parceiro->inscricao=$inscricao;
                $parceiro->tipoParceiro = 'c';
                $parceiro->nome = $cplus->NOMECLI;
                $cplus->ENDERECO == null ? $parceiro->endereco="":$parceiro->endereco = mb_convert_encoding($cplus->ENDERECO,"UTF8", "CP1252");
                $cplus->BAIRRO == null ? $parceiro->bairro="":$parceiro->bairro = mb_convert_encoding($cplus->BAIRRO,"UTF8", "CP1252");;
                $cplus->CIDADE == NULL ? $parceiro->cidade="":$parceiro->cidade = mb_convert_encoding($cplus->CIDADE,"UTF8", "CP1252");;
                $cplus->ESTADO == NULL ? $parceiro->uf="":$parceiro->uf = mb_convert_encoding($cplus->ESTADO,"UTF8", "CP1252");;
                $cplus->CEP == NULL ? $parceiro->cep="":$parceiro->cep = mb_convert_encoding($cplus->CEP,"UTF8", "CP1252");;
                $cplus->TELEFONE == NULL ? $parceiro->telefone="":$parceiro->telefone = mb_convert_encoding($cplus->TELEFONE,"UTF8", "CP1252");;
                $parceiro->save();

                echo $count." - ".$parceiro->nome."\n";
                $count ++;
                if ($count == 10) exit;
            }
            return "Processo terminado!";
        } catch(PDOException $e) {
            echo "Falha na conexão.".$e->getcode();
        }
    }
}
