<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;

class AdminController extends Controller
{
    //跳转添加页面
    public function add(){
       return view('admin/add');
    }
    //执行添加方法

    /*第二种验证方法    public function save(\App\Http\Requests\StoreAdminPost $request){*/
    public function save(){
        /*验证*/
        request()->validate([
            'admin_name' => 'required|unique:admin',
            'admin_pwd' => 'required',
        ],[
            'admin_name.required'=>'用户名必填',
            'admin_name.unique'=>'用户名已存在',
            'admin_pwd.required'=>'密码必填',
        ]);

        $post=request()->except('_token');
        if(request()->hasFile('admin_logo')){
            $post['admin_logo'] = $this->upload('admin_logo');
        }
        $res=Admin::create($post);
        if($res){
            echo "<script>alert('添加成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/admin/add'</script>";
        }
    }
    //文件上传
    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return $store_result;
            }
            exit('未获取到上传文件或上传过程出错');
    }
    //跳转列表展示页面
    public function list(){
        
        $admin= new Admin;
        $data=$admin->paginate(4);
        return view('admin/list',['data'=>$data]);
    }
    //执行删除方法
    public function del($admin_id){
        $admin=new Admin;
        $res = $admin->where('admin_id',$admin_id)->delete();
        if($res){
            echo "<script>alert('删除成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/admin/list'</script>";
        }
    }
    //跳转修改页面
    public function upd($admin_id){
        $admin= new Admin;
        $data = $admin->where('admin_id',$admin_id)->first();
        return view('admin/upd',['data'=>$data]);
    }
    //执行修改方法`
    public function upd_do($admin_id){
        $post=request()->except('_token');
        $admin=new Admin;
        $data=$admin->where('admin_id',$admin_id)->update($post);
        if($data){
            echo "<script>alert('修改成功');location='/admin/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/admin/list'</script>";
        }
    }
}
