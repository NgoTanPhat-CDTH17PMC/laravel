<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GoiCredit;


class GoiCreditController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('goi_credit')->max('id') + 1; 
        DB::statement("ALTER TABLE goi_credit AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goiCredit = DB::table('goi_credit')->get();
        return view('ds-goi-credit', compact('goiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-them-goi-credit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goiCredit = new GoiCredit;
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit->save();
        return redirect()->action('GoiCreditController@index')->with('added',' ');
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
        $goiCredit = GoiCredit::findOrFail($id);
        $pageName = 'Cập Nhật Gói Credit'; // Khai báo tên trang.
        return view('form-sua-goi-credit',compact('goiCredit','pageName'));
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
        $goiCredit = GoiCredit::find($id);
        $goiCredit->ten_goi = $request->input('ten_goi_credit_moi');
        $goiCredit->credit = $request->input('so_credit');
        $goiCredit->so_tien = $request->input('so_tien');

        $goiCredit->save();
        
        return redirect()->action('GoiCreditController@index')->with('updated',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goiCredit = GoiCredit::find($id);

        $goiCredit->delete();
        return redirect()->action('GoiCreditController@index')->with('deleted',' ');
    }
}