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

    
@endsection