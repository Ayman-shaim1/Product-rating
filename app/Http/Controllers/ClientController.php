<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Notation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function liste()
    {
        // Recupererer la liste des clients :
        $clients = Client::all();
        // afficher une vue qui contient la liste des clients :
        return view("clients/liste", ["clients" =>  $clients]);
    }

    public function ajouter()
    {
        // afficher une vue qui contient un formulaire :
        return view("clients/ajouter");
    }

    public function details($id)
    {
        // Recuperer un client par id:
        $client = Client::find($id);
        // afficher une vue qui les information d'un client et un formulaire :
        return view("clients/details", ["client" => $client]);
    }


    public function insert(Request $request)
    {
        // creer un client :
        Client::create($request->all());
        // afficher la vue qui contient la liste des clients :
        return redirect("clients");
    }

    public function update(Request $request, $id)
    {
        // Recuperer un client par id:
        $client =  Client::find($id);
        // Modifier les donnees de client :
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->save();
        // afficher la vue qui contient la liste des clients :
        return redirect("clients");
    }

    public function delete($id)
    {
        // Recuperer un client par id:
        $client = Client::find($id);
        // supprimer le client :
        $client->delete();
        // afficher la vue qui contient la liste des clients :
        return redirect("clients");
    }
}
