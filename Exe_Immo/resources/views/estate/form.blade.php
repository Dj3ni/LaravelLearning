@section('content')  
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title (min 8)</label>
            <input 
                type="text" 
                name="title" 
                id="title"
                value="{{old('title',$estate->title)}}"
                class="form-control"
                >
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="square_meters">Square Meters</label>
            <input 
                type="number" 
                name="square_meters" 
                id="square_meters" 
                min="1"
                step='0.50'
                value="{{ old('square_meters', $estate->square_meters) }}"
                class="form-control"
                >
            @error('square_meters')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                min="1"
                step='0.01'
                value="{{ old('price', $estate->price)}}"
                class="form-control"
                >
            @error('price')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea 
                name="description" 
                id="description"
                class="form-control"
                >
                {{old('description', $estate->description)}}
            </textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input 
                type="address" 
                name="localisation" 
                id="localisation"
                value="{{ old('localisation',$estate->localisation)}}"
                class="form-control"

                >
            @error('localisation')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group"> 
            <label for="sold">Sold</label>
            <input 
                type="checkbox" 
                name="sold" 
                id="sold"
                value={{old('sold', $estate->sold)}}
                >
        </div>
        <button type="submit">
            @if ($estate->id)
                Update
            @else
                Create
            @endif
        </button>

    </form>
@endsection