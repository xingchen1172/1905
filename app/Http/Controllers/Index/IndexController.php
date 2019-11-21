<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Goods;

class IndexController extends Controller
{
    //跳转主页
    public function index(){
        
        $data = Goods::paginate(6);
        return view('index/index',['data'=>$data]);
    }
}
