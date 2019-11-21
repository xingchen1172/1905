<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <form>
        <input type="text" name="word" value="{{$query['word']??''}}" style="height:30px;width:300px">
        <input type="text" name="desc" value="{{$query['desc']??''}}" style="height:30px;width:300px"><input type="submit" value="提交">
    </form>
<body>
    <table border="1">
        <tr>
            <td>商品编码</td>
            <td>商品名称</td>
            <td>商品价格</td>
            <td>商品图片</td>
            <td>是否上架</td>
            <td>是否热销</td>
            <td>是否新品</td>
            <td>商品详情</td>
            <td>是否展示图片</td>
            <td>品牌</td>
            <td>分类</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" style="height:80px"></td>
            <td>{{$v->goods_up?'是':'否'}}</td>
            <td>{{$v->goods_hot?'是':'否'}}</td>
            <td>{{$v->goods_new?'是':'否'}}</td>
            <td>{{$v->goods_desc}}</td>
            <td>{{$v->goods_show ==1?'是':'否'}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->cate_name}}</td>
            <td>
                <a href="{{url('goods/del/'.$v->goods_id)}}">删除</a>
                <a href="{{url('goods/upd/'.$v->goods_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$data->appends($query)->links()}}
</body>
</html>