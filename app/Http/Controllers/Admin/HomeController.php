<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TGood;

class HomeController extends Controller
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
            $sort = 'id';
        }

        $orderby = $request->orderby;
        if (is_null($orderby)) {
            $orderby = 'asc';
        }

        $goods_list = \DB::table('t_goods')
            //TODO ログインユーザーに紐づくレコードを取得
            //->sortable()
            ->where('user_id', 1)
            ->orderBy($sort, $orderby)
            ->paginate(15);

        $tag_list = array();
        foreach($goods_list as $goods) {
            $tag_list[$goods->id] = array();
            $tags = \DB::table('t_tags')
                ->where('goods_id', $goods->id)
                ->get();
            
            foreach($tags as $tag) {
                array_push($tag_list[$goods->id], \DB::table('m_tags')->where('id', $tag->tag_id)->find(1));
            }
        }
        $param = [
            'goods_list' => $goods_list,
            'tag_list'=>$tag_list,
            'sort' => $sort
        ];
        return view('admin.home', $param);
    }
}
