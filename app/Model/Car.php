<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table="car";
    
    public $primaryKey='c_id';  
    /**
     * 可以被批量赋值的属性
     */
     protected $fillable = ['goods_id','add_time','user_id','buy_number','add_price'];
     /**打上时间戳 */
     public $timestamps = false;
}
