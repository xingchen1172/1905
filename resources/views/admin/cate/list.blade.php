<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<form>
    <input type="text" name="name" value="{{$query['name']??''}}"><input type="submit" value="搜索">
</form>
    <script src="\static\admin\jquery-3.1.1.min.js"></script>
<body>
    <table border="1">
        <tr>
            <td>分类id</td>
            <td>
                分类名称
                <span id="span_name"></span>
            </td>
            <td>是否上架</td>
            <td>是否在导航栏展示</td>
            <td>父类</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->cate_id}}</td>
            <td>{{$v->cate_name}}</td>
            <td>{{$v->cate_show ?'是':'否'}}</td>
            <td>{{$v->cate_tion ?'是':'否'}}</td>
            <td>{{str_repeat('@-@',$v->level)}}
                {{$v->cate_name}}
            </td>
            <td>
                <a href="{{url('cate/del/'.$v->cate_id)}}">删除</a>
                <a href="{{url('cate/upd/'.$v->cate_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<script>
    
</script>
