<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\Post[] $posts
 */
?>
<x-back.layouts.base title="投稿一覧">
<div class="card-header">投稿一覧</div>
<div class="card-body">
    {{ link_to_route('back.posts.create', '新規登録', null, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $posts->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">タイトル</th>
                    <th scope="col" style="width: 4.3em">状態</th>
                    <th scope="col" style="width: 9em">公開日</th>
                    <th scope="col" style="width: 12em">編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->is_public_label }}</td>
                    <td>{{ $post->published_format }}</td>
                    <td class="d-flex justify-content-center">
                        {{ link_to_route('front.posts.show', '詳細', $post, [
                            'class' => 'btn btn-secondary btn-sm m-1',
                            'target' => '_blank'
                        ]) }}
                        {{ link_to_route('back.posts.edit', '編集', $post, [
                            'class' => 'btn btn-secondary btn-sm m-1'
                        ]) }}
                        {{ Form::model($post, [
                            'route' => ['back.posts.destroy', $post],
                            'method' => 'delete'
                        ]) }}
                            {{ Form::submit('削除', [
                                'onclick' => "return confirm('本当に削除しますか?')",
                                'class' => 'btn btn-danger btn-sm m-1'
                            ]) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @endif
</div>
</x-back.layouts.base>
