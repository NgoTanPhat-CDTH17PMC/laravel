<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChiTietLuotChoi;

class ChiTietLuotChoiController extends Controller
{
    public function layDanhSachTheoID(Request $request){
		$luotChoiID = $request->query('luot_choi');
		$chiTietLuotChoi=ChiTietLuotChoi::where('luot_choi_id',$luotChoiID)->get();
		$result=[
			'success' =>true,
			'data' =>$chiTietLuotChoi
		];

		return response()->json($result);
	}

	public function luuChiTietLuotChoi(Request $request)
	{
		$ctluotChoi=new ChiTietLuotChoi;
		$ctluotChoi->luot_choi_id = $request->luot_choi_id;
		$ctluotChoi->cau_hoi_id =$request->cau_hoi_id;
		$ctluotChoi->phuong_an=$request->phuong_an;
		$ctluotChoi->diem=$request->diem;
		$ctluotChoi->save();
		return response()->json(
		[
			'status' =>true,
			'data' =>$ctluotChoi
		],200);
	}
}
