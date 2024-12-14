@extends('layouts.app')

@section('contenu')
    <h1>Bienvenu sur monsite</h1>

    <ul>
        @foreach ($agents as $agent)
            <li>
                <p>{{ $agent->name }}</p>
                <span>{{ $agent->department->name }}</span>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('contact', ['name' => 'Aliance', 'prenom' => 'Paul']) }}">Aller sur la page contact</a>
    <br>
    <a href="{{ route('projet', ['projet' => 'projet1']) }}">Aller sur la page projet</a>
@endsection
