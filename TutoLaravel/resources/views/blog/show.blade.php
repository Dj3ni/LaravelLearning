@extends('base')

@section('title', $post->title)

@section('content')

    <article>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}
        </p>
        <a href="{{ route('blog.edit',['post'=>$post])}}">Edit</a>
    </article>

@endsection