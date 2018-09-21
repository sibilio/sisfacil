<?php
namespace App\MyLib;

class Data{
	public static function dataToMySql($data){
		if($data=="")
			return "";

		$datas = explode("/", $data);
		$novaData = $datas[2]."-".$datas[1]."-".$datas[0];
		$novaData .= " 00:00:00";

		return date('Y-m-d H:i:s', strtotime($novaData));
	}

	public static function mySqlToData($mysql){
		if($mysql=="")
			return "";
		$data = new \DateTime($mysql);
		return ($data->format('d/m/Y')=='30/11/-0001'?'':$data->format('d/m/Y'));
	}

	//Usar data no formato d/m/Y
	public static function dataMenorQueHoje($data)
	{
		\date_default_timezone_set('America/Sao_Paulo');
		
		//pega a data de hoje
		$hoje = \date('Y/m/d', time());

		//data para comparação
		$dataComparar = new \DateTime($data);
		$dataStr = $dataComparar->format('Y/m/d');

		return (strtotime($dataStr)<=strtotime($hoje)?true:false);
	}

}