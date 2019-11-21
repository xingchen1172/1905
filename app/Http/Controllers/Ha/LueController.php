<?php

namespace App\Http\Controllers\Ha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Model\Lue;

class LueController extends Controller
{
    //查询数据
    public function list(){
        $data = Lue::get();
        dd($data);
    }
}
