<?php
/**
 * @var \App\Models\Tag $tag
 */
$title = 'タグ編集';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {!! Form::model($tag, [
        'route' => ['back.tags.update', $tag],
        'method' => 'put'
    ]) !!}
    @include('back.tags._form')
    {!! Form::close() !!}
    <table class="table">
        <tr>
            <th>登録日時</th>
            <td>{{ $tag->created_at }}</td>
        </tr>
        <tr>
            <th>編集日時</th>
            <td>{{ $tag->updated_at }}</td>
        </tr>
    </table>
</div>
@endsection
