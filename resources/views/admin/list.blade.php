<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>用户id</td>
            <td>用户名</td>
            <td>头像</td>
            <td>跳转页面</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->admin_id}}</td>
            <td>{{$v->admin_name}}</td>
            <td>
                <img src="{{env('UPLOAD_URL')}}{{$v->admin_logo}}" style="width:80px">
            </td>
            <td>
                <a href="{{url('brand/list')}}">品牌列表</a>
                <a href="{{url('cate/list')}}">分类列表</a>
                <a href="{{url('goods/list')}}">商品列表</a>
            </td>
            <td>
                <a href="{{url('admin/del/'.$v->admin_id)}}">删除</a>
                <a href="{{url('admin/upd/'.$v->admin_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
