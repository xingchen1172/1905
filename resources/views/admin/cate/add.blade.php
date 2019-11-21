<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="\static\admin\jquery-3.1.1.min.js"></script>
<body>
    @if($errors->any())
            <ul>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
            </ul>
    @endif
    <form action="{{url('cate/save')}}" method="post">
    <h3>分类添加</h3><hr>
        @csrf         
        <table border="1">
            <tr>
                <td>分类名称</td>
                <td>
                    <input type="text" name="cate_name" id="cate_name">
                    <span value="span_name">*</span>
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    <input type="radio" name="cate_show" value="1">是
                    <input type="radio" name="cate_show" value="2">否
                </td>
            </tr>
            <tr>
                <td>是否在导航栏展示</td>
                <td>
                    <input type="radio" name="cate_tion" value="1">是
                    <input type="radio" name="cate_tion" value="2">否
                </td>
            </tr>
            <tr>
                    <td>父类</td>
                    <td>
                        <select name="parent_id">
                            <option value="">--分类--</option>
                            @foreach($data as $v)
                                <option value="{{$v->cate_id}}">{{str_repeat('__',$v['level'])}}{{$v->cate_name}}</option>
                            @endforeach
                        </select>
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
    $(document).on('blur',"#cate_name",function(){
        var _this= $(this);//获取当前点击对象
        var cate_name = _this.val();
        var reg =/^[\u4e00-\u9fa5]{2,12}$/;
        if(!reg.test(cate_name)){
           $(this).next().text('分类名称格式为2-16位');
        }
    });
    return false;
</script>