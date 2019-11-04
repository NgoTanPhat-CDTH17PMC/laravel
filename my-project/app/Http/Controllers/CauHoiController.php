<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;

class CauHoiController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('cau_hoi')->max('id') + 1; 
        DB::statement("ALTER TABLE cau_hoi AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhVuc=LinhVuc::all();
        $cauHoi = CauHoi::all();
        $pageName = 'Danh Sách Câu Hỏi'; // Khai báo tên trang
        return view('ds-cau-hoi', compact('pageName','cauHoi','linhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $linhVuc=LinhVuc::all();
        $pageName = 'Thêm Mới Câu Hỏi'; // Khai báo tên trang.
        return view('form-them-cau-hoi',compact('pageName','linhVuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cauHoi = new CauHoi;
        $cauHoi->noi_dung= $request->noi_dung;
        $cauHoi->linh_vuc_id= $request->linh_vuc_id;
        $cauHoi->phuong_an_a= $request->phuong_an_a;
        $cauHoi->phuong_an_b= $request->phuong_an_b;
        $cauHoi->phuong_an_c= $request->phuong_an_c;
        $cauHoi->phuong_an_d= $request->phuong_an_d;
        $cauHoi->dap_an= $request->dap_an;
        $cauHoi->save();
        return redirect()->action('CauHoiController@index')->with('added',' ');
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
        $linhVuc=LinhVuc::all();
        $cauHoi = CauHoi::findOrFail($id);
        $pageName = 'Cập Nhật Câu Hỏi'; // Khai báo tên trang.
        return view('form-sua-cau-hoi',compact('cauHoi','pageName','linhVuc'));
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
        $cauHoi = CauHoi::find($id);
        $cauHoi->noi_dung= $request->noi_dung;
        $cauHoi->linh_vuc_id= $request->linh_vuc_id;
        $cauHoi->phuong_an_a= $request->phuong_an_a;
        $cauHoi->phuong_an_b= $request->phuong_an_b;
        $cauHoi->phuong_an_c= $request->phuong_an_c;
        $cauHoi->phuong_an_d= $request->phuong_an_d;
        $cauHoi->dap_an= $request->dap_an;

        $cauHoi->save();
        
        return redirect()->action('CauHoiController@index')->with('updated',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHoi = CauHoi::find($id);

        $cauHoi->delete();
        return redirect()->action('CauHoiController@index')->with('deleted',' ');
    }
}
