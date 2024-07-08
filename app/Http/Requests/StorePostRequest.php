<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|unique:post',
            'slug'=>'required',
            'detail'=>'required',
        ];
    }
       public function messages(): array
    {
        return [
            //
            'title.required'=>'Tên bài viết bắt buộc phải nhập',
            'title.unique'=>'Tên bài viết đã tồn tại',
            'slug'=>'Từ khóa không được để trống',
            'detail'=>'Mô tả không được để trống',
        ];
    }
}
