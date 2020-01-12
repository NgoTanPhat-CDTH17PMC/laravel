<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;
use App\GoiCredit;
use App\LichSuMuaCredit;

class GoiCreditController extends Controller
{

	public function layDanhSach(){
		$goiCredit=GoiCredit::all();
    	$result=[
    		'status' =>true,
    		'data' => $goiCredit
    	];
    	return response()->json($result);
	}


	public function muaCredit(Request $request){

		$goi_credit_id=$request->goi_credit_id;
		$goiCredit=GoiCredit::find($request->goi_credit_id);
		$nguoiChoi=NguoiChoi::find($request->nguoi_choi_id);
		$credit=$nguoiChoi->credit+$goiCredit->credit;
		$nguoiChoi->credit=$credit;
		$nguoiChoi->save();

		$result=[
    		'status' =>true,
    		'data_nguoichoi' => $nguoiChoi,
    		'data_goicredit' =>$goiCredit,
    	];
		return response()->json($result);
	}

}
