<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsOrdemServico extends Model
{
    protected $table = "os_ordem_servicos";

    protected $fillable = [
    	'idCliente',
    	'dataEntrada',
    	'dataFechamento',
    	'outrosContatos',
        'acessorios',
        'observacoes'
    ];

    public function cliente(){
    	return $this->belongsTo('App\Parceiro', 'idCliente');
    }

    public function aparelhos(){
    	return $this->hasMany('App\OsAparelho','idOs', 'id');
    }
}
