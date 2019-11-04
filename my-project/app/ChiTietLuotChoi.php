<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietLuotChoi extends Model
{
	use SoftDeletes;
    protected $table='chi_tiet_luot_choi';
}
