@extends('layouts.app')
@section('titre', 'Ajouter Produit')
@section('main')
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="/produits" class="btn btn-light"> <i class="fas fa-arrow-left"></i> retour</a>
        <h6>Ajouter Produits</h6>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="/produits/ajouter">
                @csrf
                <div class="form-group">
                    <label for="txt-libelle">Libelle :</label>
                    <input type="text" class="form-control" name="libelle"
                        placeholder="veuillez saisire la libelle de produit ..." />
                </div>
                <div class="form-group">
                    <label for="txt-prix">Prix :</label>
                    <input type="number" class="form-control" name="prix"
                        placeholder="veuillez saisire le prix de produit ..." />
                </div>

                <button class="btn btn-primary mt-3">
                    ajouter
                </button>
            </form>
        </div>
    </div>
@endsection
