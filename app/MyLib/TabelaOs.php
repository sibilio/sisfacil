<?php
namespace App\MyLib;

class TabelaOs{
	public static function tagServico($situacao, $garantia){
		if($garantia == 's')
			return "<div class='garantia'><div class='texto-tag'>Garantia</div></div>";
		else
			switch ($situacao) {
				case '1':
					return "<div class='nao-iniciado'><div class='texto-tag'>Não iniciado</div></div>";

					break;
				case '2':
					return "<div class='em-orcamento'><div class='texto-tag'>Em execução</div></div>";
					break;
				case '3':
					return "<div class='finalizado'><div class='texto-tag'>Executado</div></div>";
					break;
				case '4':
					return "<div class='aguarda-peca'><div class='texto-tag'>Aguardando peça</div></div>";
					break;
				case '5':
					return "<div class='em-orcamento'><div class='texto-tag'>Em orçamento</div></div>";
					break;
			}
	}

//Colocada em desuso utilizar App\MyLib\Data::mySqlToData($data)
	public static function dataOs($dataOs){
		$data = new \DateTime($dataOs);
		return ($data->format('d/m/Y')=='30/11/-0001'?'':$data->format('d/m/Y'));
	}
}