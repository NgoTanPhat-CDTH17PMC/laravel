<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

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
            Alert::success('Hoàn Tất', session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại', session('error'));
        }
        $linhVuc = LinhVuc::all();
        return view('ds-linh-vuc', compact('linhVuc'));
    }

    public function deleted()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        $linhVuc = LinhVuc::onlyTrashed()->get();
        return view('bin.linh-vuc-deleted', compact('linhVuc'));
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
                'ten_linh_vuc' => 'required|min:3|max:255|unique:linh_vuc,ten',
            ],

            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute không được nhỏ hơn :min!',
                'max' => ':attribute không được lớn hơn :max!',
                'unique' => ':attribute đã tồn tại!',
            ],

            [
                'ten_linh_vuc' => 'Tên lĩnh vực ',
            ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('linh-vuc/ds-linh-vuc')->with('error',$errors->all());
        }
        else
        {
            $linhVuc = new LinhVuc;            
            $linhVuc->ten = $request->ten_linh_vuc;
            $linhVuc->save();
            return redirect()->route('linh-vuc/ds-linh-vuc')->withSuccessMessage('Thêm mới thành công!');
        }
    }

    public function restore($id)
    {
        $trip = LinhVuc::withTrashed()->where('id', $id)->restore();

        return redirect()->action('LinhVucController@deleted')->withSuccessMessage('Khôi phục thành công!');
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
        $validate = Validator::make(
            $request->all(),
            [
                'ten_linh_vuc_moi' => 'required|min:3|max:255|unique:linh_vuc,ten,'.$id,
            ],

            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute không được nhỏ hơn :min!',
                'max' => ':attribute không được lớn hơn :max!',
                'unique' => ':attribute đã tồn tại!',
            ],

            [
                'ten_linh_vuc_moi' => 'Tên lĩnh vực ',
            ]

        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('linh-vuc/ds-linh-vuc')->with('error',$errors->all());
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
            return redirect()->action('LinhVucController@index')->with('error','Xoá thất bại!');
        }
    }
}
