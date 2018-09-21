<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OsTipoAparelho as TipoAparelho;

class TipoAparelhoController extends Controller
{
	public function acao(Request $request){
		switch ($request->input('opcao')){
			case '1':
				$this->gravar($request);
				return redirect()->action('TipoAparelhoController@all');
				break;
			case '2': //Salvar edição
				$this->editar($request);
				return redirect()->action('TipoAparelhoController@all');
				break;
		}
	}

    public function all(){
    	$tipoAparelho = TipoAparelho::where("idEmpresa", 1)->get();
    	return view("os.tipo-aparelho")
    		->with('tipoAparelho', $tipoAparelho)
    		->with('id',"")
    		->with('tipo', "")
    		->with('opcao', "");
    }

    public function delete($id){
    	$tipoAparelho = TipoAparelho::find($id);
    	$tipoAparelho->delete();
    	return redirect()->action('TipoAparelhoController@all');
    }

    public function prepararEdicao($id){
    	$tipo = TipoAparelho::find($id);
    	$tipoAparelho = TipoAparelho::where("idEmpresa", 1)->get();
    	return view('os.tipo-aparelho')
					 ->with('id', $tipo->id)
					 ->with('tipo', $tipo->tipoAparelho)
					 ->with('tipoAparelho', $tipoAparelho)
					 ->with('opcao', '2');
    }

    private function gravar(Request $request){
    	$tipoAparelho = new TipoAparelho();
    	$tipoAparelho->idEmpresa = '1';
    	$tipoAparelho->tipoAparelho = $request->input('tipo-aparelho');
    	$tipoAparelho->save();
    }

    private function editar(Request $request){
    	$tipoAparelho = TipoAparelho::find($request->input('id'));
    	$tipoAparelho->tipoAparelho = $request->input("tipo-aparelho");
    	$tipoAparelho->save(); 
    }

}
