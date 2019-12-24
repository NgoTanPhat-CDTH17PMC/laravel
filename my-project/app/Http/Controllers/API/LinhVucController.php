<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucController extends Controller
{
    public function index()
    {
    	return LinhVuc::all();
    }

    public function layDanhSach(){
    	$listLinhVuc=LinhVuc::all()->random(4);
    	$result=[
    		'success' =>true,
    		'data' => $listLinhVuc
    	];
    	return response()->json($result);
    }
}
