<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichSuMuaCredit;
use Illuminate\Support\Facades\DB;
use App\GoiCredit;
use App\NguoiChoi;

class LichSuMuaCreditController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('lich_su_mua_credit')->max('id') + 1; 
        DB::statement("ALTER TABLE lich_su_mua_credit AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goiCredit=GoiCredit::all();
        $nguoiChoi =NguoiChoi::all();
        $lichSuMuaCredit = LichSuMuaCredit::all();
        return view('ds-lich-su-mua-credit', compact('lichSuMuaCredit','nguoiChoi','goiCredit'));
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
        //
    }
}
