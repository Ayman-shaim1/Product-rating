@extends('layouts.app')
@section('titre', 'Notations')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5 mb-2">
        <a href="/clients" class="btn btn-light"><i class="fas fa-arrow-left"></i> retour</a>
        <h6>Notations</h6>
    </div>


    @foreach ($errors as $error)
        <div class="alert alert-danger">
            <span class="d-flex align-items-center">
                <i class="fas fa-times d-block"></i> &nbsp; <span class="d-block">{{ $error }}</span>
            </span>
        </div>
    @endforeach

    <div class="row mt-3">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12  h-100">
            <div class="card my-2">
                <div class="card-header">
                    <h5 class="mt-2">Ajouter une notation</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><label>Le plus note :</label></td>
                            <td><label class="text-success">{{ $produitPlusNote[0]->libelle }}</label></td>
                        </tr>
                        <tr>
                            <td><label>Le moins note :</label></td>
                            <td><label class="text-danger">{{ $produitMoinsNote[0]->libelle }}</label></td>
                        </tr>
                    </table>

                    <form action="/notations/ajouter/{{ $client->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="drp-produit">Produit : </label>
                            <select class="form-control" name="produit" id="drp-produit">
                                <option value="">---- choisire un produit ----</option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->libelle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="drp-valeur">Valeur :</label>
                            <select class="form-control" name="note" id="drp-valeur">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-2">
                            ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 h-100">
            <div class="card my-2 h-100">
                <div class="card-header">
                    <h5 class="mt-2"> Notation de {{ $client->prenom }} {{ $client->nom }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>produit</th>
                                    <th>valeur</th>
                                    <th>actions</th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($client->notations as $notation)
                                    <tr>
                                        <td>{{ $notation->produit->libelle }}</td>
                                        <td>{{ $notation->note }}</td>
                                        <td>
                                            <a href="/notations/supprimer/produit/{{ $notation->produit_id }}/client/{{ $client->id }}"
                                                class="btn-sm btn btn-danger">
                                                supprimer
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
