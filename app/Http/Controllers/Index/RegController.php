<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Reg;

class RegController extends Controller
{
    //注册首页
    public function index(){
        return view('index/reg/index');
    }
   //验证吗
   public function send(){
    $email = request()->email;
    // echo $email;exit;
    $code = rand(100000,999999);
    session(['regcode'=>['code'=>$code,'email'=>$email]]);
    $message = "您的验证码是:".$code;
    $this->sendemail($email,$code);
}
public function sendemail($email,$code){
    \Mail::send('index/reg/email' , ['code'=>$code] ,function($message)use($email){
    //设置主题
        $message->subject("欢迎注册采珠惊龙有限公司");
    //设置接收方
        $message->to($email);
    });
}
public function save(){
    $post = request()->except('_token');
    if($post['reg_pwd']!==$post['reg_pwd_one']){
        echo "<script>alert('确认密码与密码不一致');location='/reg/index'</script>";
        return false;
    }
    $data = Reg::create($post);
    if($data){
        echo "<script>alert('添加成功');location='/login/index'</script>";
    }else{
        echo "<script>alert('添加失败');location='/reg/index'</script>";
    }
}
}
