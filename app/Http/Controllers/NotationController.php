<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class NotationController extends Controller
{
    public function notation($id)
    {

        // Recuperer le client :
        $client = Client::find($id);
        // Recuperer les notation :
        $notations = $client->notations;
        // afficher la vue qui contient la liste des notations et le formulaire d'ajoute  :
        return view("notation/liste", ["client" => $client ]);
    }
}
