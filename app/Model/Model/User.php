<?php

namespace App\Model\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="user";


    public $primaryKey='user_id';  
    /**
     * 可以被批量赋值的属性
     * 
     */
     protected $fillable = ['user_name','user_pwd','user_show'];


     /**打上时间戳 */
     public $timestamps = false;   
}
