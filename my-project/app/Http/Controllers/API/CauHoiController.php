<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;

class CauHoiController extends Controller
{
	public function index()
    {
	    return CauHoi::all();
	}

	public function layCauHoi(Request $request){
		$linhVucID =$request->linh_vuc_id;
		$cauHoi=CauHoi::where('linh_vuc_id',$linhVucID)->inRandomOrder()->get();
		$result=[
			'success' =>true,
			'data' =>$cauHoi
		];
		return response()->json($result);
	}

}
