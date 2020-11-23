<?php
/**
 * @var \App\Models\User $user
 */
$title = 'ユーザー編集';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {!! Form::model($user, [
        'route' => ['back.users.update', $user],
        'method' => 'put'
    ]) !!}
    @include('back.users._form')
    {!! Form::close() !!}
    <table class="table">
        <tr>
            <th>登録日時</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>編集日時</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </table>
</div>
@endsection
