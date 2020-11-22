<?php
/**
 * @var \App\Models\Tag $tag
 */
?>
<div class="form-group row">
    {{ Form::label('name', 'タグ名', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name', null, [
            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('slug', 'スラッグ', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('slug', null, [
            'class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.tags.index', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>
