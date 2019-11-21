<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>普通管理员列表展示</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>商品名称</td>
            <td>商品出库时间</td>
            <td>商品入库时间</td>
            <td>商品地址</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->index_name}}</td>
            <td>{{$v->index_out}}</td>
            <td>{{$v->index_over}}</td>
            <td>{{$v->index_desc}}</td>
            <td>
                <a href="{{url('user/index_add_del/'.$v->index_id)}}">删除</a>
                <a href="{{url('user/index_add_upd/'.$v->index_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$data->links()}}
</body>
</html>