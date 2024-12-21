@extends('layouts.main')

@section('contenu')
    <h1>Bienvenu sur monsite</h1>

    <a href="{{ route('contact', ['name' => 'Aliance', 'prenom' => 'Paul']) }}">Aller sur la page contact</a>
    <br>
    <a href="{{ route('projet', ['projet' => 'projet1']) }}">Aller sur la page projet</a>
@endsection
