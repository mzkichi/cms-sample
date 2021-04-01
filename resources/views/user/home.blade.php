@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/" method="get" enctype="multipart/form-data">
                        キーワード<input type="text" name="keyword" value=""></br>
                        タグ<input type="text" name="tag" value=""></br>
                        <input type="submit" class="upd_button" name="update_goods" value="絞り込み">
                    </form>

                    <form action="/detail" method="get" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <th>商品名<a href="/?sort=name">▲</a><a href="/admin?sort=name&orderby=desc">▼</a></th>
                            <th>画像</th>
                            <th>説明<a href="/?sort=notice">▲</a><a href="/admin?sort=notice&orderby=desc">▼</a></th>
                            <th>価格<a href="/?sort=price">▲</a><a href="/admin?sort=price&orderby=desc">▼</a></th>
                            <th>在庫<a href="/?sort=stock">▲</a><a href="/admin?sort=stock&orderby=desc">▼</a></th>
                            <th>登録日<a href="/?sort=created_at">▲</a><a href="/admin?sort=created_at&orderby=desc">▼</a></th>
                            <th>タグ</th>
                            <th></th>
                        </tr>
                        @if (isset($goods_list))
                            @foreach ($goods_list as $goods)
                            <tr>
                                <input type="hidden" name="id" value="{{$goods->id}}">
                                <td>{{$goods->name}}</td>
                                <td><img src="{{$goods->photo}}"></td>
                                <td>{{$goods->notice}}</td>
                                <td>{{$goods->price}}円</td>
                                <td>{{$goods->stock}}個</td>
                                <td>{{$goods->created_at}}</td>
                                <td>
                                    @foreach ($tag_list[$goods->id] as $tag)
                                        @if (isset($tag))
                                            {{$tag->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td><input type="submit" class="upd_button" name="detail" value="詳細"></td>
                            </tr>
                            @endforeach
                        @endif
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
