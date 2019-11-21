<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;

class ProlistController extends Controller
{
    //全部商品列表页首页
    public function index(){
        $data = Goods::paginate(5);
        return view('index/prolist/index',['data'=>$data]);
    }
    //商品详情
    public function goods_list($goods_id){
        $data = Goods::where('goods_id',$goods_id)->first();
        return view('index/prolist/list',['data'=>$data]);
    }

}
