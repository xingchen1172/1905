<?php

namespace App\Model\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";


    public $primaryKey='order_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['order_name','index_id','login_id'];


     /**打上时间戳 */
     public $timestamps = false;  
}