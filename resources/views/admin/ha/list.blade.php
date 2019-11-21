<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/static/admin/jquery-3.1.1.min.js"></script>
    <script src="/static/admin/layer-v3.1.1/layer/layer.js"></script>
</head>
<form>
    <input type="text" name="ha_title" value="{{$query['ha_title']??''}}">||<input type="text" name="ha_radio" value="{{$query['ha_radio']??''}}"><input type="submit" value="搜索">
</form>
    <a href="{{url('ha/add')}}">添加</a>
<body>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>文章标题</td>
            <td>文章分类</td>
            <td>文章重要性</td>
            <td>网页描述</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr ha_id="{{$v->ha_id}}">
            <td>{{$v->ha_id}}</td>
            <td>{{$v->ha_title}}</td>
            <td>
                {{$v->ha_cate}}
            </td>
            <td>{{$v->ha_radio==1 ? '普通':'重点'}}</td>
            <td>{{$v->ha_desc}}</td>
            <td>
                <a style="font-size: 15px;" type="submit" class="btn" id="del">(+|*删_除*|+)</a>||
                <a href="{{url('ha/upd/'.$v->ha_id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$data->appends($query)->links()}}
</body>
</html>
<script>
    $(document).on("click","#del",function(){
     var ha_id = $(this).parents('tr').attr('ha_id');
     layer.confirm('您确定要删除我吗？', {   // 使用layer.js确认弹窗
                btn: ['确定', '取消'],
            }, function() {                        // 当确定时执行
               $.post("{{ url('ha/del') }}/" + ha_id, {    // 网址、数据、成功后操作
                   "_token": "{{ csrf_token() }}",        
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg, { icon: 6});
                       location.href = "{{ url('ha/list') }}";
                   } else {
                       layer.msg(data.msg, { icon: 5});
                   }
               });
            }, function() {});
    });
</script>