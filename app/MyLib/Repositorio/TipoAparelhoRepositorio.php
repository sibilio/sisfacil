<?php
namespace App\MyLib\Repositorio;

use App\OsTipoAparelho;

class TipoAparelhoRepositorio{

	public static function comboBox($val=""){
		$tiposAparelhos = OsTipoAparelho::where('idEmpresa',1)
									  ->orderBy('tipoAparelho')
									  ->get();
		$html = "<div class='selectContainer'>";						
	  	$html .= "<select class='form-control' name='idTipoAparelho' value='".$val."'>";							
		foreach ($tiposAparelhos as $tipoAparelho) {
			$html .= "<option  class='form-control' value='";
			$selected = ($tipoAparelho->id==$val?'selected':'');
			$html .= $tipoAparelho->id."'".$selected.">".$tipoAparelho->tipoAparelho."</option>";
		}
		$html .= "</select></div>";
	return $html;
	}
}