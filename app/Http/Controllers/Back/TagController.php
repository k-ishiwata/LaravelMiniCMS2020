<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tags = Tag::latest('id')->paginate(20);
        return view('back.tags.index', compact('tags'));
    }

    /**
     * 登録画面
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('back.tags.create');
    }

    /**
     * 登録処理
     *
     * @param TagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $tag = Tag::create($request->all());

        if ($tag) {
            return redirect()
                ->route('back.tags.edit', $tag)
                ->withSuccess('データを登録しました。');
        } else {
            return redirect()
                ->route('back.tags.create')
                ->withError('データの登録に失敗しました。');
        }
    }

    /**
     * 編集画面
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Tag $tag)
    {
        return view('back.tags.edit', compact('tag'));
    }

    /**
     * 更新処理
     *
     * @param  TagRequest $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {
        if ($tag->update($request->all())) {
            $flash = ['success' => 'データを更新しました。'];
        } else {
            $flash = ['error' => 'データの更新に失敗しました'];
        }

        return redirect()
            ->route('back.tags.edit', $tag)
            ->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            $flash = ['success' => 'データを削除しました。'];
        } else {
            $flash = ['error' => 'データの削除に失敗しました'];
        }

        return redirect()
            ->route('back.tags.index')
            ->with($flash);
    }
}
