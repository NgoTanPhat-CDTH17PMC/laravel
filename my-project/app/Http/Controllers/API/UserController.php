<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;
use JWTAuth;
use App\NguoiChoi;
use Validator;


class UserController extends Controller
{


	public function dangKy(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'ten_dang_nhap' => 'bail|required|min:3|max:255|unique:nguoi_choi,ten_dang_nhap',
                'mat_khau' => 'bail|required|min:3|max:50',
                'nhap_lai_mat_khau' => 'bail|required|same:mat_khau',
                'email' => 'required|email',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                	'status' =>false,
                    'error' => $validator->errors()
                ], 401);
        }
        else{
        	$nguoiChoi = new NguoiChoi;            
            $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
            $nguoiChoi->mat_khau = Hash::make($request->mat_khau);
            $nguoiChoi->email =$request->email;
            $nguoiChoi->save();
	        $token =JWTAuth::fromUser($nguoiChoi);
	        return response()->json(
	            [
	            	'status' =>true,
		    		'message' =>'Authorized',
		    		'token' =>$token,
	            ],200
	        );
	    }
    }

   
    public function dangNhap(Request $request)
    {
    	$credentials=[
    		'ten_dang_nhap' => $request->ten_dang_nhap,
    		'password' => $request->mat_khau
    	];

    	#Chứng thực
    	if(!$token =auth('api')->attempt($credentials)){
    		#sai ten dang nhap || mat khau
    		return response()->json([
    			'status' =>false,
    			'message' =>'Unauthorized.'
    		],401);
    	}
        //$user=auth('api')->user();
    	#chung thuc thanh cong
    	return response()->json([
    		'status' =>true,
    		'message' =>'Authorized',
            'token' =>$token
    		//'data' => $user
    	],200);
    }

    public function layThongTin()
    {    	
    	$user=auth('api')->user();
    	$result=[
    		'success' =>true,
    		'data' => $user
    	];
    	return response()->json($result);
    }


    public function SuaThongTinNguoiChoi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'ho_ten' => 'bail|required|min:3|max:255',
                'ngay_sinh' => 'bail|required|min:7|max:10',
                'so_dien_thoai' => 'bail|required|min:9|max:11',
                'email' => 'bail|required|email',
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' =>false,
                    'error' => $validator->errors()
                ], 401);
        }
        else
        {
            $id=$request->id;
            $nguoiChoi = NguoiChoi::find($id);
            $nguoiChoi->ho_ten = $request->ho_ten;
            $nguoiChoi->ngay_sinh = $request->ngay_sinh;
            $nguoiChoi->so_dien_thoai = $request->so_dien_thoai;
            $nguoiChoi->email = $request->email;
            $nguoiChoi->save();
            return response()->json(
                [
                    'status' =>true,
                ],200
            );
        }
    }

    public function DoiMatKhau(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mat_khau_cu' => 'bail|required',
                'mat_khau_moi' => 'bail|required|min:3|max:50',
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' =>false,
                    'error' => $validator->errors()
                ], 401);
        }
        else
        {
            $id=$request->id;
            $nguoiChoi = NguoiChoi::find($id);
            if(Hash::check($request->mat_khau_cu,$nguoiChoi->mat_khau)){
                $nguoiChoi->mat_khau =Hash::make($request->mat_khau_moi);
                $nguoiChoi->save();
                return response()->json(
                    [
                        'status' =>true,
                    ],200
                );
            }
            else
            {
                return response()->json(
                    [
                        'status' =>false,
                    ],401
                );
            }
        }
    }


    public function UploadAnhDaiDien(Request $request) 
    {
        $id = $request->id;
        $hinh_dai_dien=base64_decode($request->hinh_dai_dien);

        $folderName = 'uploads/images/';
        $safeName = str_random(10).'.'.'jpeg';
        if(file_put_contents($folderName.$safeName,base64_decode($hinh_dai_dien)))
        {
            $success = file_put_contents($folderName.$safeName,$hinh_dai_dien);
            $finalpath="http://10.0.2.2:8000/uploads/images/".$safeName;
            $nguoiChoi=NguoiChoi::find($id);
            $nguoiChoi->hinh_dai_dien=$finalpath;
            $nguoiChoi->save();
            return response()->json(
                [
                    'status' =>true,
                    'data' => $success,
                ]
            );
        }
        return response()->json(
            [
                'status' =>false,
            ]
        );
    }

    public function themLuotChoi(Request $request){
        $id=$request->id;
        $nguoiChoi = NguoiChoi::find($id);
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->save();
        return response()->json(
            [
                'status' =>true
            ],200
        );
    }

    public function bangXepHang(){
        $nguoiChoi=NguoiChoi::orderBy('diem_cao_nhat', 'desc')->get();
        return response()->json(
            [
                'status' =>true,
                'data' =>$nguoiChoi,
            ],
        );
    }
}
