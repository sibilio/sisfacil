<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OsTipoServico as TipoServico;

class TipoServicoController extends Controller
{
    public function all(){
    	$tiposServicos = TipoServico::where('idEmpresa', 1)->paginate(30);
    	return view('os.tipo-servico.listagem')
                    ->with('tiposServicos', $tiposServicos);
    }

    public function delete($id){
    	$tipoServico = TipoServico::find($id);
    	$tipoServico->delete();
    	return redirect()->action('TipoServicoController@all');
    }

    public function telaEdicao($id){
        $tipoServico = TipoServico::find($id);
        return view('os.tipo-servico.editar')
                    ->with('tipoServico', $tipoServico);
    }

    public function telaAdicionar(){
        $tipoServico = new TipoServico();
        return view('os.tipo-servico.adicionar')
                    ->with('tipoServico', $tipoServico);
    }

    public function adicionar(Request $request){
        $tipoServico = new TipoServico();
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = $request->input('tipo-servico');
        $tipoServico->preco = $request->preco;
        $tipoServico->custo = $request->custo;
        $tipoServico->grauDificuldade = $request->input('grau-dificuldade');
        $tipoServico->prazoEntrega = $request->input('prazo-entrega');
        $tipoServico->observacoes = $request->observacoes;
        $tipoServico->save();

        return redirect()->action('TipoServicoController@all');
    }

    public function editar(Request $request){
        $tipoServico = TipoServico::find($request->id);
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = $request->input('tipo-servico');
        $tipoServico->preco = $request->preco;
        $tipoServico->custo = $request->custo;
        $tipoServico->grauDificuldade = $request->input('grau-dificuldade');
        $tipoServico->prazoEntrega = $request->input('prazo-entrega');
        $tipoServico->observacoes = $request->observacoes;
        $tipoServico->save();

        return redirect()->action('TipoServicoController@all');
    }

    public function procurar(Request $request){
        $tiposServicos = TipoServico::where('tipoServico', 'like', $request->criterio)
                                    ->orderBy('tipoServico')
                                    ->paginate(30);
        return view('os.tipo-servico.listagem')->with('tiposServicos', $tiposServicos);
    }
}
