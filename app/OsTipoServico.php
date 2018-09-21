<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsTipoServico extends Model
{
    protected $table = 'os_tipo_servicos';

    protected $fillable =[
    	'tipoServico',
    	'idEmpresa',
    	'preco',
    	'custo',
    	'grauDificuldade',
    	'prazoEntrega',
    	'observacoes'
    ];

    function aparelhos(){
        return hasOne('App\OsOrdemServico', 'id', 'idTipoServico');
    }
}
