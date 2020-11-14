@php
$flashStatus = [
    'success' => 'success',
    'error' => 'danger',
];
@endphp
@foreach($flashStatus as $key => $value)
    @if (Session::has($key))
        <div class="alert alert-{{ $value }}">
            {{ session($key) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach
