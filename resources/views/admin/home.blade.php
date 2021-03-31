@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">管理画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ■新規追加
                    <!-- <table>
                        <tr>
                            <th>商品名</th><th>画像</th><th>説明</th><th>価格</th><th>在庫</th><th>登録日</th><td class="buttun-area"></td>
                        </tr>
                        <form action="/edit" method="post" enctype="multipart/form-data">
                            <tr>
                                <td><input type="text" name="name" value="{{old('name')}}"></td>
                                <td><input id="image" type="file" name="image" value="{{old('image')}}"></td>
                                <td><input type="text" name="notice" value="{{old('name')}}"></td>
                                <td><input type="number" name="price" value="{{old('stock')}}">円</td>
                                <td><input type="number" name="stock" value="{{old('stock')}}"></td>
                                <td>{{old('image')}}</td>
                                <td class="buttun-area">
                                    <input type="submit" class="ins_button" name="insert_goods" value="登録">
                                </td>
                            </tr>
                        </form>
                    </table> -->
                    <hr size="1">
                    ■編集
                    <table class="table">
                        <tr>
                            <th>商品名</th><th>画像</th><th>説明</th><th>価格</th><th>在庫</th><th>登録日</th><th>タグ</th><td class="buttun-area"></td>
                        </tr>
                        @if (isset($goods_list))
                            @foreach ($goods_list as $goods)
                                <form action="/edit" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <input type="hidden" name="id" value="{{$goods->name}}">
                                        <td>{{$goods->id}}</td>
                                        <td><input type="image" name="m_id" value="{{$goods->photo}}"></td>
                                        <td><input type="text" name="name" value="{{$goods->notice}}"></td>
                                        <td><input type="number" name="price" value="{{$goods->price}}">円</td>
                                        <td><input type="number" name="stock" value="{{$goods->stock}}">個</td>
                                        <td>{{$goods->created_at}}</td>
                                        <td>
                                            @foreach ($tag_list[$goods->id] as $tag)
                                                @if (isset($tag))
                                                    {{$tag->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="buttun-area">
                                            <input type="submit" class="upd_button" name="update_goods" value="更新">
                                        </td>
                                        <td class="buttun-area">
                                            <input type="submit" class="del_button" name="delete_goods" value="削除">
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
