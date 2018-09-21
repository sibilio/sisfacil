<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $fillable = [
        'cnpj',
        'inscricao',
        'tipoParceiro',
    	'nome',
    	'endereco',
    	'bairro',
    	'cidade',
    	'uf',
    	'cep',
    	'telefone',
    	'celular',
    	'email',
    	'observacoes'
    ];

    public function ordensDeServico(){
        return $this->hasMany('App\OsOrdemServico', 'idCliente', 'id');
    }
}
