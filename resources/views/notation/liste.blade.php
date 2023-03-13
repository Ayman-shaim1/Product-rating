@extends('layouts.app')
@section('titre', 'Notations')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="/clients" class="btn btn-light"><i class="fas fa-arrow-left"></i> retour</a>
        <h6>Notations</h6>
    </div>

    <div class="row mt-3">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Ajouter une notation</h5>
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
            <div class="card">
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
                                            <button class="btn-sm btn btn-danger">
                                                supprimer
                                            </button>
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
