@extends('base')

@section('title', 'Dynamic Estate title')

@section('content')

    <div>
        This page will show the details for the estates 
    </div>

    <ul>
        <li>On the left: Pictures (carroussel)</li>
        <li>On the rigth: Title, nbr rooms, square meters + Price + contact form</li>
        <li>Under these a little description and 2 tables: 
            <ul>
                <li>Caracteritics</li>
                <li>Services (lift, parking spot,...)</li>
            </ul>
        </li>

    </ul>

    <h2>{{$estate->title}}</h2>
    <div>
        <a href="{{route('estate.edit', ['estate'=>$estate])}}">Edit</a> |
        <a href="{{route('estate.delete',['estate'=>$estate])}}">Delete</a> |
        <a href="{{route('estate.index')}}">Back to Estates list</a>

    </div>
    <p>{{$estate->price}}</p>
    <p>{{$estate->localisation}}</p>
    <p>{{$estate->description}}</p>


    
@endsection