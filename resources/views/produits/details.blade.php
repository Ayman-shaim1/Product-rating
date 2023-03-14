@extends('layouts.app')
@section('titre', 'Details Produits')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="/produits" class="btn btn-light"><i class="fas fa-arrow-left"></i> retour</a>
        <h6>Details Produit</h6>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="/produits/modifier/{{ $produit ? $produit->id : null }}">
                @csrf
                <div class="form-group mt-1">
                    <label for="txt-libelle">Id :</label>
                    <input value="{{ $produit ? $produit->id : null  }}" type="text" class="form-control" disabled />
                </div>
                <div class="form-group mt-1">
                    <label for="txt-libelle">Libelle :</label>
                    <input value="{{ $produit ? $produit->libelle : null }}" type="text" class="form-control" name="libelle"
                        placeholder="veuillez saisire la libelle de produit ..." />
                </div>
                <div class="form-group mt-1">
                    <label for="txt-prix">Prix :</label>
                    <input value="{{  $produit ? $produit->prix : null}}" type="number" class="form-control" name="prix"
                        placeholder="veuillez saisire le prix de produit ..." />
                </div>

                <button class="btn btn-primary mt-3">
                    modifier
                </button>
            </form>
        </div>
    </div>

@endsection
