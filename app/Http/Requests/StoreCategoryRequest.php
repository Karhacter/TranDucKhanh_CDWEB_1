<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|unique:category',
            'slug'=>'required',
            'description'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            //
            'name.required'=>'Tên danh mục bắt buộc phải nhập',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'slug'=>'Từ khóa không được để trống',
            'description'=>'Mô tả không được để trống',
        ];
    }
}
