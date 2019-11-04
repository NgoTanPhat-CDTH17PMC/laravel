<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHinhDiemCauHoi extends Model
{
	use SoftDeletes;
    protected $table='cau_hinh_diem_cau_hoi';
}
