<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cate;

class CateController extends Controller
{
    //跳转添加页面
    public function add(){
        $cateInfo=Cate::get();
        $data=$this->getcateInfo($cateInfo);
        return view('admin/cate/add',['data'=>$data]);
    }
    /**无限极分类 */
    public function getcateInfo($cateInfo,$parent_id=0,$level=1){
        static $info = [];
        foreach($cateInfo as $k=>$v){
            if($v['parent_id']==$parent_id){
                $v['level']=$level;
                $info[]=$v;
                $this->getcateInfo($cateInfo,$v['cate_id'],$level+1);
            }
        }
        return $info;
    }

    //执行添加方法
    public function save(){
        $post=request()->except('_token');
        request()->validate([
            'cate_name'=>'required|unique:cate',
        ],[
            'cate_name.required'=>'分类名称不能为空',
            'cate_name.unique'=>'分类名称已存在',
        ]);
           
        
        $res = Cate::create($post);
        if($res){
            echo "<script>alert('添加成功');location='/admin/cate/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/admin/cate/add'</script>";
        }
    }
    //跳转列表展示
    public function list(){
        $cate=new Cate;
        $name= request()->name;
        $where=[];
        if($name){
            $where[]=['cate_name','like',"%$name%"];
        }
        $cateInfo = $cate->where($where)->get();
        $data=$this->getcateInfo($cateInfo);
        $query = request()->all();
        return view('admin/cate/list',['data'=>$data,'query'=>$query]);
    }
    //执行删除方法
    public function del($cate_id){
        $cate= new Cate;
        $data = $cate->where('cate_id',$cate_id)->delete();
        if($data){
            echo "<script>alert('删除成功');location='/cate/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/cate/list'</script>";
        }
    }
    //跳转修改页面
    public function upd($cate_id){
        $cate =new Cate;
        $arrdata=$cate::get();
        $data=$cate->where('cate_id',$cate_id)->first();
        return view('admin/cate/upd',['data'=>$data,'arrdata'=>$arrdata]);
    }
    //执行修改方法
    public function upd_do($cate_id){
        $cate =new Cate;
        $post = request()->except('_token');
        $res = $cate->where('cate_id',$cate_id)->update($post);
        if($res){
            echo "<script>alert('修改成功');location='/cate/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/cate/list'</script>";
        }
        
    }
}
