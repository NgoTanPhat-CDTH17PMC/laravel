<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;

class LinhVucController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('linh_vuc')->max('id') + 1; 
        DB::statement("ALTER TABLE linh_vuc AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhVuc = DB::table('linh_vuc')->get();
        return view('ds-linh-vuc', compact('linhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-them-linh-vuc');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linhVuc = new LinhVuc;
        $linhVuc->ten = $request->ten_linh_vuc;
        $linhVuc->save();
        return redirect()->action('LinhVucController@index')->with('added',' ');
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
        //chọn dữ liệu đúng với điều kiện id bằng với id nhận được khi người dùng click vào Edit.
        $linhVuc = LinhVuc::findOrFail($id);
        $pageName = 'Cập Nhật Lĩnh Vực'; // Khai báo tên trang.
        return view('form-sua-linh-vuc',compact('linhVuc','pageName')); //gom dữ liệu trả về trang form-sua-linh-vuc.
    }

/*
    public function index_2()
    {
        $linhVuc = DB::table('linh_vuc')->get();
        return view('form-sua-n-linh-vuc', compact('linhVuc'));
    }
    public function update_2(Request $request, $id)
    {
        $linhVuc = LinhVuc::find($id);
        $linhVuc->ten = $request->input('ten_linh_vuc_moi');

        $linhVuc->save();
        
        return redirect()->action('LinhVucController@index')->with('updated',' ');
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $linhVuc = LinhVuc::find($id);
        $linhVuc->ten = $request->input('ten_linh_vuc_moi');

        $linhVuc->save();
        
        return redirect()->action('LinhVucController@index')->with('updated',' ');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linhVuc = LinhVuc::find($id);

        $linhVuc->delete();
        return redirect()->action('LinhVucController@index')->with('deleted',' ');
    }
}
