<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;
use RealRashid\SweetAlert\Facades\Alert;

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
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }
        if(session('error')){
             Alert::error('Thất Bại', session('error'));
        }

        $linhVuc = LinhVuc::all();
        $cauHoi = CauHoi::all();
        $pageName = 'Danh Sách Câu Hỏi'; // Khai báo tên trang
        return view('ds-cau-hoi', compact('pageName','cauHoi','linhVuc'));
    }

    public function deleted()
    {
        if(session('success_message')){
            Alert::success('Hoàn Tất', session('success_message'));
        }

        $linhVuc = LinhVuc::all();
        $cauHoi = CauHoi::onlyTrashed()->get();
        return view('bin.cau-hoi-deleted', compact('cauHoi', 'linhVuc'));
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
       $validate = Validator::make(
                $request->all(),
                [
                    'noi_dung' => 'bail|required|min:0|max:500|unique:cau-hoi,noi_dung',
                    'phuong_an_a' => 'bail|required|min:0|max:100',
                    'phuong_an_b' => 'bail|required|min:0|max:100',
                    'phuong_an_c' => 'bail|required|min:0|max:100',
                    'phuong_an_d' => 'bail|required|min:0|max:100',
                    'dap_an' => 'bail|required|min:0|max:100',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',
                    'unique' => ':attribute đã tồn tại!',
                ],

                [
                    'noi_dung' => 'Nội dung ',
                    'phuong_an_a' => 'Phương án A ',
                    'phuong_an_b' => 'Phương án B ',
                    'phuong_an_c' => 'Phương án C ',
                    'phuong_an_d' => 'Phương án D ',
                    'dap_an' => 'Đáp án ',
                ]
        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hoi/ds-cau-hoi')->with('error',$errors->all());
        }
        else 
        {
            $cauHoi = new CauHoi;
            $cauHoi->noi_dung = $request->noi_dung;
            $cauHoi->linh_vuc_id = $request->linh_vuc_id;
            $cauHoi->phuong_an_a = $request->phuong_an_a;
            $cauHoi->phuong_an_b = $request->phuong_an_b;
            $cauHoi->phuong_an_c = $request->phuong_an_c;
            $cauHoi->phuong_an_d = $request->phuong_an_d;
            $cauHoi->dap_an = $request->dap_an;
            $cauHoi->save();
            return redirect()->route('cau-hoi/ds-cau-hoi')->withSuccessMessage('Thêm mới thành công!');
        }
    }

    public function restore($id)
    {
        $trip = CauHoi::withTrashed()->where('id', $id)->restore();

        return redirect()->action('CauHoiController@deleted')->withSuccessMessage('Khôi phục thành công!');
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
                    'noi_dung' => 'bail|required|min:0|max:500|unique:cau-hoi,noi_dung',
                    'phuong_an_a' => 'bail|required|min:0|max:100',
                    'phuong_an_b' => 'bail|required|min:0|max:100',
                    'phuong_an_c' => 'bail|required|min:0|max:100',
                    'phuong_an_d' => 'bail|required|min:0|max:100',
                    'dap_an' => 'bail|required|min:0|max:100',
                ],

                [
                    'required' => ':attribute không được để trống!',
                    'min' => ':attribute không được nhỏ hơn :min!',
                    'max' => ':attribute không được lớn hơn :max!',
                    'unique' => ':attribute đã tồn tại!',
                ],

                [
                    'noi_dung' => 'Nội dung ',
                    'phuong_an_a' => 'Phương án A ',
                    'phuong_an_b' => 'Phương án B ',
                    'phuong_an_c' => 'Phương án C ',
                    'phuong_an_d' => 'Phương án D ',
                    'dap_an' => 'Đáp án ',
                ]
        );
        if ($validate->fails()) {
            $errors = $validate->errors();
            return redirect()->route('cau-hoi/ds-cau-hoi')->with('error',$errors->all());
        }
        else
        {
            $cauHoi = CauHoi::find($id);
            $cauHoi->noi_dung = $request->noi_dung;
            $cauHoi->linh_vuc_id = $request->linh_vuc_id;
            $cauHoi->phuong_an_a = $request->phuong_an_a;
            $cauHoi->phuong_an_b = $request->phuong_an_b;
            $cauHoi->phuong_an_c = $request->phuong_an_c;
            $cauHoi->phuong_an_d = $request->phuong_an_d;
            $cauHoi->dap_an= $request->dap_an;

            $cauHoi->save();
        }
        
        return redirect()->action('CauHoiController@index')->withSuccessMessage('Cập nhật thành công!');
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
        return redirect()->action('CauHoiController@index')->withSuccessMessage('Xoá thành công!');
    }
}
