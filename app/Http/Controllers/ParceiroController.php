<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MyLib\ValidaCPFCNPJ;

use App\Http\Requests\ParceirosRequest;
use App\Parceiro;
use \PDO;

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

class ParceiroController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(’auth’);
    }*/

    public function all($tipoParceiro){

        $criterio = "";
        $parceiros = Parceiro::where('tipoParceiro', $tipoParceiro)
                        ->orderBy("nome", "asc")
                        ->paginate(30);

    	return view('parceiro.listagem')
            ->with('parceiros', $parceiros)
            ->with('tipoParceiro', $tipoParceiro)
            ->with('criterio', "");
    }

    public function delete($id){
    	$parceiro = Parceiro::find($id);
    	$tipoParceiro = $parceiro->tipoParceiro;
    	$parceiro->delete();
    	return redirect()->action('ParceiroController@all', $tipoParceiro);
    }

    public function procurar(Request $request){
        $criterio = $request->input('criterio');
        $tipoParceiro = $request->input('tipo_parceiro');
        $parceiros = Parceiro::where('tipoParceiro', '=', $tipoParceiro)
                                ->where('nome','like', $criterio)
                                ->orderBy("nome", "asc")
                                ->paginate(30);

        return view('parceiro.listagem')
            ->with('parceiros', $parceiros)
            ->with('tipoParceiro', $tipoParceiro)
            ->with('criterio', $criterio);
    }

    public function adicionarParceiro(){
        $parceiro = new Parceiro();
        return view('parceiro.adicionar')
                ->with('parceiro', $parceiro);
    }

    public function realizarCadastro(ParceirosRequest $request){
        $parceiro = Parceiro::create($request->all());
        $parceiro->idEmpresa = 1;
        $parceiro->save();

        return redirect()->action('ParceiroController@all', $parceiro->tipoParceiro);
    }

    public function checaCnpj($cnpj){
        $cnpj = str_replace("_", "/", $cnpj);
        $parceiro = Parceiro::where('cnpj', '=', $cnpj)->get();

        if($parceiro->isEmpty()){
            //Como o cnpj/cpf não existe na base de dados, vamos verificar se é
            //válido para podermos adicioná-lo
            $validaDoc = new ValidaCPFCNPJ($cnpj);
            if($validaDoc->valida() == true)
                return ["cnpjExistente"=>false];
            else
                return ["cnpjExistente"=>"invalido"];
        }
        else
            return ["cnpjExistente"=>true];
    }

    public function editar($id){
        $parceiro = Parceiro::where('id', '=', $id)->get()->first();
        if($parceiro==null)
            return redirect()->action('ParceiroController@all', 'c');
        else
            return view('parceiro.adicionar')
                ->with('parceiro', $parceiro);
    }

    public function salvarEdicao(Request $request){
        $id = $request->input('id');

        $parceiro = Parceiro::find($id);
        $parceiro->nome = $request->input('nome');
        $parceiro->cnpj = $request->input('cnpj');
        $parceiro->inscricao = $request->input('inscricao');
        $parceiro->tipoParceiro = $request->input('tipoParceiro');
        $parceiro->endereco = $request->input('endereco');
        $parceiro->bairro = $request->input('bairro');
        $parceiro->cidade = $request->input('cidade');
        $parceiro->uf = $request->input('uf');
        $parceiro->cep = $request->input('cep');
        $parceiro->telefone = $request->input('telefone');
        $parceiro->celular = $request->input('celular');
        $parceiro->email = $request->input('email');
        $parceiro->credito = $request->input('credito');
        $parceiro->bloqueado = $request->input('bloqueado');
        $parceiro->observacoes = $request->input('observacoes');
        $parceiro->save();

        return redirect()->action('ParceiroController@all', 'c');
    }

    public function converter(){
        /*
        $user = "root";
        $pass = "qw743926";
        //;charset=WIN1252
        //$str_conn="firebird:host=localhost;dbname=/home/marcos/Documentos/cplus/CPLUS.GDB";
        $str_conn='mysql:host=localhost;dbname=sisfacil;charset=utf8';
        $count = 1;
        try{
            $lokos=new PDO($str_conn,$user,$pass);
            $sql = "select * from clientes_cplus";
            $stmt = $lokos->prepare($sql);
            $stmt->execute();
            $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($dados as $cplus) {
                $parceiro = new Parceiro();

                if($cplus->CNPJ != NULL)
                    $cnpj = $cplus->CNPJ;
                else
                    $cnpj = $cplus->CPF;

                if($cplus->INSCR != NULL)
                    $inscricao = $cplus->INSCR;
                else
                    $inscricao = $cplus->IDENTIDADE;

                $parceiro->idEmpresa = 1;
                $parceiro->cod_cplus = $cplus->CODCLI;
                $cnpj == null ? $parceiro->cnpj="":$parceiro->cnpj=$cnpj;
                $inscricao == null ? $parceiro->inscricao="":$parceiro->inscricao=$inscricao;
                $parceiro->tipoParceiro = 'c';
                $parceiro->nome = $cplus->NOMECLI;
                $cplus->ENDERECO == null ? $parceiro->endereco="":$parceiro->endereco = $cplus->ENDERECO;
                $cplus->BAIRRO == null ? $parceiro->bairro="":$parceiro->bairro = $cplus->BAIRRO;
                $cplus->CIDADE == NULL ? $parceiro->cidade="":$parceiro->cidade = $cplus->CIDADE;
                $cplus->ESTADO == NULL ? $parceiro->uf="":$parceiro->uf = $cplus->ESTADO;
                $cplus->CEP == NULL ? $parceiro->cep="":$parceiro->cep = $cplus->CEP;
                $cplus->TELEFONE == NULL ? $parceiro->telefone="":$parceiro->telefone = $cplus->TELEFONE;
                $parceiro->save();

                echo "<p>".$count." - ".$parceiro->nome."</p>";
                $count ++;
                //if ($count == 100) exit;
            }
            return "Processo terminado!";
        } catch(PDOException $e) {
            echo "Falha na conexão.".$e->getcode();
        }*/
    }
}
