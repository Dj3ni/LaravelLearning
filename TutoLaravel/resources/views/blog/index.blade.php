@extends('base')

@section('title', 'Home Blog')

@section('content')
    <h1>Mon blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}
                <a href="{{ route('blog.show',['slug'=>$post->slug, 'id' => $post->id])}}">
                    Read More...
                </a>
            </p>
        </article>
    @endforeach


    {{-- Va afficher les liens de pagination ($post est de type Paginator) --}}
    {{ $posts->links() }} 

@endsection