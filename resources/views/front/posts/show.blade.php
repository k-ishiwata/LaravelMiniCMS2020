<?php
/**
 * @var \App\Models\Post $post
 */
$title = '投稿詳細';
?>
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <h2>{{ $post->title }}</h2>
    <time>{{ $post->published_format }}</time>
    <div>
        {!! nl2br(e($post->body)) !!}
    </div>
    @if(0 < count($post->tags))
        <ul class="mt-3">
            @foreach($post->tags as $tag)
                <li>
                    {{ link_to_route('front.posts.index.tag', $tag->name, $tag->slug) }}
                </li>
            @endforeach
        </ul>
    @endif
    {!! link_to_route(
        'front.posts.index', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary'])
    !!}
</div>
@endsection
