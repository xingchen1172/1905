<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台品牌添加页面</title>
</head>
<body>
    <form action="{{url('brand/upd_do/'.$res->brand_id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
            <tr>
                <td>品牌名称</td>
                <td>
                    <input type="text" name="brand_name" value="{{$res->brand_name}}">
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
                    @if($res->is_shwo==1)
                    <input type="radio" name="is_show" value="1" checked>是
                    <input type="radio" name="is_show" value="2">否
                    @else
                    <input type="radio" name="is_show" value="1">是
                    <input type="radio" name="is_show" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                <td>品牌网址</td>
                <td>
                    <input type="text" name="brand_email" value="{{$res->brand_email}}">
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
