<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\QuenMatKhauMail;
use App\NguoiChoi;

class QuenMatKhauController extends Controller
{
    public function sendMail(Request $request)
    {
    	$tenDangNhap=$request->ten_dang_nhap;
    	$eMail=$request->email;
    	$nguoiChoi=NguoiChoi::where('ten_dang_nhap','=',$tenDangNhap)->where('email','=',$eMail)->first();
    	$nguoiChoi->mat_khau=Hash::make('1234567');
        $nguoiChoi->save();

    	Mail::to($nguoiChoi->email)->send(new QuenMatKhauMail($nguoiChoi));

    	return response()->json(
            [
                'status' =>true
            ],200
        );
    }
}
