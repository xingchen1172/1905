<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table="cate";
    
    public $primaryKey='cate_id';  
    /**
     * 可以被批量赋值的属性
     */
     protected $fillable = ['cate_name','cate_show','cate_tion','parent_id'];
     /**打上时间戳 */
     public $timestamps = false;
}
