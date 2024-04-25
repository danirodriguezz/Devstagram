@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('post.show', ['user' => $post->user, 'post' => $post]) }}">
                        <img src="{{ asset('uploads') . "/" . $post->imagen }}" alt="{{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center text-2xl">No hay posts, sigue a alguien para que aparezcan los posts</p>
    @endif

@endsection