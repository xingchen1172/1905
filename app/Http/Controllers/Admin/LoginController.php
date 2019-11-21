<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;

class LoginController extends Controller
{
    //跳转登录页面
    public function add(){
        return view('login/add');
    }
    //
    public function save(){
        $post = request()->except('_token');
        // dump($post);
        $data = Admin::get();
        // dd($data);
        if($post != $data){
            echo "<script>alert('登录失败');location='/login/add'</script>";
        }else{
            echo "<script>alert('登录成功');location='/admin/list'</script>";
        }
    }
}
