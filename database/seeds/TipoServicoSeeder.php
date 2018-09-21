<?php

use Illuminate\Database\Seeder;
use App\OsTipoServico as TipoServico;

class TipoServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipoServico = new TipoServico();
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = "Formatação";
        $tipoServico->preco = 90.00;
        $tipoServico->custo = 48;
        $tipoServico->grauDificuldade = 1;
        $tipoServico->prazoEntrega = 2;
        $tipoServico->observacoes = "";
        $tipoServico->save();

        $tipoServico = new TipoServico();
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = "Desbloqueio Xbox-360";
        $tipoServico->preco = 250.00;
        $tipoServico->custo = 2;
        $tipoServico->grauDificuldade = 2;
        $tipoServico->prazoEntrega = 2;
        $tipoServico->observacoes = "";
        $tipoServico->save();

        $tipoServico = new TipoServico();
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = "Reparo de entrada dos controles de play2";
        $tipoServico->preco = 120.00;
        $tipoServico->custo = 2;
        $tipoServico->grauDificuldade = 3;
        $tipoServico->prazoEntrega = 7;
        $tipoServico->observacoes = "";
        $tipoServico->save();

        $tipoServico = new TipoServico();
        $tipoServico->idEmpresa = 1;
        $tipoServico->tipoServico = "Desbloqueio de plastation 2";
        $tipoServico->preco = 130.00;
        $tipoServico->custo = 1;
        $tipoServico->grauDificuldade = 3;
        $tipoServico->prazoEntrega = 7;
        $tipoServico->observacoes = "";
        $tipoServico->save();
    }
}
