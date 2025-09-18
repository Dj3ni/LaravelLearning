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

    <div>
        @foreach ($estates as $estate)
            <div class="card">
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$estate->title}}</h5>
                    <p>{{$estate->price}} €</p>
                    <hr>
                    <p class="card-text">{{$estate->description}}</p>
                    <a href="{{route('estate.show',['estate'=>$estate])}}">More details</a>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection