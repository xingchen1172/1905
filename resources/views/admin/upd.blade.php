<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/upd_do/'.$data->admin_id)}}" method="post">
    @csrf
        <table border="1">
            <tr>
                <td>用户名</td>
                <td>
                    <input type="text" name="admin_name" value="{{$data->admin_name}}">
                </td>
            </tr>
            <tr>
                <td>密码</td>
                <td>
                    <input type="password" name="admin_pwd" value="{{$data->admin_pwd}}"> 
                </td>
            </tr>
            <tr>
                <td>头像</td>
                <td>
                    <input type="file" name="admin_logo">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>