<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public function index()
    {
        $clients = Client::all();
        return view("admin.clients.index",compact("clients"));
    }
    public function create()
    {
        return view("admin.clients.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "cin" => "required|unique:clients,cin"
        ]);
        Client::create([
            "cin" => $request->cin,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "tele" => $request->phone,
            'description' => $request->description
        ]);
        return back()->with("success_msg","le client est ajoute avec success");
    }
    public function situation($client_id)
    {
        $client = Client::find($client_id);
        $commandes = Commande::where("client_id",$client_id)->orderBy("date")->get();
        return view("admin.commandes.situation",compact("commandes","client"));

    }

    public function printSituation($client_id)
    {
        $client = Client::find($client_id);
        $commandes = Commande::where("client_id",$client_id)->get();
        $pdf = Pdf::loadView('admin.commandes.downloadSituation', compact("client", "commandes"));
        return $pdf->download("$client->first_name $client->last_name.pdf");

    }
}
