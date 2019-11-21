<?php

namespace App\Model\Model;

use Illuminate\Database\Eloquent\Model;


class Lue extends Model
{
    protected $table="student";


    public $primaryKey='s_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['s_name','s_class','s_static'];

     /**打上时间戳 */
     public $timestamps = false;  
}
