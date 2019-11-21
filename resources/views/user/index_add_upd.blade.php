<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>这是普通管理员界面</title>
</head>
<body>
    <form action="{{url('user/index_add_upd_do/'.$data->index_id)}}" method="post">
    @csrf
        <table border="1">
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="index_name" value="{{$data->index_name}}">
                </td>
            </tr>
            <tr>
                <td>商品进口时间</td>
                <td>
                    <input type="text" name="index_over" value="{{$data->index_over}}">
                </td>
            </tr>
            <tr>
                <td>商品出口时间</td>
                <td>
                    <input type="text" name="index_out" value="{{$data->index_out}}">
                </td>
            </tr>
            <tr>
                <td>商品发送地址</td>
                <td>
                    <textarea name="index_desc">{{$data->index_desc}}</textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>