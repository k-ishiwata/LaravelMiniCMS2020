<?php
/**
 * @var \App\Models\Tag $tag
 */
$title = 'タグ作成';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {{ Form::open(['route' => 'back.tags.store']) }}
    @include('back.tags._form')
    {{ Form::close() }}
</div>
@endsection
