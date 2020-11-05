<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン | Laravelチュートリアル</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">ログイン</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ Form::open(['route' => 'login']) }}
                            <div class="form-group">
                                {{ Form::label('name', 'ユーザー名') }}
                                {{ Form::text('name', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', 'パスワード') }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">ログイン</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
