<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
        return [
            'username' => ['required', 'string', 'max:50','username' => 'unique:users,username'],
            'email' => [ 'email', 'max:255','email' => 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'فیلد نام کاربری الزامی است',
            'username.max'=>'نام کاربری نمی تواند از 50 حرف بیشتر باشد',
            'username.unique'=>'این نام کاربری قبلا ثبت شده است',
            'email'=>'فرمت ایمیل صحیح نمی باشد',
            'email.unique'=>'این ایمیل قبلا ثبت شده است',
            'password.min' => 'رمز عبور باید بیشتر از 6 کاراکتر باشد',
            'password.confirmed' => 'تکرار رمز عبور صحیح نمی باشد'
        ];
    }
}
