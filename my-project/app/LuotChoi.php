<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuotChoi extends Model
{
	use SoftDeletes;
    protected $table = 'luot_choi';
}
