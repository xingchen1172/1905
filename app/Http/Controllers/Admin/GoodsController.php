<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Cate;
use App\Model\Brand;

class GoodsController extends Controller
{
    //跳转添加页面
    public function add(){
        $cateInfo=Cate::get();
        $brandInfo=Brand::get();
        return view('admin/goods/add',['cateInfo'=>$cateInfo,'brandInfo'=>$brandInfo]);
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

     /**文件上传 */
     public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
           return $store_result;
            }
            exit('未获取到上传文件或上传过程出错');
    }


    //执行添加方法
    public function save(){
        request()->validate([
            'goods_name' => 'required|unique:goods',
            'goods_price' => 'required',
            'goods_desc' => 'required',
        ],[
            'goods_name.required'=>'商品名称必填',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格必填',
            'goods_desc.required'=>'商品详情必填',
        ]); 
        $goods =new Goods;
        $post = request()->except('_token');
        if(request()->hasFile('goods_img')){
            $post['goods_img'] = $this->upload('goods_img');
        }
        $res = $goods->create($post);
       if($res){
           echo "<script>alert('添加成功');location='/admin/goods/list/'</script>";
       }else{
           echo "<script>alert('添加失败');location='/admin/goods/add/'</script>";
       }
    }
    //跳转列表展示
    public function list(){
        $goods = new Goods;
        $pageSize = config('app.pageSize');
        $word = request()->word;
        $where=[];
        if($word){
            $where[] = ['goods_name','like',"%$word%"];
        }
        $desc = request()->desc;
        if($desc){
            $where[] = ['goods_desc','like',"%$desc%"];
        }
        $data = $goods->where($where)->join('cate','cate.cate_id','=','goods_id')->join('brand','brand.brand_id','=','goods.brand_id')->paginate($pageSize);
        $query = request()->all();
        // dump($query);
        return view('admin/goods/list',['data'=>$data,'query'=>$query]);
    }
    //执行删除方法
    public function del($goods_id){
        $goods = new Goods;
        $data = $goods->where('goods_id',$goods_id)->delete();
        if($data){
            echo "<script>alert('删除成功');location='/goods/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/goods/list'</script>";            
        }
    }
    //跳转修改页面
    public function upd($goods_id){
        $goods = new Goods;
        $cateInfo=Cate::get();
        $brandInfo=Brand::get();
        $res =  $goods->where('goods_id',$goods_id)->first();
        return view('admin/goods/upd',['res'=>$res,'cateInfo'=>$cateInfo,'brandInfo'=>$brandInfo]);
    }
    //执行修改方法
    public function upd_do($goods_id){
        $post=request()->except('_token');
        $goods = new Goods;
        $res = $goods->where('goods_id',$goods_id)->update($post);
        if($res){
            echo  "<script>alert('修改成功');location='/goods/list'</script>";
        }else{
            echo  "<script>alert('修改失败');location='/goods/list'</script>";
        }
    }
   

}
