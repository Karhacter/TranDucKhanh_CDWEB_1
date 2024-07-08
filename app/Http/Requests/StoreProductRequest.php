<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>'required|unique:product',
            'slug'=>'required',
            'detail'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ];
    }
     public function messages(): array
    {
        return [
            //
            'name.required'=>'Tên sản phẩm bắt buộc phải nhập',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'slug'=>'Từ khóa không được để trống',
            'detail'=>'Mô tả không được để trống',
            'category_id'=>'Vui lòng chọn tên danh mục',
            'brand_id'=>'Vui lý chọn tên thương hiệu',
        ];
    }
}
