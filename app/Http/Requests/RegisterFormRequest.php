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
            //
            'username' => 'required|between:2,12',
            'mail' => 'required|between:5,40||unique:users|email',
            'password' => 'required|alpha-num|between:8,20',
            'password_confirmation' => 'required|alpha-num|between:8,20|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザー名は必須項目です',
            'username.between:2,12' => 'ユーザー名は2文字以上12文字以内で入力してください',
            'mail.required' => 'メールアドレスは必須項目です',
            'mail.between:5,40' => 'メールアドレスは5文字以上40文字以内で入力してください',
            'mail.unique:users' => 'このメールアドレスは登録済みです',
            'mail.email' => 'メールアドレスの形式で入力してください',
            'password.required' => 'パスワードは必須項目です',
            'password.between:8,20' => 'パスワードは8文字以上20文字以内で入力してください',
            'password.alpha-num' => 'パスワードは半角英数字で入力してください',
            'password_confirmation.required' => '確認用パスワードは必須項目です',
            'password_confirmation.same:password' => 'パスワードと確認用パスワードが異なっています',
            'password_confirmation.alpha-num' => '確認用パスワードは半角英数字で入力してください',
            'password_confirmation.between:8,20' => '確認用パスワードは8文字以上20文字以内で入力してください',
        ];
    }
}
