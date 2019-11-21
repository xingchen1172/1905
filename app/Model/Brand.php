<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table="brand";


    public $primaryKey='brand_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['brand_name','is_show','brand_logo','brand_email'];


     /**打上时间戳 */
     public $timestamps = false;
}
