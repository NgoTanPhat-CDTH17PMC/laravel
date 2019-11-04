<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhApp;
use Illuminate\Support\Facades\DB;


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
        return view('form-them-cau-hinh-app');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cauHinhApp = new CauHinhApp;
       $cauHinhApp->co_hoi_sai = $request->co_hoi_sai;
       $cauHinhApp->thoi_gian_tra_loi=$request->thoi_gian_tra_loi;
        
       $cauHinhApp->save();
        return redirect()->action('CauHinhAppController@index')->with('added',' ');
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
        $cauHinhApp = CauHinhApp::findOrFail($id);
        $pageName = 'Cập Nhật Cấu Hình App'; // Khai báo tên trang.
        return view('form-sua-cau-hinh-app',compact('cauHinhApp','pageName'));
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
        $cauHinhApp = CauHinhApp::find($id);

        $cauHinhApp->co_hoi_sai = $request->input('co_hoi_sai');
        $cauHinhApp->thoi_gian_tra_loi=$request->input('thoi_gian_tra_loi');
        $cauHinhApp->save();
        
        return redirect()->action('CauHinhAppController@index')->with('updated',' ');
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

        return redirect()->action('CauHinhAppController@index')->with('deleted',' ');
    }
}
