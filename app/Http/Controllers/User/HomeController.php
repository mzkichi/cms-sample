<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // パラメータ取得
        $sort = $request->sort;
        if (is_null($sort)) {
            $sort = 'id';
        }

        $orderby = $request->orderby;
        if (is_null($orderby)) {
            $orderby = 'asc';
        }

        $keyword = $request->keyword;
        $tag = $request->tag;

        // 商品検索
        $query = \DB::table('t_goods');

        if(isset($keyword)) {
            $query = $query
                ->where('name', 'like', '%' . $keyword .'%')
                ->orWhere('notice', 'like', '%' . $keyword .'%');
        }

        $goods_list = $query
            ->orderBy($sort, $orderby)
            ->paginate(15);

        // タグ検索
        $tag_list = array();
        foreach($goods_list as $goods) {
            $tag_list[$goods->id] = array();
            $tags = \DB::table('t_tags')->where('goods_id', $goods->id)->get();
            
            foreach($tags as $tag) {
                array_push($tag_list[$goods->id], \DB::table('m_tags')->where('id', $tag->tag_id)->find(1));
            }
        }

        return view('user.home', ['goods_list'=>$goods_list, 'tag_list'=>$tag_list]);
    }
}
