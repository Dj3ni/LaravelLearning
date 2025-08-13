@extends('base')

@section('content')

    <h1>Delete {{ $post->title }} post?</h1>
    <p>Are you sure you want to delete this post?</p>
    <div>
        <button>
            <a href="{{ route('blog.show', ['slug'=> $post->slug, 'post'=>$post])}}">No, go back to safety</a>
        </button>
        <form action="" method="post">
            @csrf
            <button type="submit">Yes, I know what I'm doing!</button>
        </form>
    </div>
    
@endsection