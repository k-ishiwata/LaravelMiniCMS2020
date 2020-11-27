<?php
/**
 * @var \App\Models\Post $post
 */
?>
<div class="form-group row">
    {{ Form::label('title', 'タイトル', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('title', null, [
            'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('body', '内容', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::textarea('body', null, [
            'class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''),
            'rows' => 5
        ]) }}
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('tags', 'タグ', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <div class="{{ $errors->has('tags.*') ? 'is-invalid' : '' }}">
            @foreach ($tags as $key => $tag)
                <div class="form-check form-check-inline">
                    {!! Form::checkbox( 'tags[]', $key, null, ['class' => 'form-check-input', 'id' => 'tag'.$key]) !!}
                    <label class="form-check-label" for="tag{{$key}}">{{ $tag }}</label>
                </div>
            @endforeach
        </div>
        @error('tags.*')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('is_public', '状態', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        @foreach(config('common.public_status') as $key => $value)
            <div class="form-check form-check-inline">
                {{ Form::radio('is_public', $key, null, [
                    'id' => 'is_public'.$key,
                    'class' => 'form-check-input' . ($errors->has('is_public') ? ' is-invalid' : '')
                ]) }}
                {{ Form::label('is_public'.$key, $value, ['class' => 'form-check-label']) }}
                @if($key === 0)
                    @error('is_public')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @endif
            </div>
        @endforeach
    </div>
</div>

<div class="form-group row">
    {{ Form::label('published_at', '公開日', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::datetime('published_at',
           isset($post->published_at)
                ? $post->published_at->format('Y-m-d H:i')
                : now()->format('Y-m-d H:i'),
           ['class' => 'form-control' . ($errors->has('published_at') ? ' is-invalid' : '')]
        ) }}
        @error('published_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.posts.index', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>
