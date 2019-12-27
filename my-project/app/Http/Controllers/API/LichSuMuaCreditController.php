<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LichSuMuaCredit;
use App\NguoiChoi;
use App\GoiCredit;

class LichSuMuaCreditController extends Controller
{
		
	public function layDSLichSuMuaCredit(Request $request)
	{
		$lichSuMuaCredit=DB::table('lich_su_mua_credit')
						->join('goi_credit','goi_credit.id','=','lich_su_mua_credit.goi_credit_id')
						->join('nguoi_choi','nguoi_choi.id','=','lich_su_mua_credit.nguoi_choi_id')
						->select('goi_credit.ten_goi','goi_credit.credit','goi_credit.so_tien')
						->where('lich_su_mua_credit.nguoi_choi_id',$request->nguoi_choi_id)
						->get();
		return response()->json(
			$result=[
				'status' =>true,
				'data' =>$lichSuMuaCredit,
			]
		);
	}

	public function LuuLichSuMuaCredit(Request $request)
    {
    	$nguoi_choi_id=$request->nguoi_choi_id;
    	$nguoiChoiID=NguoiChoi::find($nguoi_choi_id);
    	$lichSuMuaCredit=new lichSuMuaCredit;
    	$lichSuMuaCredit->nguoi_choi_id=$nguoi_choi_id;
    	$lichSuMuaCredit->goi_credit_id=$request->goi_credit_id;
    	$lichSuMuaCredit->credit=$request->credit;
    	$lichSuMuaCredit->so_tien=$request->so_tien;
    	$lichSuMuaCredit->save();

    	return response()->json(
    		$result=
    		[
				'status' =>true,
				'data' =>$lichSuMuaCredit,
			],200
		);
    }
}
