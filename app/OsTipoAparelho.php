<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsTipoAparelho extends Model
{
	protected $table = "os_tipo_aparelhos";
	protected $fillable = [
		'tipoAparelho'
	];  

	public function aparelhos(){
		return hasOne('App\OsOrdemServico', 'id', 'idTipoAparelho');
	}  
}
