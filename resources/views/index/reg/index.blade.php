@extends('layouts.shop')
    @section('title','注册首页')
    @section('content')

  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('reg/save')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('login/index')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="reg_name" placeholder="输入邮箱号" id="button_name"/></div>
       <div class="lrList2"><input type="text" name="reg_code" placeholder="输入验证码" /> <button type="button" id="button_email">获取验证码</button></div>
       <div class="lrList"><input type="password" name="reg_pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="password" name="reg_pwd_one" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     <div class="footNav">
      <dl>
       <a href="index.html">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="{{url('prolist/index')}}">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="{{url('car/index')}}">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="user.html">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>

@endsection
<script src="/static/admin/jquery-3.1.1.min.js"></script>
<script>
    $(document).on('click',"#button_email",function(){
      var reg_email = $("#button_name").val();
      $.post(
        "{{url('reg/send')}}",
        {email:reg_email,_token:"{{csrf_token()}}"},
        function(res){
            console.log(res)
        }
      )
    });
</script>