@extends('base')

@section('title','Users')

@section('content')
    <h1>Users</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('user.show', ["user"=>$user])}}">{{ $user->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection