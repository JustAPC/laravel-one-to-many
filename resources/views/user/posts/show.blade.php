@extends('layouts.app')

@section('scripts')
    <script defer src="{{ asset('js/deleteForm.js') }}"></script>
@endsection

@section('content')
    @if (session('message-edit'))
        <div class="alert alert-success fs-5">
            <span class="text-uppercase text-primary">{{ session('message-edit') }}</span>
            <span>è stato modificato con successo</span>
        </div>
    @endif

    <div class="col-6 mx-auto pt-5">
        <div class="media align-middle">
            <img src="{{ $post->image }}" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">{{ $post->title }}</h5>
                <p>{{ $post->content }}</p>
            </div>

            <div class="media-body col-1">
                @if ($post->Category)
                    <span class="badge badge-pill badge-{{ $post->Category->color }}"
                        style="font-size: 1rem">{{ $post->Category->label }}</span>
                @else
                    -
                @endif
            </div>

        </div>
        <div class="pt-5 px-5">
            <a href="{{ route('user.posts.edit', $post->id) }}" class="fs-3 btn btn-warning mx-2">Edit</a>
            <form action="{{ route('user.posts.destroy', $post->id) }}" method="POST" class="d-inline delete-form"
                data-name="{{ $post->title }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger fs-3">
            </form>
        </div>
    </div>
@endsection
