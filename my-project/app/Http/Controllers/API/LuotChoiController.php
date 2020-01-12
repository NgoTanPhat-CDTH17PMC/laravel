<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LuotChoi;
use App\NguoiChoi;

class LuotChoiController extends Controller
{
	public function layDanhSachTheoID(Request $request){

		$nguoiChoiID = $request->nguoi_choi_id;
		$luotChoi=LuotChoi::where('nguoi_choi_id',$nguoiChoiID)->orderBy('id', 'desc')->get();
		$result=[
			'status' =>true,
			'data' =>$luotChoi
		];

		return response()->json($result);
	}

	public function luuLuotChoi(Request $request)
	{
		$luotChoi=new LuotChoi;
		$luotChoi->nguoi_choi_id = $request->nguoi_choi_id;
		$luotChoi->so_cau =$request->so_cau;
		$luotChoi->diem=$request->diem;
		$luotChoi->ngay_gio=$request->ngay_gio;
		$luotChoi->save();
		return response()->json(
		[
			'status' =>true,
			'data' =>$luotChoi
		],200);
	}

	public function luuDiemCaoNhatCuaNguoiChoi(Request $request)
	{
		$nguoiChoiID = $request->nguoi_choi_id;
		$luotChoi = LuotChoi::where('nguoi_choi_id',$nguoiChoiID)->orderBy('diem', 'desc')->first(); 
		$diemCaoNhat = $luotChoi->diem;

		$nguoiChoi=NguoiChoi::find($nguoiChoiID);
		$nguoiChoi->diem_cao_nhat=$diemCaoNhat;
		$nguoiChoi->save();

		return response()->json(
		[
			'status' =>true,
			'data' =>$nguoiChoi
		],200);
	}

	public function layLuotChoiID(Request $request){
		$nguoiChoiID = $request->nguoi_choi_id;
		$luotChoi = LuotChoi::where('nguoi_choi_id',$nguoiChoiID)->orderBy('id', 'desc')->first(); 
		return response()->json(
		[
			'status' =>true,
			'data' =>$luotChoi
		],200);
	}
}
