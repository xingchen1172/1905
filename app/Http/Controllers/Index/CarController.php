<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Car;

class CarController extends Controller
{
    //跳转购物车页面
    public function index(){
        $carInfo = Car::join('goods','goods.goods_id','=','car.c_id')->get();
        return view('index.car.index',['carInfo'=>$carInfo]);
    }
    //添加购物车
    public function car(){
        $post = request()->except('_token');
        // dd($post);
        $post['add_time']=time();
        $data = Car::create($post);
        if($data){
            echo 1;
        }else{
            echo 2;
        }
    }
}