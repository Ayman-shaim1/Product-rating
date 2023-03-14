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


        /*
            ----------------------------------------------------------
                    SELECT libelle, sum(note) as 'note'
                    FROM notations n inner join produits p ON
                    n.produit_id = p.id
                    GROUP BY libelle
                    ORDER BY note DESC

            ----------------------------------------------------------
        */

        //  Recuperer le produits le plus notee:
        $produits = Notation::join('produits', 'notations.produit_id', '=', 'produits.id')
            ->select('libelle', DB::raw('SUM(note) AS note'))
            ->groupBy('libelle')
            ->orderBy('note', "desc")
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
                    GROUP BY libelle
                    ORDER BY note DESC
                    LIMIT 1
            ----------------------------------------------------------
        */

        //  Recuperer le produits le plus notee:
        $produitPlusNote = Notation::join('produits', 'notations.produit_id', '=', 'produits.id')
            ->select('libelle', DB::raw('SUM(note) AS note'))
            ->groupBy('libelle')
            ->orderBy('note', "desc")
            ->limit(1)
            ->get();



        //  Recuperer le produits le moins notee:
        $produitMoinsNote = Notation::join('produits', 'notations.produit_id', '=', 'produits.id')
            ->select('libelle', DB::raw('SUM(note) AS note'))
            ->groupBy('libelle')
            ->orderBy('note', "asc")
            ->limit(1)
            ->get();

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
        $errors = [];
        // Recuperer une notation par id client et par id produit pour voire :
        // est ce que le client a deja note pour ce produit ou non :
        $notation =  Notation::where('produit_id', $request->produit)
            ->where('client_id', $id)
            ->first();

        if ($notation) {
            $errors[] = "vous avez deja notee ce produit !";
            // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
            return redirect("notations/" . $id)->with("errors", $errors);
        } else {
            // creer une ligne dans la table notation :
            $notation = new Notation();
            $notation->produit_id =  $request->produit;
            $notation->note =  $request->note;
            $notation->client_id =  $id;
            $notation->save();
            // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
            return redirect("notations/" . $id);
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
