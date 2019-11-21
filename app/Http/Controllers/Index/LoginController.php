<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Reg;

class LoginController extends Controller
{
    //前台登录首页
    public function index(){
        return view('index/login/index');
    }
    //查询数据
    public function add(){
        $data_two =request()->except('_token');
        $data = Reg::first();
        if($data_two['reg_pwd']!==$data['reg_pwd']){
            echo "<script>alert('密码错误');location='/login/index'</script>";
        }else{
            echo "<script>alert('登陆成功');location='/'</script>";
        }
    }

}
