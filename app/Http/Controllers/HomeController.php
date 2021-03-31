<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $goods_list = \DB::table('t_goods')
            //TODO ログインユーザーに紐づくレコードを取得
            ->where('user_id', 1)
            //TODO ページネーションを実装したら外す
            ->limit(20)
            ->get();

        $tag_list = array();
        foreach($goods_list as $goods) {
            $tag_list[$goods->id] = array();
            $tags = \DB::table('t_tags')
                ->where('goods_id', $goods->id)
                ->get();
            
            foreach($tags as $tag) {
                array_push($tag_list[$goods->id], \DB::table('m_tags')->where('id', $tag->tag_id)->find(1));
            }
            //dd($tag_list);
        }
        return view('home', ['goods_list'=>$goods_list, 'tag_list'=>$tag_list]);
    }
}
