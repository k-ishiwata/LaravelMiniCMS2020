<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Post一覧
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // 公開・新しい順に表示
        $posts = Post::where('is_public', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('front.posts.index', compact('posts'));
    }

    /**
     * Post詳細
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $post = Post::where('is_public', true)->findOrFail($id);

        return view('front.posts.show', compact('post'));
    }
}
