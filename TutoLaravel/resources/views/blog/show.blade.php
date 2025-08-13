@extends('base')

@section('title', $post->title)

@section('content')

    <article>
        <h1>{{ $post->title }}</h1>
        <p class="small">{{ $category->name ?? 'No category'}}</p>
        <p>Tags:
            @if (!$post->tags->isEmpty())
                @foreach ($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span> 
                @endforeach
            @else
                No tag
            @endif 
            
        </p>
        <p>{{ $post->content }}
        </p>
        <div>
            <a href="{{ route('blog.edit',['post'=>$post])}}">Edit</a> |
            <a href="{{ route('blog.remove',['post'=>$post])}}">Delete</a> |
            <a href="{{ route('blog.index')}}">Back</a> 

        </div>
    </article>

@endsection