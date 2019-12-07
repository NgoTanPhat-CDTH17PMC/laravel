<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GoiCredit;
use Validator;
use Alert;


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
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại', session('error'));
        }
         $goiCredit = GoiCredit::all();
        return view('ds-goi-credit', compact('goiCredit'));
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
        $validate = Validator::make(
                $request->all(),
                [
                    'ten_goi' => 'bail|required|min:2|max:5',
                    'so_tien' => 'bail|required|numeric|min:2',
                    'credit' => 'bail|required|numeric|min:2',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',
                    'numeric' => ':attribute không đúng định dạng!',
                ],

                [
                    'ten_goi' => 'Tên gói ',
                    'so_tien' => 'Số tiền ',
                    'credit' => 'Số Credit ',
                ]
        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('goi-credit/ds-goi-credit')->with('error',$errors->all());
        }
        else
        {
            $goiCredit = new GoiCredit;
            $goiCredit->ten_goi = $request->ten_goi;
            $goiCredit->credit = $request->credit;
            $goiCredit->so_tien = $request->so_tien;
            $goiCredit->save();
            return redirect()->action('GoiCreditController@index')->withSuccessMessage('Thêm mới thành công!');
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
        $goiCredit = GoiCredit::find($id);
        $goiCredit->ten_goi = $request->input('ten_goi_credit_moi');
        $goiCredit->credit = $request->input('so_credit');
        $goiCredit->so_tien = $request->input('so_tien');

        $goiCredit->save();
        
        return redirect()->action('GoiCreditController@index')->withSuccessMessage('Cập nhật thành công!');
    }

    public function deleted()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        $goiCredit = GoiCredit::onlyTrashed()->get();
        return view('bin.goi-credit-deleted', compact('goiCredit'));
    }

    public function restore($id)
    {
        $trip = GoiCredit::withTrashed()->where('id', $id)->restore();

        return redirect()->action('GoiCreditController@deleted')->withSuccessMessage('Khôi phục thành công!');
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
        if($goiCredit!=null)
        {
            $goiCredit->delete();
            return redirect()->action('GoiCreditController@index')->withSuccessMessage('Xóa thành công!');
        }
        else
        {
            return redirect()->action('GoiCreditController@index')->with('error','Xoá thất bại!');
        }
    }
}
