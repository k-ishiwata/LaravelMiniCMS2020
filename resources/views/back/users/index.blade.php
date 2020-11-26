<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\User[] $users
 */
$title = 'ユーザー一覧';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    {{ link_to_route('back.users.create', '新規登録', null, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $users->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ユーザー名</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">権限</th>
                    <th scope="col" style="width: 12em">編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_label }}</td>
                    <td class="d-flex justify-content-center">
                        {{ link_to_route('back.users.edit', '編集', $user, [
                            'class' => 'btn btn-secondary btn-sm m-1'
                        ]) }}
                        {{ Form::model($user, [
                            'route' => ['back.users.destroy', $user],
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
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
