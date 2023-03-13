<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function liste()
    {
        // Recupererer la liste des produits :
        $produits = Produit::all();
        // afficher une vue qui contient la liste des produits :
        return view("produits/liste", ["produits" =>  $produits]);
    }

    public function ajouter()
    {
        // afficher une vue qui contient un formulaire :
        return view("produits/ajouter");
    }

    public function details($id)
    {
        // Recuperer un produit par id:
        $produit = Produit::find($id);
        // afficher une vue qui les information d'un produit et un formulaire :
        return view("produits/details", ["produit" => $produit]);
    }


    public function insert(Request $request)
    {
        // creer un produit :
        Produit::create($request->all());
        // afficher la vue qui contient la liste des produits :
        return redirect("produits");
    }

    public function update(Request $request, $id)
    {
        // Recuperer un produit par id:
        $produit = Produit::find($id);

        // Modifier les donnees de produit :
        $produit->libelle = $request->libelle;
        $produit->prix = $request->prix;
        $produit->save();
        // afficher la vue qui contient la liste des produits :
        return redirect("produits");
    }

    public function delete($id)
    {
        // Recuperer un produit par id:
        $produit = Produit::find($id);
        // supprimer le produit :
        $produit->delete();
        // afficher la vue qui contient la liste des produits :
        return redirect("produits");
    }
}
