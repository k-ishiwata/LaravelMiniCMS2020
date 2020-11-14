<?php
/**
 * @var \App\Models\Post $post
 */
?>
<x-back.layouts.base title="投稿作成">
    <div class="card-header">投稿作成</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.posts.store']) }}
        @include('back.posts._form')
        {{ Form::close() }}
    </div>
</x-back.layouts.base>
