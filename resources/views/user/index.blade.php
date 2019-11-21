<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>这是普通管理员界面</title>
</head>
<body>
    <form action="{{url('user/index_add')}}" method="post">
    @csrf
        <table border="1">
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="index_name">
                </td>
            </tr>
            <tr>
                <td>商品进口时间</td>
                <td>
                    <input type="text" name="index_over">
                </td>
            </tr>
            <tr>
                <td>商品出口时间</td>
                <td>
                    <input type="text" name="index_out">
                </td>
            </tr>
            <tr>
                <td>商品发送地址</td>
                <td>
                    <textarea name="index_desc"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table>
    </form>
</body>
</html>