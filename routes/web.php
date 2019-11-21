<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Index\IndexController@index');

//后台品牌模块
Route::prefix('brand')->middleware('loginToken')->group(function(){
    Route::any('/add','admin\BrandController@add');//跳转登录页面
    Route::any('/save','admin\BrandController@save');//执行登录方法
    Route::any('/list','admin\BrandController@list');//跳转列表页
    Route::any('/del/{id}','admin\BrandController@del');//执行删除
    Route::any('/upd/{id}','admin\BrandController@upd');//跳转修改页面
    Route::any('/upd_do/{id}','admin\BrandController@upd_do');//执行修改方法
});
//后台管理员模块
Route::prefix('admin')->middleware('loginToken')->group(function(){
    Route::any('/add','admin\AdminController@add');//跳转添加页面
    Route::any('/save','admin\AdminController@save');//执行添加方法
    Route::any('/list','admin\AdminController@list');//跳转列表页
    Route::any('/del/{id}','admin\AdminController@del');//指向删除方法
    Route::any('/upd/{id}','admin\AdminController@upd');//跳转修改页面
    Route::any('/upd_do/{id}','admin\AdminController@upd_do');//执行修改方法
});
//后台分类模块
Route::prefix('cate')->middleware('loginToken')->group(function() {
    Route::any('/add','admin\CateController@add');//跳转添加页面
    Route::any('/save','admin\CateController@save');//执行添加方法
    Route::any('/list','admin\CateController@list');//跳转列表页
    Route::any('/del/{id}','admin\CateController@del');//指向删除方法
    Route::any('/upd/{id}','admin\CateController@upd');//跳转修改页面
    Route::any('/upd_do/{id}','admin\CateController@upd_do');//执行修改方法
    Route::any('/cate_up/{id}','admin\CateController@cate_up');//执行既点既改修改方法
});
//后台商品模块
Route::prefix('goods')->middleware('loginToken')->group(function() {
    Route::any('/add','admin\GoodsController@add');//跳转添加页面
    Route::any('/save','admin\GoodsController@save');//执行添加方法
    Route::any('/list','admin\GoodsController@list');//跳转列表页
    Route::any('/del/{id}','admin\GoodsController@del');//指向删除方法
    Route::any('/upd/{id}','admin\GoodsController@upd');//跳转修改页面
    Route::any('/upd_do/{id}','admin\GoodsController@upd_do');//执行修改方法
});
//后台登录
Route::prefix('login')->group(function() {
    Route::any('/add','admin\LoginController@add');//跳转添加页面
    Route::any('/save','admin\LoginController@save');//执行添加方法
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//考试
Route::prefix('ha')->middleware('loginToken')->group(function(){
    Route::any('/add','ha\HaController@add');
    Route::any('/save','ha\HaController@save');
    Route::any('/list','ha\HaController@list');
    Route::any('/del/{id}','ha\HaController@del');
    Route::any('/upd/{id}','ha\HaController@upd');
    Route::any('/upd_do/{id}','ha\HaController@upd_do');
    Route::any('/list','ha\LueController@list');
});

//前台登录
Route::prefix('login')->group(function(){
    Route::any('/index','index\LoginController@index');//前台登录页首页
    Route::any('/add','index\LoginController@add');//前台登录页首页
});
//前台注册
Route::prefix('reg')->group(function(){
    Route::any('/index','index\RegController@index');
    Route::any('/save','index\RegController@save');
    Route::any('/send','index\RegController@send');
    Route::any('/sendemail','index\RegController@sendemail');
});
//商品详情
Route::prefix('prolist')->group(function(){
   Route::any('/index','index\ProlistController@index');//全部商品页
   Route::any('/goods_list/{id}','index\ProlistController@goods_list');//商品详情页
});
//主页
Route::prefix('index')->group(function(){
    Route::any('/list','index\IndexController@list');
});
//购物车
Route::prefix('car')->group(function(){
    Route::any('/index','index\CarController@index');//购物车首页
    Route::any('/car','index\CarController@car');//添加购物车
});




//考试
Route::prefix('user')->group(function(){
    Route::any('/index','user\UserController@index');//普通管理员添加页面
    Route::any('/index_add','user\UserController@index_add');//普通管理员添加页面
    Route::any('/index_add_list','user\UserController@index_add_list');//普通管理员列表展示页面
    Route::any('/index_add_del/{id}','user\UserController@index_add_del');//普通管理员列表删除方法
    Route::any('/index_add_upd/{id}','user\UserController@index_add_upd');//普通管理员列表修改页面
    Route::any('/index_add_upd_do/{id}','user\UserController@index_add_upd_do');//普通管理员列表修改页面
    /**------ */
    Route::any('/index_do','user\UserController@index_do');//超级管理员添加页面
    Route::any('/login','user\UserController@login');//登录页面
    Route::any('/login_do','user\UserController@login_do');//登录查询登录方法
    Route::any('/user','user\UserController@user');//用户添加页面
});