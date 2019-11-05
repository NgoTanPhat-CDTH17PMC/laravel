<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanTriVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dangNhap()
    {
        if(session('success_message')){
            Alert::success('Thành công',session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại','Có gì đó không đúng!');
        }
        return view('dang-nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $ten_dang_nhap = $request->ten_dang_nhap;
        $mat_khau = $request->mat_khau;

        if (Auth::attempt(['ten_dang_nhap' => $ten_dang_nhap, 'password' => $mat_khau]))
        {
            return redirect()->route('trang-chu')->withSuccessMessage('Đăng nhập thành công!');
        }
        else{
            return redirect()->route('dang-nhap')->with('error',' ');
        }
        //return "Đăng nhập thất bại!";

        /*$qtv = QuanTriVien::where('ten_dang_nhap', $ten_dang_nhap)->first();
        if ($qtv == null)
        {
            return "Sai tên đăng nhập!";
        }
        if (!Hash::check($mat_khau, $qtv->mat_khau))
        {
            return "Sai mật khẩu!";
        }*/
    }

    public function layThongTin()
    {
        return Auth::user();
    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap')->withSuccessMessage('Đăng xuất thành công!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
