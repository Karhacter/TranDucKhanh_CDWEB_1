<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|unique:brand',
            'slug'=>'required',
            'description'=>'required',
        ];    
    }
     public function messages(): array
    {
        return [
            //
            'name.required'=>'Tên thương hiệu bắt buộc phải nhập',
            'name.unique'=>'Tên thương hiệu đã tồn tại',
            'slug'=>'Từ khóa không được để trống',
            'description'=>'Mô tả không được để trống',
        ];
    }
}
