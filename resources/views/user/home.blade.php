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

                    <table class="table">
                        <tr>
                            <th>商品名</th><th>画像</th><th>説明</th><th>価格</th><th>在庫</th><th>登録日</th><th>タグ</th>
                        </tr>
                        @if (isset($goods_list))
                            @foreach ($goods_list as $goods)
                            <tr>
                                <td>{{$goods->name}}</td>
                                <td>{{$goods->photo}}"</td>
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
                            </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
