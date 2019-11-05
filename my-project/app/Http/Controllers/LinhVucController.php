<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;
use RealRashid\SweetAlert\Facades\Alert;

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

        if(session('success_message')){
            Alert::success('Hoàn Tất',session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại', 'Có gì đó không đúng!');
        }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input('ten_linh_vuc');

        if ($input == '') 
        {
            return redirect()->route('linh-vuc/ds-linh-vuc')->with('error',' ');
        }else 
        {
            $linhVuc = new LinhVuc;
            $linhVuc->ten = $request->ten_linh_vuc;
            $linhVuc->save();
            return redirect()->route('linh-vuc/ds-linh-vuc')->withSuccessMessage('Thêm mới thành công!');
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
        $input = $request->input('ten_linh_vuc_moi');
        if ($input == '') 
        {
            return redirect()->route('linh-vuc/ds-linh-vuc')->with('error',' ');
        }
        else 
        {
            $linhVuc = LinhVuc::find($id);
            $linhVuc->ten = $request->input('ten_linh_vuc_moi');
            $linhVuc->save();
            return redirect()->action('LinhVucController@index')->withSuccessMessage('Cập nhật thành công!');
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
        $linhVuc = LinhVuc::find($id);
        if($linhVuc!=null)
        {
            $linhVuc->delete();
            return redirect()->action('LinhVucController@index')->withSuccessMessage('Xóa thành công!');
        }
        else
        {
            return redirect()->action('LinhVucController@index')->with('error',' ');
        }
    }
}
