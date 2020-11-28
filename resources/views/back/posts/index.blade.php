<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\Post[] $posts
 */
$title = '投稿一覧';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {!! Form::model($search, [
        'route' => 'back.posts.index',
        'method' => 'get',
        'class' => 'mb-2'
    ]) !!}
        <div class="form-row align-items-center">
            <div class="col-auto">
                {{ Form::text('title', null, [
                    'class' => 'form-control',
                    'placeholder' => 'タイトル'
                ]) }}
            </div>
            <div class="col-auto">
                {{ Form::select('user_id', $users, null, [
                    'class' => 'custom-select',
                    'placeholder' => '選択してください。'
                ]) }}
            </div>
            <div class="col-auto">
                {{ Form::select('is_public', config('common.public_status'), null, [
                    'class' => 'custom-select',
                    'placeholder' => '選択してください。'
                ]) }}
            </div>
            <div class="col-auto">
                {{ Form::select('tag_id', $tags, null, [
                    'class' => 'custom-select',
                    'placeholder' => '選択してください。'
                ]) }}
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">検索</button>
            </div>
        </div>
    {{ Form::close() }}

    {{ link_to_route('back.posts.create', '新規登録', null, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $posts->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">タイトル</th>
                    <th scope="col" style="width: 4.3em">状態</th>
                    <th scope="col" style="width: 7em">タグ</th>
                    <th scope="col" style="width: 9em">公開日</th>
                    <th scope="col">編集者</th>
                    <th scope="col" style="width: 12em">編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->is_public_label }}</td>
                    <td>
                        @foreach($post->tags as $tag)
                            @if (!$loop->first)、@endif
                            {{ $tag->name }}
                        @endforeach
                    </td>
                    <td>{{ $post->published_format }}</td>
                    <td>{{ $post->user->name }}</td>
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
            {{ $posts->appends($search)->links() }}
        </div>
    @endif
</div>
@endsection
