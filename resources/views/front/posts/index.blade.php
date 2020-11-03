<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator|\App\Models\Post[] $posts
 */
?>
<x-front.layouts.base title="お知らせ一覧">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">お知らせ一覧</div>
                    <div class="card-body">
                        @if($posts->count() <= 0)
                            <p>表示するお知らせはありません。</p>
                        @else
                            <table class="table">
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->published_format }}</td>
                                        <td>{!! link_to_route('front.posts.show', $post->title, $post) !!}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $posts->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front.layouts.base>
