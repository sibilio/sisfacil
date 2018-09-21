<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OsOrdemServico as OS;
use App\OsAparelho as Aparelho;
use App\Parceiro;

class FiltroOsController extends Controller
{

    private $situacaoServico;

    public function filtrarOs(Request $request)
    {
        /*
        $s = ($request['naoFeitoOrcamento']=="")?'vazio':'cheio';
    	return $s; //var_dump($request->all());*/
        $inputArray = [];
        ($request['naoFeitoOrcamento']=='s'?array_push($inputArray, '1'):"");
        ($request['feito']=='s'?array_push($inputArray, '2'):"");
        ($request['aprovado']=='s'?array_push($inputArray, '3'):"");
        ($request['recusado']=='s'?array_push($inputArray, '4'):"");
        $situacaoOrcamento = $inputArray;
        $inputArray = [];

        ($request['naoFeitoServico']=='s'?array_push($inputArray, '1'):"");
        ($request['emExecucao']=='s'?array_push($inputArray, '2'):"");
        ($request['finalizado']=='s'?array_push($inputArray, '3'):"");
        ($request['aguardandoPeca']=='s'?array_push($inputArray, '4'):"");
        ($request['emOrcamento']=='s'?array_push($inputArray, '5'):"");
        $this->situacaoServico = $inputArray;
        $inputArray = [];

        $aparelhos = Aparelho::whereIn('situacaoOrcamento', $situacaoOrcamento)
                      ->orWhere(function($query){
                            $query->whereIn('situacaoServico', $this->situacaoServico);
                      })
                      ->orWhere('garantia', $request['garantia'])
                      ->orWhere('orcamentoPassado', ($request['orcamentoNaoPassado']=='s'?'n':'p'))
                      ->orWhere('consertoAvisado', ($request['consertoNaoAvisado']=='s'?'n':'p'))
                      ->orWhere('aguardarCliente', $request['aguardandoCliente'])
                      ->get();
        
        foreach ($aparelhos as $aparelho)
        {
            array_push($inputArray, $aparelho->idOs);
        }

        $os = OS::whereIn('id', $inputArray)
                ->where('dataFechamento', '0000-00-00 00:00:00')
                ->paginate(100);

        return view('os.ordem-de-servico.listagem')
            ->with('ordens', $os);
    }

    public function telaFiltrarOs()
    {
    	return view('os.ordem-de-servico.tela-filtro-os');
    }

    public function filtrarOsCampo(Request $request)
    {
        $criterios = explode("=", $request['criterio']);
        $inputArray = [];
        $ordens = [];
        switch ($criterios[0])
        {
            case 'no':
                $parceiros = Parceiro::where('nome', 'like', '%'.$criterios[1].'%')->get();
                $numParceiros=0;
                $numOs = 0;
                foreach ($parceiros as $parceiro) 
                {
                    foreach ($parceiro->ordensDeServico as $os)
                    {
                        array_push($inputArray, $os->id);
                        $numOs++;
                    }
                }
                $ordens = OS::whereIn('id', $inputArray)->paginate(10);
                break;
            case 'os':
                $ordens = OS::where('id', 'like', $criterios[1])->paginate(10);
                break;
            case 'nu':
                $aparelhos = Aparelho::where('identificador', 'like', '%'.$criterios[1].'%')->get();
                $numParceiros=0;
                $numOs = 0;
                foreach ($aparelhos as $aparelho) 
                {
                    array_push($inputArray, $aparelho->os->id);
                }
                $ordens = OS::whereIn('id', $inputArray)->paginate(10);
                break;
        }

        return view('os.ordem-de-servico.listagem')
                    ->with('ordens', $ordens);
    }
}