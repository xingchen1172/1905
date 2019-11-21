
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('goods/upd_do/'.$res->goods_id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <table border="1">
            <tr>
                <td>商品名称</td>
                <td>
                    <input type="text" name="goods_name" value="{{$res->goods_name}}">
                </td>
            </tr>
            <tr>
                <td>商品价格</td>
                <td>
                    <input type="text" name="goods_price" value="{{$res->goods_price}}">
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
                    @if($res->goods_up==1)
                    <input type="radio" name="goods_up" value="1" checked>是
                    <input type="radio" name="goods_up" value="2">否
                    @else
                    <input type="radio" name="goods_up" value="1">是
                    <input type="radio" name="goods_up" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                <td>是否热销</td>
                <td>
                    @if($res->goods_hot==1)
                    <input type="radio" name="goods_hot" value="1" checked>是
                    <input type="radio" name="goods_hot" value="2">否
                    @else
                    <input type="radio" name="goods_hot" value="1">是
                    <input type="radio" name="goods_hot" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                <td>是否新品</td>
                <td>
                    @if($res->goods_new==1)
                    <input type="radio" name="goods_new" value="1" checked>是
                    <input type="radio" name="goods_new" value="2">否
                    @else
                    <input type="radio" name="goods_new" value="1">是
                    <input type="radio" name="goods_new" value="2" checked>否
                    @endif
                </td>
            </tr>
            <tr>
                <td>商品详情</td>
                <td>
                    <textarea name="goods_desc" value="">{{$res->goods_desc}}</textarea>
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
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>