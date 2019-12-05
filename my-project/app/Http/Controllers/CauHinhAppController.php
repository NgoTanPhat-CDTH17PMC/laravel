<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhApp;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class CauHinhAppController extends Controller
{

    public static function cleanup()
    {       
        $max = DB::table('cau_hinh_app')->max('id') + 1; 
        DB::statement("ALTER TABLE cau_hinh_app AUTO_INCREMENT =  $max");
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

        $cauHinhApp = DB::table('cau_hinh_app')->get();
        return view('ds-cau-hinh-app', compact('cauHinhApp'));
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
                    'co_hoi_sai' => 'bail|required|min:0|max:4',
                    'thoi_gian_tra_loi' => 'bail|required|min:0|max:50',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',

                ],

                [
                    'co_hoi_sai' => 'Cơ hội sai ',
                    'thoi_gian_tra_loi' => 'Thời gian trả lời ',
                ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-app/ds-cau-hinh-app')->with('error',$errors->all());
        }
        else
        {
            $cauHinhApp = new CauHinhApp;
            $cauHinhApp->co_hoi_sai = $request->co_hoi_sai;
            $cauHinhApp->thoi_gian_tra_loi=$request->thoi_gian_tra_loi;
            $cauHinhApp->save();
            return redirect()->route('cau-hinh-app/ds-cau-hinh-app')->withSuccessMessage('Thêm mới thành công!');
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
                'co_hoi_sai' => 'bail|required|min:0|max:4',
                'thoi_gian_tra_loi' => 'bail|required|min:3|max:50',
            ],

            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute không được nhỏ hơn :min!',
                'max' => ':attribute không được lớn hơn :max!',

            ],

            [
                'co_hoi_sai' => 'Cơ hội sai ',
                'thoi_gian_tra_loi' => 'Thời gian trả lời ',
            ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-app/ds-cau-hinh-app')->with('error',$errors->all());
        }
        else
        {
            $cauHinhApp = CauHinhApp::find($id);

            $cauHinhApp->co_hoi_sai = $request->input('co_hoi_sai');
            $cauHinhApp->thoi_gian_tra_loi=$request->input('thoi_gian_tra_loi');
            $cauHinhApp->save();
            
            return redirect()->action('CauHinhAppController@index')->withSuccessMessage('Cập nhật thành công!');
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
        $cauHinhApp = CauHinhApp::find($id);

        $cauHinhApp->delete();

        return redirect()->action('CauHinhAppController@index')->withSuccessMessage('Xóa thành công!');
    }
}
