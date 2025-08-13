@extends('base')

@section('title', 'Details')

@section('content')
    <h1>{{ $user->name }}</h1>

    <div>
        <a href="{{ route('user.index')}}">Back</a> |
        {{-- <a href="{{ route('user.index')}}">Edit</a> |
        <a href="{{ route('user.index')}}">Delete</a> | --}}
    </div>
@endsection