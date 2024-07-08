<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'required|unique:user',
            'email'=>'required|unique:user',
            'phone'=>'required',
            'username'=>'required|unique:user',
            'password'=>'required',
            'address'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required'=>'Tên người dùng bắt buộc phải nhập',
            'name.unique'=>'Tên người dùng đã tồn tại',
            'email.required'=>'Email người dùng bắt buộc phải nhập',
            'email.unique'=>'Email người dùng đã tồn tại',
            'phone'=>'Mô tả không được để trống',
            'username.required'=>'Tên người dùng bắt buộc phải nhập',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required'=>'Password bắt buộc phải nhập',
            'address.required'=>'Địa chị này bắt buộc phải nhập',
        ];
    }
}
