<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ha extends Model
{
    protected $table="ha";
    
    public $primaryKey='ha_id';  
    /**
     * 可以被批量赋值的属性
     */
     protected $fillable = ['ha_name','ha_title','ha_radio','ha_logo','ha_desc','ha_cate'];
     /**打上时间戳 */
     public $timestamps = false;
}
