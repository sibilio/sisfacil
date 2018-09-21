<?php

use Illuminate\Database\Seeder;
use App\OsTipoAparelho as TipoAparelho;

class TipoAparelhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "Tablet";
        $tipo->idEmpresa = "1";
        $tipo->save();

        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "Notebook";
        $tipo->idEmpresa = "1";
        $tipo->save();

        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "PCs";
        $tipo->idEmpresa = "1";
        $tipo->save();

        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "Vídeo Games";
        $tipo->idEmpresa = "1";
        $tipo->save();

        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "Celular";
        $tipo->idEmpresa = "1";
        $tipo->save();

        $tipo = new TipoAparelho();
        $tipo->tipoAparelho = "Outros";
        $tipo->idEmpresa = "1";
        $tipo->save();
    }
}
