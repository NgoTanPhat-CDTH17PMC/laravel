<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules= [
            'ten_dang_nhap' => 'required|min:3',
            'mat_khau' => 'required',
        ];
    }
    public function message(){
        return [
            'required' => ':attribute Không được để trống',
        ];
    }

    public function attributes(){
        return [
            'ten_dang_nhap' =>'Tên đăng nhập',
            'mat_khau'=>'Mật khẩu',
        ];
    }

    public function getData()
    {
        $data = $this->only(['ten_dang_nhap','mat_khau']);

        return $data;
    }
}
