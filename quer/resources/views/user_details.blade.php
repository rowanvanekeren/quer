@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div>
            // user en review variabelen aanwezig
    <ul>
        <li>
            <p>{{$user->first_name}}</p>
        </li>
        <li>
            <p>{{$user->last_name}}</p>
        </li>
        <li>
            <p>{{$user->first_name}}</p>
        </li>
        <li>
            <p>{{$user->first_name}}</p>
        </li>

    </ul>

</div>
@endsection