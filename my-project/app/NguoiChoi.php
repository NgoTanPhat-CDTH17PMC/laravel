<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Model
{	

	use SoftDeletes;
    protected $table='nguoi_choi';

}
