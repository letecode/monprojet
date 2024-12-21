@extends('layouts.main')

@section('contenu')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des Agents</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Ajout Modal
              </button>
            <a href="{{ route('agents.create') }}" class="btn btn-primary">Ajouter un Agent</a>
        </div>

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endsession

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Departement</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($agents as $agent)
                <tr>
                    <th scope="row">{{ $agent->id }}</th>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->department?->name }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Voir</a>
                        <a href="{{ route('agents.edit', ['agent' => $agent]) }}" class="btn btn-warning">Modifier</a>
                        <form id="deleteForm-{{ $agent->id }}" action="{{ route('agents.destroy', ['agent' => $agent]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="document.getElementById('deleteForm-{{ $agent->id }}').submit()" class="btn btn-danger">Supprimer</a>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout d'un agent</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('agents.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Entrez votre nom">
                            <span class="text-small text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Entrez votre email">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telephone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Entrez votre numero">
                        </div>

                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" placeholder="Entrez votre date">
                        </div>

                        <div class="mb-3">
                            <select class="form-select" aria-label="Departement" name="department_id">
                                <option selected>Choisir un departemnt</option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>
                </form>
              </div>
            </div>
        </div>

    </div>
@endsection
