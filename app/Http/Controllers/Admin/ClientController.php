<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

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
}
