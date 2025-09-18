@extends('base')

@section('title', 'Delete Estate')

@section('content')
    <h2>Removing {{$estate->title}}</h2>
    <p>Are your sure you want to remove this estate?</p>

    <button class="btn button-green">
        <a href="{{route('estate.show', ['estate'=>$estate])}}">No, go back to safe space</a>
    </button>

    <form action="" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Yes, get it out of my sight!</button>
    </form>
    
@endsection