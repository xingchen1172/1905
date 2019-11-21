<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table="goods";
    
    public $primaryKey='goods_id';  
    /**
     * 可以被批量赋值的属性
     */
     protected $fillable = ['goods_name','goods_price','goods_img','goods_new','goods_hot','goods_up','brand_id','cate_id','goods_desc','goods_show'];
     /**打上时间戳 */
     public $timestamps = false;
}
