<?php
/**
 * @var \App\Models\Post $post
 */
$title = 'お知らせ詳細';
?>
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
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
@endsection
