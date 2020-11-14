<?php
/**
 * @var \App\Models\Post $post
 */
?>
<x-front.layouts.base title="お知らせ詳細">
<div class="card-header">お知らせ詳細</div>
<div class="card-body">
    <h2>{{ $post->title }}</h2>
    <time>{{ $post->published_format }}</time>
    <div>
        {!! $post->body !!}
    </div>
    {!! link_to_route(
        'front.posts.index', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary'])
    !!}
</div>
</x-front.layouts.base>
