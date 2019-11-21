<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('cate/upd_do/'.$data->cate_id)}}" method="post">
    <h3>分类添加</h3><hr>
        @csrf         
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        <table border="1">
            <tr>
                <td>分类名称</td>
                <td>
                    <input type="text" name="cate_name" value="{{$data->cate_name}}">
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    @if($data->cate_show==1)
                    <input type="radio" name="cate_show" value="1" checked>是
                    <input type="radio" name="cate_show" value="2">否
                    @else
                    <input type="radio" name="cate_show" value="1">是
                    <input type="radio" name="cate_show" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                <td>是否在导航栏展示</td>
                <td>
                    @if($data->cate_tion==1)
                    <input type="radio" name="cate_tion" value="1" checked>是
                    <input type="radio" name="cate_tion" value="2">否
                    @else
                    <input type="radio" name="cate_tion" value="1">是
                    <input type="radio" name="cate_tion" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                    <td>父类</td>
                    <td>
                        <select name="parent_id" value="{{$data->parent_id}}">
                            <option value="">--分类--</option>
                            @foreach($arrdata as $v)
                                <option value="{{$v->cate_id}}">{{str_repeat('__',$v['level'])}}{{$v->cate_name}}</option>
                            @endforeach
                        </select>
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