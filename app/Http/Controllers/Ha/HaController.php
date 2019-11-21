<?php

namespace App\Http\Controllers\Ha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ha;

class HaController extends Controller
{
    public function add(){
        return view('ha/add');
    }
    public function save(){
        $post =request()->except('_token');

        request()->validate([
            'ha_title'=>'required|unique:ha',
        ],[
            'ha_title.required'=>'标题不能为空',
            'ha_title.unique'=>'标题已存在',
        ]);
        
        if(request()->hasFile('ha_logo')){
            $post['ha_logo'] = $this->upload('ha_logo');
        }
        $res = Ha::create($post);
        if($res){
            echo "<script>alert('添加成功');location='/ha/list'</script>";
        }else{
            echo "<script>alert('添加失败');location='/ha/add'</script>";
        }
    }
    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
           return $store_result;
            }
            exit('未获取到上传文件或上传过程出错');
    }
    public function list(){
        $title=request()->ha_title;
        $radio= request()->ha_radio;
        $where=[];
        if($title){
            $where[]=['ha_title','like',"%$title%"];
        }
        if($radio){
            $where[]=['ha_radio','like',"%$radio%"];
        }
        $data = Ha::where($where)->paginate(5);
        $query=request()->all();
        return view('ha/list',['data'=>$data,'query'=>$query]);
    }
    public function del($ha_id){
        $res = Ha::find($ha_id)->delete();
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        return $data;
}
    public function upd($ha_id){
        $data = Ha::where('ha_id',$ha_id)->first();
        return view('ha/upd',['data'=>$data]);
    }
    public function upd_do($ha_id){
        $data = request()->except('_token');
        $res = Ha::where('ha_id',$ha_id)->update($data);
        if($res){
            echo "<script>alert('修改成功');location='/ha/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/ha/list'</script>";
        }
    }

}