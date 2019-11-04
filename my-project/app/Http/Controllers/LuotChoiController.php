<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LuotChoi;


class LuotChoiController extends Controller
{
    public static function cleanup()
    {       
        $max = DB::table('luot_choi')->max('id') + 1; 
        DB::statement("ALTER TABLE luot_choi AUTO_INCREMENT =  $max");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luotChoi = DB::table('luot_choi')->get();
        return view('ds-luot-choi', compact('luotChoi'));
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

    public function xemChiTiet($id)
    {
        $chiTietLuotChoi = DB::table('chi_tiet_luot_choi')->where('luot_choi_id', $id)->get();

        $pageName = 'Xem Chi Tiết Lượt Chơi'; // Khai báo tên trang.
        return view('form-xem-chi-tiet-luot-choi',compact('chiTietLuotChoi','pageName'));
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
