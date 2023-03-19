<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Notation;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotationController extends Controller
{




    public function welcome()
    {

        // Recuperer les produits pour les afficher dans le dropdown :
        $produits = Produit::all();





        $produits = Notation::with("produit")->groupBy('produit_id')
            ->selectRaw('produit_id, avg(note) as note')
            ->orderByDesc('note')
            ->get();

        return view("welcome", [

            "produits" =>  $produits,

        ]);
    }




    public function notation($id)
    {
        // Recuperer le client par id:
        $client = Client::find($id);
        // Recuperer les produits pour les afficher dans le dropdown :
        $produits = Produit::all();


        /*
            ----------------------------------------------------------
                    SELECT libelle, sum(note) as 'note'
                    FROM notations n inner join produits p ON
                    n.produit_id = p.id
                    WHERE idClient = $id
                    GROUP BY libelle
                    ORDER BY note DESC
                    LIMIT 1
            ----------------------------------------------------------
        */

        //  Recuperer le produits le plus notee:
        $produitPlusNote = Notation::with("produit")->where("client_id", $id)->orderByDesc('note')
            ->first();

        //  Recuperer le produits le moins notee:
        $produitMoinsNote = Notation::with("produit")->where("client_id", $id)->orderBy('note')
            ->first();

        // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
        return view("notation/liste", [
            "client" => $client,
            "produits" =>  $produits,
            "produitPlusNote" => $produitPlusNote,
            "produitMoinsNote" => $produitMoinsNote
        ]);
    }

    public function insert(Request $request, $id)
    {

        // Recuperer une notation par id client et par id produit pour voire :
        // est ce que le client a deja note pour ce produit ou non :
        $notation =  Notation::where('produit_id', $request->produit)
            ->where('client_id', $id)
            ->first();

        if ($notation) {
            $notation->note =  $request->note;
            $notation->save();
        } else {
            // creer une ligne dans la table notation :
            $notationToAdd = new Notation();
            $notationToAdd->produit_id =  $request->produit;
            $notationToAdd->note =  $request->note;
            $notationToAdd->client_id =  $id;
            $notationToAdd->save();
        }
        // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
        return redirect("notations/" . $id);
    }

    public function delete($idProduit, $idClient)
    {
        // Recuperer la notation par idClient et par id produit:
        $notation = Notation::where('produit_id', $idProduit)
            ->where('client_id', $idClient)
            ->first();

        // supprimer la ligne :
        $notation->delete();
        // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
        return redirect("notations/" . $idClient);
    }
}
