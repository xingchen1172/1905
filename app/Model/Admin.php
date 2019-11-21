<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";


    public $primaryKey='admin_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['admin_name','admin_pwd','admin_logo'];


     /**打上时间戳 */
     public $timestamps = false;   
}
