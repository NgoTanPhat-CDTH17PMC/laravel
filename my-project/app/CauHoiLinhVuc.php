<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoiLinhVuc extends Model
{
	use SoftDeletes;
    protected $table='cau_hoi_linh_vuc';
}
