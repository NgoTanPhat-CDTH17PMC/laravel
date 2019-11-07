<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhTroGiup;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


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
        $cauHinhTroGiup = DB::table('cau_hinh_tro_giup')->get();
        return view('ds-cau-hinh-tro-giup', compact('cauHinhTroGiup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-them-cau-hinh-tro-giup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cauHinhTroGiup = new CauHinhTroGiup;
        $cauHinhTroGiup->loai_tro_giup = $request->loai_tro_giup;
        $cauHinhTroGiup->thu_tu = $request->thu_tu;
        $cauHinhTroGiup->credit=$request->credit;
        
       $cauHinhTroGiup->save();
        return redirect()->action('CauHinhTroGiupController@index')->with('added',' ');
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
        $cauHinhTroGiup = CauHinhTroGiup::findOrFail($id);
        $pageName = 'Cập Nhật Cấu Hình Trợ Giúp'; // Khai báo tên trang.
        return view('form-sua-cau-hinh-tro-giup',compact('cauHinhTroGiup','pageName'));
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
        $cauHinhTroGiup = CauHinhTroGiup::find($id);
        $cauHinhTroGiup->loai_tro_giup = $request->input('loai_tro_giup');
        $cauHinhTroGiup->thu_tu = $request->input('thu_tu');
        $cauHinhTroGiup->credit=$request->input('credit');
        $cauHinhTroGiup->save();
        
        return redirect()->action('CauHinhTroGiupController@index')->with('updated',' ');
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

        $cauHinhTroGiup->delete();

        return redirect()->action('CauHinhTroGiupController@index')->with('deleted',' ');
    }
}
