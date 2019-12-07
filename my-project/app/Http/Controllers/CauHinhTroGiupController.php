<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhTroGiup;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


class CauHinhTroGiupController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('cau_hinh_tro_giup')->max('id') + 1; 
        DB::statement("ALTER TABLE cau_hinh_tro_giup AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        if(session('error')){
             Alert::error('Thất Bại', session('error'));
        }
        $cauHinhTroGiup = CauHinhTroGiup::all();
        return view('ds-cau-hinh-tro-giup', compact('cauHinhTroGiup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                    'loai_tro_giup' => 'bail|required|min:0|max:5',
                    'thu_tu' => 'bail|required|min:0|max:100',
                    'credit' => 'bail|required|min:0|max:500',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',
                ],

                [
                    'loai_tro_giup' => 'Loại trợ giúp ',
                    'thu_tu' => 'Thứ tự ',
                    'credit' => 'Số Credit ',
                ]
        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-tro-giup/ds-cau-hinh-tro-giup')->with('error',$errors->all());
        }
        else
        {
            $cauHinhTroGiup = new CauHinhTroGiup;
            $cauHinhTroGiup->loai_tro_giup = $request->loai_tro_giup;
            $cauHinhTroGiup->thu_tu = $request->thu_tu;
            $cauHinhTroGiup->credit=$request->credit;

            $cauHinhTroGiup->save();
            return redirect()->action('CauHinhTroGiupController@index')->withSuccessMessage('Thêm mới thành công!');
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
                    'loai_tro_giup' => 'bail|required|min:0|max:5',
                    'thu_tu' => 'bail|required|min:0|max:100',
                    'credit' => 'bail|required|min:0|max:500',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',
                ],

                [
                    'loai_tro_giup' => 'Loại trợ giúp ',
                    'thu_tu' => 'Thứ tự ',
                    'credit' => 'Số Credit ',
                ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-tro-giup/ds-cau-hinh-tro-giup')->with('error',$errors->all());
        }
        else
        {
            $cauHinhTroGiup = CauHinhTroGiup::find($id);
            $cauHinhTroGiup->loai_tro_giup = $request->input('loai_tro_giup');
            $cauHinhTroGiup->thu_tu = $request->input('thu_tu');
            $cauHinhTroGiup->credit=$request->input('credit');
            $cauHinhTroGiup->save();
            
            return redirect()->action('CauHinhTroGiupController@index')->withSuccessMessage('Cập nhật thành công!');
        }
    }

    public function deleted()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        $cauHinhTroGiup = CauHinhTroGiup::onlyTrashed()->get();
        return view('bin.cau-hinh-tro-giup-deleted', compact('cauHinhTroGiup'));
    }

    public function restore($id)
    {
        $trip = CauHinhTroGiup::withTrashed()->where('id', $id)->restore();

        return redirect()->action('CauHinhTroGiupController@deleted')->withSuccessMessage('Khôi phục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHinhTroGiup = CauHinhTroGiup::find($id);

        if($cauHinhTroGiup!=null)
        {
            $cauHinhTroGiup->delete();
            return redirect()->action('CauHinhTroGiupController@index')->withSuccessMessage('Xóa thành công!');
        }
        else
        {
            return redirect()->action('CauHinhTroGiupController@index')->with('error','Xoá thất bại!');
        }
    }
}
