@extends('front.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">お知らせ一覧</div>
                    <div class="card-body">
                        <table class="table">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->created_at->format('Y年m月d日') }}</td>
                                    <td>{!! link_to_route('front.posts.show', $post->title, [$post->id]) !!}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
