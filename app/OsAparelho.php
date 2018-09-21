<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsAparelho extends Model
{
    protected $table = "os_aparelhos";
    protected $fillable = [
    	'idOs',
    	'idTipoAparelho',
    	'idTipoServico',
    	'aparelho',
    	'marca',
    	'modelo',
    	'numeroSerie',
        'identificador',
    	'descricaoDefeito',
    	'situacaoOrcamento',
        'descricaoConserto',
    	'aguardarCliente',
    	'situacaoServico',
    	'dataRetirada',
        'dataAgendada',
    	'garantia',
        'observacoes',
        'valorOrcamento',
        'valorPago',
        'orcamentoPassado',
        'consertoAvisado'
    ];

    public function os(){
        return $this->belongsTo('App\OsOrdemServico', 'idOs', 'id');
    }

    public function tipoAparelho(){
        return $this->belongsTo('App\OsTipoAparelho', 'idTipoAparelho', 'id');
    }

    public function tipoServico(){
        return $this->belongsTo('App\OsTipoServico', 'idTipoServico', 'id');
    }

    public function laudos(){
        return $this->hasMany('App\OsLaudo','idOsAparelho','id');
    }
}
