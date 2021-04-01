@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">注文一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>商品名<a href="/order/admin?sort=name">▲</a><a href="/order/admin?sort=name&orderby=desc">▼</a></th>
                            <th>数量<a href="/order/admin?sort=amount">▲</a><a href="/order/admin?sort=notice&orderby=desc">▼</a></th>
                            <th>注文日<a href="/order/admin?sort=created_at">▲</a><a href="/order/admin?sort=created_at&orderby=desc">▼</a></th>
                            <td class="buttun-area"></td>
                        </tr>
                        @if (isset($orders_list))
                            @foreach ($orders_list as $orders)
                                <tr>
                                    <input type="hidden" name="id" value="{{$orders->name}}">
                                    <td>{{$orders->name}}</td>
                                    <td>{{$orders->amount}}</td>
                                    <td>{{$orders->created_at}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    {{ $orders_list->appends(['sort' => $sort])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
