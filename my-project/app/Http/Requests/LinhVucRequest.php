<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinhVucRequest extends FormRequest
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
            'ten_linh_vuc' => 'required|min:3|max:255|unique:linh_vuc,ten',
        ];
        return $rules;
    }
    public function message(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes(){
        return [
            'ten_linh_vuc' => 'Tên lĩnh vực ',
        ];
    }
}
