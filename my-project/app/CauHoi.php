<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
	use SoftDeletes;

    protected $table='cau_hoi';

	public function linhVuc(){
    	return $this->belongsTo('App\LinhVuc');
    }
}
