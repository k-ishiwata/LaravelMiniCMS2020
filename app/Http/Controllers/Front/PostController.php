<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // 公開・新しい順に表示
        $posts = Post::publicList();
        return view('front.posts.index', compact('posts'));
    }

    /**
     * 詳細画面
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $post = Post::publicFindById($id);
        return view('front.posts.show', compact('post'));
    }
}
