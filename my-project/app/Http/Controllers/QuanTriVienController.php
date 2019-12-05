<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanTriVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\MatchOldPassword;
use Validator;

class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public static function cleanup()
    {       
        $max = DB::table('quan_tri_vien')->max('id') + 1; 
        DB::statement("ALTER TABLE quan_tri_vien AUTO_INCREMENT =  $max");
    }

    public function index()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại', session('error'));
        }
        $quanTriVien = QuanTriVien::all();
        return view('ds-quan-tri-vien', compact('quanTriVien'));
    }

    public function dangNhap()
    {
        if(session('success_message'))
        {
            Alert::success('Thành công', session('success_message'));
        }
        if(session('error'))
        {
             Alert::error('Thất Bại', session('error'));
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
            return redirect()->route('dang-nhap')->with('error', 'Sai tài khoản hoặc mật khẩu!');
    }

    public function layThongTin()
    {
        return Auth::user();
    }

    public function dangXuat()
    {
        Auth::logout();
        return view('dang-xuat');
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
         $validate = Validator::make(
            $request->all(),
            [
                'ten_dang_nhap' => 'bail|required|min:3|max:255|unique:quan_tri_vien,ten_dang_nhap',
                'mat_khau' => 'bail|required|min:3|max:50',
                'nhap_lai_mat_khau' => 'bail|required|same:mat_khau',
                'ho_ten' => 'bail|required|min:3|max:255',

            ],

            [
                'same'    => ':attribute và :other không trùng khớp!',
                'required' => ':attribute không được để trống!',
                'min' => ':attribute không được nhỏ hơn :min!',
                'max' => ':attribute không được lớn hơn :max!',
                'unique' => ':attribute đã tồn tại!',
            ],

            [
                'ten_dang_nhap' => 'Tên đăng nhập ',
                'mat_khau' => 'Mật khẩu ',
                'nhap_lai_mat_khau' => 'Mật khẩu nhập lại ',
                'ho_ten' => 'Họ tên',
            ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('quan-tri-vien/ds-quan-tri-vien')->with('error',$errors->all());
        }
        else
        {
            $quanTriVien = new QuanTriVien;            
            $quanTriVien->ten_dang_nhap = $request->ten_dang_nhap;
            $quanTriVien->mat_khau = Hash::make($request->mat_khau);
            $quanTriVien->ho_ten =$request->ho_ten;
            $quanTriVien->save();
            return redirect()->route('quan-tri-vien/ds-quan-tri-vien')->withSuccessMessage('Thêm mới thành công!');
        }
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
        $validate = Validator::make(
            $request->all(),
            [
                'mat_khau_cu' => 'bail|required',
                'mat_khau_moi' => 'bail|required|min:3|max:50',
                'nhap_lai_mat_khau_moi' => 'bail|required|same:mat_khau_moi',
                'ho_ten' => 'bail|required|min:3|max:255',

            ],

            [
                'same'    => ':attribute và :other không trùng khớp!',
                'required' => ':attribute không được để trống!',
                'min' => ':attribute không được nhỏ hơn :min!',
                'max' => ':attribute không được lớn hơn :max!',
                'unique' => ':attribute đã tồn tại!',
            ],

            [
                'ten_dang_nhap' => 'Tên đăng nhập ',
                'mat_khau_cu' => 'Mật khẩu cũ ',
                'mat_khau_moi' => 'Mật khẩu mới ',
                'nhap_lai_mat_khau_moi' => 'Mật khẩu nhập lại ',
                'ho_ten' => 'Họ tên',
            ]

        );
         if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('quan-tri-vien/ds-quan-tri-vien')->with('error',$errors->all());
        }
        else
        { 
            $quanTriVien = QuanTriVien::find($id);     
            if(Hash::check($request->input('mat_khau_cu'),$quanTriVien->mat_khau)){
                $quanTriVien->mat_khau = Hash::make($request->input('mat_khau_moi'));
                $quanTriVien->ho_ten =$request->input('ho_ten');
                $quanTriVien->save();
                return redirect()->route('quan-tri-vien/ds-quan-tri-vien')->withSuccessMessage('Cập nhật thành công!');
            }
            return redirect()->route('quan-tri-vien/ds-quan-tri-vien')->with('error', 'Mật khẩu cũ không trùng khớp!');
           
        }
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
    public function delete()
    {
        //
    }
    public function restore($id)
    {
        //
    }
}
