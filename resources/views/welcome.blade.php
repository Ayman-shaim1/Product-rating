@extends('layouts.app')
@section('titre', 'Notations')
@section('main')
    <div class="d-flex justify-content-center my-5">
        <h3>Welcome</h3>
    </div>


    <div class="card mt-2">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm ">
                        <tr>
                            <td><label>Le plus note :</label></td>
                            <td><label class="text-success">{{ $produits[0]->libelle }}</label></td>
                        </tr>
                        <tr>
                            <td><label>Le moins note :</label></td>
                            <td><label class="text-danger">{{ $produits[$produits->count() - 1]->libelle }}</label></td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="table-responsive mt-3">
                <table class="table table-sm">

                    <thead>
                        <tr>
                            <th>produit</th>
                            <th>note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->libelle }}</td>
                                <td>{{ $produit->note }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


@endsection
