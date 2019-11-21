<?php

namespace App\Model\Model;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $table="index";


    public $primaryKey='index_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['index_name','index_out','index_over','index_show','index_desc'];


     /**打上时间戳 */
     public $timestamps = false;  
}
