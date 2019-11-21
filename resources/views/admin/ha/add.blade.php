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
    <form action="{{url('ha/save')}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
        <tr>
            <td>文章标题</td>
            <td>
                <input type="text" name="ha_title" id="ha_title">
                <span>*</span>
            </td>
        </tr>
        <tr>
            <td>文章分类</td>
            <td>
                <select name="ha_cate">
                    <option value="新闻">新闻</option>
                    <option value="体育">体育</option>
                    <option value="健身">健身</option>
                    <option value="美术">美术</option>
                    <option value="科技">科技</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>文章重要性</td>
            <td>
                <input type="radio" name="ha_radio" value="1" checked>普通
                <input type="radio" name="ha_radio" value="2">重点
            </td>
        </tr>
        <tr>
            <td>文章作者</td>
            <td>
                <input type="text" name="ha_name">
            </td>
        </tr>
        <tr>
            <td>网页描述</td>
            <td>
                <textarea name="ha_desc"></textarea>
            </td>
        </tr>
        <tr>
            <td>文章图片</td>
            <td>
                <input type="file" name="ha_logo">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" value="提交">
            </td>
        </tr>
        </table>
    </form>
</body>
</html>
<script>
   $(document).on("blur","#ha_title",function(){
    var _this = $(this).val();
    var reg = /^[\u4e00-\u9fa5\w]{2,12}$/;
    if(!reg.test(_this)){
        $(this).next().text('格式错误');
        return false;
    }
    $('form').submit();
   });
</script>