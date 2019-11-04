<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhDiemCauHoi;
use Illuminate\Support\Facades\DB;


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
       $cauHinhDiemCauHoi = DB::table('cau_hinh_diem_cau_hoi')->get();
        return view('ds-cau-hinh-diem-cau-hoi', compact('cauHinhDiemCauHoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-them-cau-hinh-diem-cau-hoi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cauHinhDiemCauHoi = new CauHinhDiemCauHoi;
       $cauHinhDiemCauHoi->thu_tu = $request->thu_tu;
       $cauHinhDiemCauHoi->diem=$request->diem;
        
       $cauHinhDiemCauHoi->save();
        return redirect()->action('CauHinhDiemCauHoiController@index')->with('added',' ');
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
        $cauHinhDiemCauHoi = CauHinhDiemCauHoi::findOrFail($id);
        $pageName = 'Cập Nhật Cấu Hình Điểm Câu Hỏi'; // Khai báo tên trang.
        return view('form-sua-cau-hinh-diem-cau-hoi',compact('cauHinhDiemCauHoi','pageName'));
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
        $cauHinhDiemCauHoi = CauHinhDiemCauHoi::find($id);

        $cauHinhDiemCauHoi->thu_tu = $request->input('thu_tu');
        $cauHinhDiemCauHoi->diem=$request->input('diem');
        $cauHinhDiemCauHoi->save();
        
        return redirect()->action('CauHinhDiemCauHoiController@index')->with('updated',' ');
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

        $cauHinhDiemCauHoi->delete();

        return redirect()->action('CauHinhDiemCauHoiController@index')->with('deleted',' ');
    }
}