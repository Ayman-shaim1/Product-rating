@extends('layouts.app')
@section('titre', 'Ajouter Clientc')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="/clients" class="btn btn-light"><i class="fas fa-arrow-left"></i> retour</a>
        <h6>Ajouter Client</h6>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="/clients/ajouter">
                @csrf
                <div class="form-group mt-1">
                    <label for="txt-libelle">Prenom :</label>
                    <input type="text" class="form-control" name="prenom"
                        placeholder="veuillez saisire votre prenom  ..." />
                </div>
                <div class="form-group mt-1">
                    <label for="txt-libelle">Nom :</label>
                    <input type="text" class="form-control" name="nom"
                        placeholder="veuillez saisire votre nom  ..." />
                </div>

                <button class="btn btn-primary mt-3">
                    ajouter
                </button>
            </form>
        </div>
    </div>

@endsection
