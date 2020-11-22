<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * 一覧画面
     *
     * @param string $tagSlug
     * @return \Illuminate\Contracts\View\View
     */
    public function index(string $tagSlug = null)
    {
        // 公開・新しい順に表示
        $posts = Post::publicList($tagSlug);
        $tags = Tag::all();

        return view('front.posts.index', compact('posts', 'tags'));
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
