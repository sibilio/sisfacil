<?php
namespace App\MyLib\Repositorio;

use App\OsOrdemServico as OS;

class OrdemServicoRepositorio
{
	public static function totalOs($idOs)
	{
		$os = OS::findOrFail($idOs);
		$total = 0;
		foreach ($os->aparelhos as $aparelho)
		{
			$total += $aparelho->valorPago;
		}

		return number_format($total, 2, ',', '.');
	}
}