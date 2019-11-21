<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="/static/admin/jquery-3.1.1.min.js"></script>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('admin/save')}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
            <tr>
                <td>用户名</td>
                <td>
                    <input type="text" id="admin_name" name="admin_name">
                    <span id="span_name">*</span>
                </td>
            </tr>
            <tr>
                <td>密码</td>
                <td>
                    <input type="password" name="admin_pwd">
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
                    <input type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<script>
    $(document).on('blur',"#admin_name",function(){
        var _this=$(this);
        var admin_name = _this.val();
        var reg = /^[\u4e00-\u9fa5]{2,5}$/;
        if(!reg.test(admin_name)){
            $(this).next().text('用户名格式错误');
        }
        return false;
    });
</script>