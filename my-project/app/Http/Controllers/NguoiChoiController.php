<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class NguoiChoiController extends Controller
{
     public static function cleanup()
    {       
        $max = DB::table('nguoi_choi')->max('id') + 1; 
        DB::statement("ALTER TABLE nguoi_choi AUTO_INCREMENT =  $max");
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
        $nguoiChoi = NguoiChoi::all();
        return view('ds-nguoi-choi', compact('nguoiChoi'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi = NguoiChoi::find($id);

        $nguoiChoi->delete();
       
        if($nguoiChoi!=null)
        {
            $nguoiChoi->delete();
             return redirect()->action('NguoiChoiController@index')->withSuccessMessage('Khoá tài khoản thành công!');
        }
        else
        {
            return redirect()->action('NguoiChoiController@index')->with('error','Khoá tài khoản thất bại!');
        }
    }
}
