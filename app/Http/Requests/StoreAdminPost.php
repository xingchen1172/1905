<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminPost extends FormRequest
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
            'admin_name' => 'required|unique:admin',
            'admin_pwd' => 'required',
        ];
    }
        /**
    * 获取被定义验证规则的错误消息
    *
    本文档由 Laravel 学院提供
    Laravel 学院致力于提供优质 Laravel 中文学习资源：http://laravelacademy.org 105
    * @return array
    * @translator laravelacademy.org
    */
    public function messages(){
        return [
                'admin_name.required'=>'用户名必填',
                'admin_name.unique'=>'用户名已存在',
                'admin_pwd.required'=>'密码必填',
        ];
    }
}
