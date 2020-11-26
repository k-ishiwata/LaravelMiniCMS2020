<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' | ' : '' }}管理画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('back.dashboard') }}">
                管理画面
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item{{ Request::is('admin') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('back.dashboard') }}">ダッシュボード</a>
                    </li>
                    <li class="nav-item{{ Request::is('admin/posts', 'admin/posts/*') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('back.posts.index') }}">投稿</a>
                    </li>
                    <li class="nav-item{{ Request::is('admin/tags', 'admin/tags/*') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('back.tags.index') }}">タグ</a>
                    </li>
                    @can('admin')
                    <li class="nav-item{{ Request::is('admin/users', 'admin/users/*') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('back.users.index') }}">ユーザー</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="#" class="nav-link" onClick="(function(){
                            document.getElementById('logout-form').submit();
                            return false;
                        })();">ログアウト</a>
                        {{ Form::open(['route' => 'logout', 'id' => 'logout-form']) }}
                        {{ Form::close() }}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.home') }}" target="_blank">サイトを表示</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <x-back.alert />
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
