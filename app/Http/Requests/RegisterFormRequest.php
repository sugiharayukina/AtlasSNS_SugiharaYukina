<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()){
            return true;
        }else{
        return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username' => 'required|integer|between:2,12',
            'mail' => 'required|integer|between:5,40||unique:users|email',
            'password' => 'required|alpha-num|integer|between:8,20',
            'password_confirmation' => 'required|alpha-num|integer|between:8,20|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '名前は必須項目です',
            'mail.email' => 'メールアドレスの形式で入力してください',
            'password.alpha-num|integer|between:8,2' => 'パスワードは半角英数字のみ8文字以上20文字以内で入力してください',
            'password_confirmation.same:password' => 'パスワードが異なっています',
        ];
    }
}
