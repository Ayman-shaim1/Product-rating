@extends('layouts.app')
@section('titre', 'Liste de produits')
@section('main')
    <div class="d-flex justify-content-end mt-5">
        <h6>liste de produits</h3>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>libelle</th>
                            <th>prix</th>
                            <th colspan="3">action</th>
                        </tr>
                    </thead>

                    <body>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td>{{ $produit->libelle }}</td>
                                <td>${{ $produit->prix }}</td>
                                <td colspan="3">
                                    <a href="/produits/{{ $produit->id }}" class="btn btn-sm btn-warning">
                                        modifier
                                    </a>
                                    <a href="/produits/supprimer/{{ $produit->id }}" class="btn btn-sm btn-danger">
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
@endsection
