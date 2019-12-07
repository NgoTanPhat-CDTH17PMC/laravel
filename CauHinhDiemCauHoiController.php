<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhDiemCauHoi;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


class CauHinhDiemCauHoiController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('cau_hinh_diem_cau_hoi')->max('id') + 1; 
        DB::statement("ALTER TABLE cau_hinh_diem_cau_hoi AUTO_INCREMENT =  $max");
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
       $cauHinhDiemCauHoi = CauHinhDiemCauHoi::all();
        return view('ds-cau-hinh-diem-cau-hoi', compact('cauHinhDiemCauHoi'));
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
                    'thu_tu' => 'bail|required|min:0|max:100',
                    'diem' => 'bail|required|min:0|max:500',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',

                ],

                [
                    'thu_tu' => 'Thứ tự ',
                    'diem' => 'Điểm ',
                ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-diem-cau-hoi/ds-cau-hinh-diem-cau-hoi')->with('error',$errors->all());
        }
        else
        {
            $cauHinhDiemCauHoi = new CauHinhDiemCauHoi;
            $cauHinhDiemCauHoi->thu_tu = $request->thu_tu;
            $cauHinhDiemCauHoi->diem=$request->diem;

            $cauHinhDiemCauHoi->save();
            return redirect()->route('cau-hinh-diem-cau-hoi/ds-cau-hinh-diem-cau-hoi')->withSuccessMessage('Thêm mới thành công!'); 
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
                    'thu_tu' => 'bail|required|min:0|max:100',
                    'diem' => 'bail|required|min:0|max:500',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',

                ],

                [
                    'thu_tu' => 'Thứ tự ',
                    'diem' => 'Điểm ',
                ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hinh-diem-cau-hoi/ds-cau-hinh-diem-cau-hoi')->with('error',$errors->all());
        }
        else
        {
            $cauHinhDiemCauHoi = CauHinhDiemCauHoi::find($id);

            $cauHinhDiemCauHoi->thu_tu = $request->input('thu_tu');
            $cauHinhDiemCauHoi->diem=$request->input('diem');
            $cauHinhDiemCauHoi->save();
            
            return redirect()->action('CauHinhDiemCauHoiController@index')->withSuccessMessage('Cập nhật thành công!');
        }
    }

    public function deleted()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        $cauHinhDiemCauHoi = CauHinhDiemCauHoi::onlyTrashed()->get();
        return view('bin.cau-hinh-diem-cau-hoi-deleted', compact('cauHinhDiemCauHoi'));
    }

    public function restore($id)
    {
        $trip = CauHinhDiemCauHoi::withTrashed()->where('id', $id)->restore();

        return redirect()->action('CauHinhDiemCauHoiController@deleted')->withSuccessMessage('Khôi phục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHinhDiemCauHoi = CauHinhDiemCauHoi::find($id);

        if($cauHinhDiemCauHoi!=null)
        {
            $cauHinhDiemCauHoi->delete();
            return redirect()->action('CauHinhDiemCauHoiController@index')->withSuccessMessage('Xóa thành công!');
        }
        else
        {
            return redirect()->action('CauHinhDiemCauHoiController@index')->with('error','Xoá thất bại!');
        }
    }
}
