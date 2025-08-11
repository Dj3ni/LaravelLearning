@extends('base')

@section('title', 'Edit Article')

@section('content')
    <form action="" method="post">
        @csrf
        <div class='form-group'>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="Title"  
                value="{{ old('title', $post->title) }}"
                class='form-control'
                >
            @error('title')
                {{ $message }}
            @enderror

        </div>
        <div class="form-group">
            <textarea 
                name="content" 
                id="content" 
                placeholder="Content"
                class="form-control"
                >{{ old('content', $post->content) }}</textarea>
            @error('content')
                {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            @if($post->id) 
                Modify
            @else
                Create
            @endif
        </button>
    </form> 
@endsection