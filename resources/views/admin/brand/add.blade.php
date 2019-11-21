<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台品牌添加页面</title>
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
    <form action="{{url('brand/save')}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
            <tr>
                <td>品牌名称</td>
                <td>
                    <input type="text" name="brand_name" id="brand_name">
                    <span id="span_name">*</span>
                </td>
            </tr>
            <tr>
                <td>品牌Logo</td>
                <td>
                    <input type="file" name="brand_logo">
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    <input type="radio" name="is_show" value="1">是
                    <input type="radio" name="is_show" value="2">否
                </td>
            </tr>
            <tr>
                <td>品牌网址</td>
                <td>
                    <input type="text" name="brand_email">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<script>
    $(document).on("blur","#brand_name",function(){
        var brand_name = $(this).val();
        var reg =/^[\u4e00-\u9fa5]{2,6}$/;
        if(!reg.test(brand_name)){
            $(this).next().text('品牌格式错误,汉字2-6位');
        }
    });
</script>
