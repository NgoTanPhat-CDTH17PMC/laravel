<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHinhApp extends Model
{
	use SoftDeletes;
    protected $table='cau_hinh_app';
}
