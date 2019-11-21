<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //验证吗
    public function send(){
        $email = '3228682711@qq.com';
        $code = rand(100000,999999);
        $message = "您的验证码是:".$code;
        $this->sendemail($email,$code);
    }
    public function sendemail($email,$code){
        \Mail::send('index/reg/email' , ['code'=>$code] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
    }
}
