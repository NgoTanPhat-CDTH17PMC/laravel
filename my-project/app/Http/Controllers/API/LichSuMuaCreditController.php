<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LichSuMuaCredit;

class LichSuMuaCreditController extends Controller
{
    public function layDanhSachTheoID(Request $request){
		$nguoiChoiID = $request->query('nguoi_choi');
		$lichSuMuaCredit=LichSuMuaCredit::where('nguoi_choi_id',$nguoiChoiID)->get();
		$result=[
			'success' =>true,
			'data' =>$lichSuMuaCredit
		];

		return response()->json($result);
	}
}
