<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Model\User;
use App\Model\Model\Index;

class UserController extends Controller
{
    //普通管理员添加页面
    public function index(){
        return view('user/index');
    }
    //普通管理员添加方法
    public function index_add(){
        $post = request()->except('_token');
        $indexInfo = Index::create($post);
        if($indexInfo){
            echo "<script>alert('添加成功');location='/user/index_add_list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/user/index'</script>";
        }
    }
    //普通管理员列表展示
    public function index_add_list(){
        $data = index::paginate(5);
        return view('user/index_add_list',['data'=>$data]);
    }
    //普通管理员删除
    public function index_add_del($index_id){
        $data = Index::where('index_id',$index_id)->delete();
        if($data){
            echo "<script>alert('删除成功');location='/user/index_add_list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/user/index_add_list'</script>";
        }
    }
    //普通管理员修改页面
    public function index_add_upd($index_id){
        $data = Index::where('index_id',$index_id)->first();
        return view('user/index_add_upd',['data'=>$data]);
    }
    //普通管理员修改方法
    public function index_add_upd_do($index_id){
        $post = request()->except('_token');
        $data = Index::where('index_id',$index_id)->update($post);
        if($data){
            echo "<script>alert('修改成功');location='/user/index_add_list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/user/index_add_list'</script>";
        }
    }




    //超级管理员添加页面
    public function index_do(){
        return view('user/index_do');
    }
    //超级管理员列表
    public function index_do_list(){
        $data = Order::join()->get();
        return view('user/index_do_list');
    }
 
    //用户添加页面
    public function user(){
        return view('user/user');
    }




    //登录页面
    public function login(){
        return view('user/login');
    }

    //登录查询登录方法
    public function login_do(){
        $post = request()->except('_token');
        $loginInfo = User::where('user_name',$post['user_name'])->first();
        if($post['user_name'] !== $loginInfo['user_name']){
            echo "<script>alert('用户名不存在');location='/user/login'</script>";
        }else if($post['user_pwd'] !== $loginInfo['user_pwd']){
            echo "<script>alert('密码错误');location='/user/login'</script>";
        }else if($loginInfo['user_show']==1){
            echo "<script>alert('正在进入超级管理员界面');location='/user/index_do'</script>";
        }else if($loginInfo['user_show']==2){
            echo "<script>alert('正在进入普通管理员界面');location='/user/index'</script>";
        }else if($loginInfo['user_show']==3){
            echo "<script>alert('正在进入用户界面');location='/user/user'</script>";
        }else if($loginInfo['user_show']==0){ 
            echo "<script>alert('该用户已被禁用');location='/user/login'</script>";
        }

}

}