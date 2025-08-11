@extends('base')

@section('title', 'Home Blog')

@section('content')
    <h1>Mon blog</h1>

    <div>Categories: 
        @foreach($categories as $category)
            <a href="{{ route('blog.category',['category'=>$category])}}" class="small">{{ $category->name }}</a>
        @endforeach
    </div>
    <div>
        @foreach ($posts as $post)
            <article>
                <h3>{{ $post->title }}</h3>
                <p class="small">Category: {{$post->category?->name}}</p>
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
                    <a href="{{ route('blog.show',['slug'=>$post->slug, 'post' => $post])}}">
                        Read More...
                    </a>
                </p>
            </article>
        @endforeach
    </div>


    {{-- Va afficher les liens de pagination ($post est de type Paginator) --}}
    {{ $posts->links() }} 

@endsection