    @extends('layouts.shop')
    @section('title','商品详情页')
    @section('content')
  
 <body>
 
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
    
     <div id="sliderA" class="slider">
      
        <img src="{{env('UPLOAD_URL')}}{{$data->goods_img}}"/>
     
     </div><!--sliderA/-->
    
     <table class="jia-len">
      <tr>
       <th><strong class="green" id="">{{$data->goods_price}}</strong></th>
       <td>
         <input type="hidden" id="goods_id" value="{{$data->goods_id}}">
         <input type="hidden" id="goods_price" value="{{$data->goods_price}}">
         <input type="hidden" id="goods_num" value="{{$data->goods_num}}">
         <input type="text"   id="buy_number" class="spinnerExample"/>
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$data->goods_name}}</strong>
        <p class="hui">{{$data->goods_desc}}</p>
       </td>
       
      </tr>
     </table>
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="javascript:void(0)" id="car">加入购物车</a></td>
      </tr>
     </table>
     <div class="height2"></div>

     <div class="height2"></div>
   
     
    <script src="/static/admin/jquery-3.1.1.min.js"></script>
     <script>
         $(document).on('click',"#car",function(){
            var goods_id = $('#goods_id').val();
            var goods_num = $('#goods_num').val();
            var add_price = $('#goods_price').val();
            var buy_number = $('#buy_number').val();
            // alert(add_price);return;
            $.post(
               "{{url('car/car')}}",
               {goods_id:goods_id,add_price:add_price,buy_number:buy_number,_token:"{{csrf_token()}}"},
               function(res){
                  if(res == 1){
                     alert('添加成功');
                  }
               }
            )
         });
     </script>
 
     @endsection
