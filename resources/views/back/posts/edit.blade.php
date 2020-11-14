<?php
/**
 * @var \App\Models\Post $post
 */
?>
<x-back.layouts.base title="投稿編集">
    <div class="card-header">投稿編集</div>
    <div class="card-body">
        {!! Form::model($post, [
            'route' => ['back.posts.update', $post],
            'method' => 'put'
        ]) !!}
        @include('back.posts._form')
        {!! Form::close() !!}
    </div>
</x-back.layouts.base>
