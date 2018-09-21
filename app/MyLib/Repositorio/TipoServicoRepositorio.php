<?php
namespace App\MyLib\Repositorio;

use App\OsTipoServico;

class TipoServicoRepositorio{

	public static function comboBox($val=""){
		$tiposServicos = OsTipoServico::where('idEmpresa',1)
									  ->orderBy('tipoServico')
									  ->get();
		$html = "<div class='selectContainer'>";						
	  	$html .= "<select class='form-control' name='idTipoServico'>";							
		foreach ($tiposServicos as $tipoServico) {
			$selected = ($tipoServico->id==$val?'selected':'');
			$html .= "<option  class='form-control' value='";
			$html .= $tipoServico->id."'".$selected.">".$tipoServico->tipoServico." -> R$ ".$tipoServico->preco."</option>";
		}
		$html .= "</select></div>";
	return $html;
	}
}