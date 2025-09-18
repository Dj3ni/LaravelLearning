@extends('base')

@section('title','Update Estate')

@section('content')
    
    <div>There will be a form to edit the data for the estate
        <ul>
            <li>Edit datas</li>
            <li>Toggle button to say if sold or available</li>
            <li>Add or remove pictures</li>
            <li>Multiple select options services (display like tags)</li>
        </ul>
    </div>
    <h2>Update your estate {{$estate->title}}</h2>
    @include('estate.form')

@endsection