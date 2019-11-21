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
    <form action="{{url('goods/save')}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="goods_name" id="goods_name">
                    <span>*</span>
                </td>
            </tr>
            <tr>
                <td>是否展示图片</td>
                <td>
                    <input type="radio" name="goods_show" value="1">是
                    <input type="radio" name="goods_show" value="2" checked>否
                </td>
            </tr>
            <tr>
                <td>商品价格</td>
                <td>
                    <input type="text" name="goods_price" id="goods_price">
                    <span>*</span>
                </td>
            </tr>
            <tr>
                <td>商品图片</td>
                <td>
                    <input type="file" name="goods_img">
                </td>
            </tr>
            <tr>
                <td>是否上架</td>
                <td>
                    <input type="radio" name="goods_up" value="1" checked>是
                    <input type="radio" name="goods_up" value="2">否
                </td>
            </tr>
            <tr>
                <td>是否热销</td>
                <td>
                    <input type="radio" name="goods_hot" value="1" checked>是
                    <input type="radio" name="goods_hot" value="2">否
                </td>
            </tr>
            <tr>
                <td>是否新品</td>
                <td>
                    <input type="radio" name="goods_new" value="1" checked>是
                    <input type="radio" name="goods_new" value="2">否
                </td>
            </tr>
            <tr>
                <td>商品详情</td>
                <td>
                    <textarea name="goods_desc" id="goods_desc"></textarea>
                    <span>*</span>
                </td>
            </tr>
            <tr>
                <td>品牌</td>
                <td>
                    <select name="brand_id">
                        <option value="">--请选择--</option>
                        @foreach($brandInfo as $v)
                            <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>分类</td>
                <td>
                    <select name="cate_id">
                        <option value="">--请选择--</option>
                        @foreach($cateInfo as $v)
                            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                        @endforeach
                    </select>
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
    $(Document).on("blur","#goods_name",function(){
        var goods_name = $(this).val();
        var reg = /^[\u4e00-\u9fa5]{2,6}$/;
        if(!reg.test(goods_name)){
            $(this).next().text('商品名称格式错误');
        }
    });
    $(document).on('blur',"#goods_price",function(){
        var goods_price =$(this).val();
        var reg = /^[0-9]+$/;
        if(!reg.test(goods_price)){
            $(this).next().text('商品价格格式错误');
        }
    });
</script>