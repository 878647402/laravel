<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //验证规则
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
            //验证规则
            'username'=>'required|regex:/\w{4,10}/|unique:users',
            'password'=>'required|regex:/\w{4,10}/',
            'repassword'=>'required|same:password',
            'email'=>'required|email'
               ];
    }
    public function messages(){
        return [
            //错误提示信息
            'username.required'=>'用户名不能为空',
            'username.unique'=>'用户名存在',
            'username.regex'=>'用户名6-10 位数字,字符串',

            'password.required'=>'密码不能为空',
            'password.regex'=>'密码必须 6-10 位数字,字符串',

            'repassword.same'=>'密码不一致',
            'repassword.required'=>'重复密码不能为空',
             

            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确'
            
                ];
    }
}
