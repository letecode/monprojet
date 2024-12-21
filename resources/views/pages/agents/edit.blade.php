@extends('layouts.main')

@section('contenu')
    <div class="container">
        <h1>Modifier un Agent</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agents.update', ['agent' => $agent]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $agent->name }}" placeholder="Entrez votre nom">
                <span class="text-small text-danger">@error('name') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $agent->email }}" placeholder="Entrez votre email">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $agent->phone }}" placeholder="Entrez votre numero">
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $agent->birth_date }}" placeholder="Entrez votre date">
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Departement" name="department_id">
                    <option selected>Choisir un departemnt</option>
                    @foreach ($departments as $dept)
                        <option @if($dept->id == $agent->depatment_id) selected @endif value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </form>
    </div>
@endsection
