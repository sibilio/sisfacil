<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsLaudo extends Model
{
    protected $table="os_laudos";
    protected $fillable = [
    	'data',
    	'idOsAparelho',
    	'laudo'
    ];

    public function aparelho(){
    	return belongsTo('App\OsAparelho', 'id', 'idOsAparelho');
    }
}
