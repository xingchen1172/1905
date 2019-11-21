<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;

class BrandController extends Controller
{
    /**跳转登录页面 */
    public function add(){
        return view('admin/brand/add');
    }
    /**执行添加方法 */
    public function save(){
         /**验证 */
         request()->validate([
            'brand_name' => 'required|unique:brand',
            'brand_email' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_email.required'=>'品牌网址必填',
            'brand_email.unique'=>'品牌网址已存在',
        ]);

        $brand = new Brand;
        $post=request()->except('_token');

        //文件上传
        if(request()->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        $res=Brand::create($post);
        if($res->brand_id){
            return redirect('/brand/list')->with('msg','添加成功');
        }
        // if($res){
        //     echo "<script>alert('添加成功')->with('msg');location='/brand/list'</script>";
        // }else{
        //     echo "<script>alert('添加失败');location='/brand/save'</script>";            
        // }
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
    /**跳转列表页 */
    public function list(){
        $brand=new Brand;
        //设置session
        // session(['user'=>'hahha']);
        // request()->session()->put('username','lisi');
        //获取
        // echo session('user');
       
        // echo  request()->session()->pull('username');//先获取在删除
        // request()->session()->forget('username');//单个删除
        // request()->session()->flush();//删除所有
        //删除
        // dump(session('user'));
        // dd(session('username'));
        // echo session('user');
        
        $name = request()->name;
        $where=[];
        if($name){
            $where[]=['brand_name','like',"%$name%"];
        }
        $data=$brand->where($where)->paginate(4);
        $query = request()->all();
        return view('admin/brand/list',['data'=>$data,'query'=>$query]);
    }
    //执行删除
    public function del($brand_id){
        $brand = new Brand;
        $res =$brand->where('brand_id',$brand_id)->delete();
        if($res){
            echo "<script>alert('删除成功');location='/brand/list'</script>";
        }else{
            echo "<script>alert('删除失败');location='/brand/list'</script>";
        }
    }
    //跳转修改页面
    public function upd($brand_id){
        $brand = new Brand;
        $res=$brand->where('brand_id',$brand_id)->first();        
        return  view('admin/brand/upd',['res'=>$res]);
    }
    /**执行修改方法 */
    public function upd_do($brand_id){
        $brand = new Brand;
        $data=request()->except('_token');
        $res= $brand->where('brand_id',$brand_id)->update($data);
        if($res){
            echo "<script>alert('修改成功');location='/brand/list'</script>";
        }else{
            echo "<script>alert('修改失败');location='/brand/list'</script>";
        }
    } 
}
