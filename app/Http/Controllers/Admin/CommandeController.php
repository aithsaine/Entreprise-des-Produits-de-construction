<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Item;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function index()
    {
        $commandes = Commande::all();
        $totals = [];
        foreach($commandes as $cmd)
        {
            $totals[$cmd->id]=(array_reduce(array_map(fn($elem)=>$elem['quantity']*$elem['price'],$cmd->items->toArray()),fn($prev,$next)=>$prev+$next));

        }
        return view("admin.commandes.index",compact("commandes","totals"));
    }
    public function create($client)
    {
        $client = Client::find($client);
        $products = Product::all(); 
        Carbon::setLocale('fr');
        $today = Carbon::today()->translatedFormat('l jS F Y');
        return view("admin.commandes.create", compact("client", "products", "today"));
    }
    public function commander(Request $request, $client)
    {
        $qts = [];
        $pus = [];
        foreach ($request->input() as $key => $value) {
            if (preg_match("/^qte_/", $key) && $value != null)
                $qts[preg_replace("/\D/", '', $key)] = $value;
        }
        foreach ($request->input() as $key => $value) {
            if (preg_match("/^pu_/", $key) && $value != null)
                $pus[preg_replace("/\D/", '', $key)] = $value;
        }

            if (count($qts) >= 1) {
                $commande = new Commande();
                $commande->client_id = $client;
                $commande->save();
                foreach ($qts as $key => $value) {
                    try{

                    Item::create([
                    "product_id" => $key,
                    "price" => $pus[$key],
                    "quantity" => $value,
                    "commande_id" => $commande->id
                ]);
                $pr = Product::find($key);
                $pr->stock = $pr->stock - $value;
                $pr->save();
            }catch(Exception $er){}
      
            }
        }
        return back()->with("success_msg","la commande est crier avec success");
    
    }
}
