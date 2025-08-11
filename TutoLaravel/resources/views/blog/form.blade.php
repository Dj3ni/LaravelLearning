
@section('title', 'Edit Article')

@section('content')
    <form action="" method="post">
        @csrf
        <div class='form-group'>
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $post->title) }}"
                class='form-control'
                >
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class='form-group'>
            <label for="slug">Slug</label>
            <input 
                type="text" 
                name="slug" 
                id="slug" 
                value="{{ old('slug', $post->slug) }}"
                class='form-control'
                >
            @error('slug')
                {{ $message }}
            @enderror
        </div>

        <div class= "form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                
                <option value="">Select a category</option>

                @foreach ($categories as $category)
                    <option
                        @selected(old('category_id', $post->category_id) == $category->id)
                        value="{{ $category->id}}"
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                {{ $message }}
            @enderror
        </div>
        
        <div class= "form-group">
            @php
                // garder les tags cochés : old() sinon les ids actuels du post
                $oldTags = old('tags', $post->exists ? $post->tags->pluck('id')->toArray() : []);
            @endphp
            <label class="d-block">Select your tags </label>
            @foreach ($tags as $tag)
                    <input 
                        type="checkbox" 
                        name="tags[]" 
                        id="tag-{{ $tag->id }}"
                        value="{{ $tag->id }}"
                        @checked(in_array($tag->id, $oldTags))
                        />
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        
            @endforeach
            @error('tags')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
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