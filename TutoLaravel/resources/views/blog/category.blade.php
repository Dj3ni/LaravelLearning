@extends('base')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <p>
            <a 
                href="{{route('blog.show', ['slug'=>$post->slug, 'post'=>$post])}}"
                >
                {{$post->title}}
            </a>
        </p>
    @endforeach
@endsection