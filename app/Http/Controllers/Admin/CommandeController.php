<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function create($client)
    {
        $client = Client::find($client);
        $products = Product::all();
        Carbon::setLocale('fr');
        $today = Carbon::today()->translatedFormat('l jS F Y');
        return view("admin.commandes.create",compact("client","products","today"));

    }
}
