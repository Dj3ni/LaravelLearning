@extends('base')

@section('title','Real Estates')

@section('content')

    <button>
        <a href="{{route('estate.new')}}">Add an estate</a>
    </button>

    <div>This section will contain a filter form for the estates by 
        - squareMeters,
        - nbr rooms
        - budget max
        - keyword
    </div>

    <div>This section will list all the estates with a pagination by 50 results</div>
    
@endsection