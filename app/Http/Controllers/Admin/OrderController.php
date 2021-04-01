<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sort = $request->sort;
        if (is_null($sort)) {
            $sort = 't_orders.id';
        }

        $orderby = $request->orderby;
        if (is_null($orderby)) {
            $orderby = 'asc';
        }

        $orders_list = \DB::table('t_orders')
            //->sortable()
            ->join('t_goods', 't_goods.id', '=', 't_orders.goods_id')
            ->orderBy($sort, $orderby)
            //TODO 外す方法を考える
            ->limit(1000)
            ->paginate(15);

        $param = [
            'orders_list' => $orders_list,
            'sort' => $sort
        ];
        return view('admin.order', $param);
    }
}
