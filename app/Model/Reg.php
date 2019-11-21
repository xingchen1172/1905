<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
    protected $table="reg";
    
    public $primaryKey='reg_id';  
    /**
     * 可以被批量赋值的属性
     */
     protected $fillable = ['reg_name','reg_pwd','reg_code'];
     /**打上时间戳 */
     public $timestamps = false;
}
