<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichSuMuaCredit extends Model
{
    use SoftDeletes;
    protected $table='lich_su_mua_credit';

    public function nguoiChoi(){
    	return $this->belongsTo('App\NguoiChoi');
    }
    
    public function goiCredit(){
    	return $this->belongsTo('App\GoiCredit');
    }
}
