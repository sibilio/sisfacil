<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OsOrdemServico as OS;
use App\Parceiro;
use App\OsAparelho;
use App\OsLaudo;

class OrdemDeServicoController extends Controller
{
	public function all(){
		$ordens = OS::where('idEmpresa',1)
					->where('dataFechamento', '0000-00-00 00:00:00')
					->paginate(10);
		return view('os.ordem-de-servico.listagem')->with("ordens", $ordens);
	}

	public function telaAdicionar1(){
		$parceiros = Parceiro::where("idEmpresa", 1)->paginate(30);
		return view('os.ordem-de-servico.adicionar1')
						->with("parceiros", $parceiros)
						->with("idCliente", "")
						->with("nome", "")
						->with("telefone", "");
	}

	public function telaAdicionar2($id){
		$parceiro = Parceiro::find($id);
		return view('os.ordem-de-servico.adicionar2')->with("parceiro", $parceiro);
	}

	public function telaAdicionar3(Request $request){
		$os = $request->all();
		return view('os.ordem-de-servico.adicionar3')->with("os", $os);
	}

	public function procurarAdicionar1(Request $request){
		$idCliente = $request['idCliente'];
		$nome = $request['nome'];
		$telefone = $request['telefone'];
		if($request['idCliente'] != null)
			$parceiros = Parceiro::where("idEmpresa", 1)
								 ->where("id", $request['idCliente'])
								 ->paginate(30);
		else if($request['nome'] != null)
			$parceiros = Parceiro::where("idEmpresa", 1)
								 ->where("nome", "like", $request['nome'])
								 ->paginate(30);
		else if($request['telefone'] != null)
			$parceiros = Parceiro::where("idEmpresa", 1)
								 ->where("telefone", "like", $request['telefone'])
								 ->paginate(30);
		else
			$parceiros = Parceiro::where("idEmpresa", 1)->paginate(30);

		return view('os.ordem-de-servico.adicionar1')
						->with("parceiros", $parceiros)
						->with("idCliente", $idCliente)
						->with("nome", $nome)
						->with("telefone", $telefone);
	}	

	public function confirmarOs(Request $request){
		$os = OS::create($request->all());
		$os->idEmpresa = "1";
		$os->dataEntrada = date('Y/m/d H:i:s', time());
		$os->save();

		return view('os.ordem-de-servico.adicionar3')->with('os', $os);
	}

	public function salvarNovoAparelho(Request $request){
		$aparelho = OsAparelho::create($request->all());
		$aparelho->situacaoServico = '1';
		$aparelho->save();
		$os = OS::findOrFail($aparelho->idOs);

		return view('os.ordem-de-servico.adicionar3')->with('os', $os);
	}

	public function excluirOs($idOs){
		$os = OS::findOrFail($idOs);
		foreach ($os->aparelhos as $aparelho) {
			$aparelho->delete();
		}
		$os->delete();
		return redirect()->action('OrdemDeServicoController@all');
	}

	public function editarAparelho($idAparelho){
		$aparelho = OsAparelho::findOrFail($idAparelho);
		return view('os.ordem-de-servico.editar-aparelho')
					->with('aparelho', $aparelho);
	}

	public function salvarEdicaoAparelho(Request $request){
		$aparelho = OsAparelho::findOrFail($request['id']);
		$aparelho->fill($request->all());
		$aparelho->garantia = ($request['garantia']=='s'?'s':'n');
		$aparelho->aguardarCliente = ($request['aguardarCliente']=='s'?'s':'n');
		$aparelho->orcamentoPassado = ($request['orcamentoPassado']=='s'?'s':'n');
		$aparelho->consertoAvisado = ($request['consertoAvisado']=='s'?'s':'n');
		$aparelho->dataAgendada = \App\MyLib\Data::dataToMySql($request['dataAgendada']);
		$aparelho->dataRetirada = \App\MyLib\Data::dataToMySql($request['dataRetirada']);
		$aparelho->save();
		return redirect()->action('OrdemDeServicoController@all');
	}

	public function salvarLaudo(Request $request){
		$laudo = OsLaudo::create($request->all());
		\date_default_timezone_set('America/Sao_Paulo');
		$laudo->data = date('Y-m-d H:i:s');
		$laudo->save();

		return redirect()->action('OrdemDeServicoController@editarAparelho', $laudo->idOsAparelho);
	}

	public function excluirLaudo($idLaudo){
		$laudo = OsLaudo::findOrFail($idLaudo);
		$idOsAparelho = $laudo->idOsAparelho;
		$laudo->delete();

		return redirect()->action('OrdemDeServicoController@editarAparelho',$idOsAparelho);
	}

	public function telaEdicaoOs($idOs){
		$os = OS::findOrFail($idOs);

		return view('os.ordem-de-servico.editar-os')->with('os', $os);
	}

	public function salvarEdicaoOs(Request $request){
		$os = OS::findOrFail($request['id']);
		$os->fill($request->all());
		$os->dataFechamento = \App\MyLib\Data::dataToMySql($request['dataFechamento']);
		$os->save();

		return redirect()->action('OrdemDeServicoController@all');
	}

//Funções dos relatórios
	public function imprimirGuiaDeServico($idOs)
	{
		$os = OS::findOrFail($idOs);
		return view('relatorios.os.guia-de-ordem-de-servico')
					->with('os', $os);
	}

	public function imprimirRetiradaOs($idOs){
		$os = OS::findOrFail($idOs);
		return view('relatorios.os.fechamento-de-ordem-de-servico')
					->with('os', $os);
	}

}
