<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
        {{session('msg')}}
<form>
    <input type="text" name="name" value="{{$query['name']??''}}"><input type="submit" value="搜索">
</form>
   
<body>
    <table border="1">
        <tr>
            <td>品牌编号</td>
            <td>品牌名称</td>
            <td>品牌logo</td>
            <td>品牌网址</td>
            <td>是否上架</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->brand_id}}</td>
            <td>{{$v->brand_name}}</td>
            <td>
               <img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" height="100px" width="100px"> 
            </td>
            <td>{{$v->brand_email}}</td>
            <td>{{$v->is_show?'是':'否'}}</td>
            <td>
                <a href="{{url('brand/del/'.$v->brand_id)}}">删除</a>
                <a href="{{url('brand/upd/'.$v->brand_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$data->links()}}
</body>
</html>