@extends('layouts.app')
@section('titre', 'Details Clients')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="/clients" class="btn btn-light"><i class="fas fa-arrow-left"></i> retour</a>
        <h6>Details Client</h6>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="/clients/modifier/{{ $client->id }}">
                @csrf
                <div class="form-group mt-1">
                    <label for="txt-id">Id :</label>
                    <input value="{{ $client->id }}" type="text" class="form-control" disabled />
                </div>
                <div class="form-group mt-1">
                    <label for="txt-libelle">Prenom :</label>
                    <input value="{{ $client->prenom }}" type="text" class="form-control" name="prenom"
                        placeholder="veuillez saisire votre prenom  ..." />
                </div>
                <div class="form-group mt-1">
                    <label for="txt-libelle">Nom :</label>
                    <input value="{{ $client->nom }}" type="text" class="form-control" name="nom"
                        placeholder="veuillez saisire votre nom  ..." />
                </div>

                <button class="btn btn-primary mt-3">
                    modifier
                </button>
            </form>
        </div>
    </div>

@endsection
