<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>这里是登录表字段</title>
</head>
<body>
    <form action="{{url('user\login_do')}}" method="post">
    @csrf
        <table border="1">
            <tr>
                <td>用户名称</td>
                <td>
                    <input type="text" name="user_name">
                </td>
            </tr>
            <tr>
                <td>用户密码</td>
                <td>
                    <input type="password" name="user_pwd">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
                <td></td>
            </tr>

        </table>
    </form>
</body>
</html>