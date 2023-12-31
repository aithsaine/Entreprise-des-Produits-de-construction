<?php

namespace App\Http\Controllers\Admin;

use App;
use Exception;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Client;
use App\Models\Product;

use App\Models\Commande;
use App\Models\Transport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(Request $request)
    {
        
        $client_id = $request->client ?? -1;
        $commandes = Commande::orderBy("client_id")->orderBy("date")->get();
        if ($request->has("client")) {
            $commandes = Commande::where("client_id", $client_id)->get();
            if ($request->client == -1) {
                $commandes = Commande::all();
            }
        }


        $clients = Client::all();
        $totals = [];
        foreach ($commandes as $cmd) {
            $totals[$cmd->id] = (array_reduce(array_map(fn ($elem) => $elem['quantity'] * $elem['price'], $cmd->items->toArray()), fn ($prev, $next) => $prev + $next));
        }
        return view("admin.commandes.index", compact("commandes", "totals", "clients", "client_id"));
    }
    public function create($client)
    {
        $client = Client::find($client);
        $products = Product::orderBy("designation")->get();
        $today = Carbon::today()->format('Y-m-d');
        return view("admin.commandes.create", compact("client", "products", "today"));
    }
    public function commander(Request $request, $client)
    {
        $request->validate([
            "date" => "required|date",
            "bon"=>"required|regex:/\d/",
        ]);
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
            $commande->date = $request->date;
            $commande->bon_number=$request->bon;
            $commande->save();
            if ($request->transport > 0) {
                Transport::create([
                    "amount" => $request->transport,
                    "commande_id" => $commande->id
                ]);
            }
            foreach ($qts as $key => $value) {
                try {

                    Item::create([
                        "product_id" => $key,
                        "price" => $pus[$key],
                        "quantity" => $value,
                        "commande_id" => $commande->id
                    ]);
                    $pr = Product::find($key);
                    $pr->stock = $pr->stock - $value;
                    $pr->save();
                } catch (Exception $er) {
                }
            }
            return back()->with("success_msg", "la commande est crier avec success");
        }
        return back()->with("error_msg", "tu doit choisie au minimum un produit");
    }

    public function edit($id)
    {
        $commande = Commande::find($id);
        $getValue = function($product,$cmd_id){
        $commande = Commande::find($cmd_id);
            $val = null;
            foreach($commande->items as $item)
            {
                if ($item->product_id==$product)
                {
                    $val = $item->price;
                    break;
                }
            }
            return $val;
        };
        $getQuantity = function($product,$cmd_id){
        $commande = Commande::find($cmd_id);
        $val = null;
        foreach($commande->items as $item)
        {
            if ($item->product_id==$product)
            {
                $val = $item->quantity;
                break;
            }
        }
        return $val;


        };
        $products  = Product::all();
        return view("admin.commandes.edit",compact("commande","products","getValue","getQuantity"));
    }


    public function update($id,Request $request)
    {
        $request->validate([
            "date" => "required|date",
            "bon"=>"required|regex:/\d/",
        ]);
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
            $commande = Commande::find($id);
            $commande->date = $request->date;
            $commande->bon_number=$request->bon;
            $commande->save();
            if ($request->transport > 0) {
                if($commande->transport){

                    $trs = Transport::where("commande_id",$commande->id)->first();
                    $trs->amount = $request->transport;
                    $trs->save();
                }
                Transport::create([
                    "commande_id"=>$commande->id,
                    "amount"=>$request->transport
                ]);
            }
            else{
                Transport::where("commande_id",$commande->id)->delete();

            }
            Item::where("commande_id",$commande->id)->delete();
            foreach ($qts as $key => $value) {
                try {

                    Item::create([
                        "product_id" => $key,
                        "price" => $pus[$key],
                        "quantity" => $value,
                        "commande_id" => $commande->id
                    ]);
                    $pr = Product::find($key);
                    $pr->stock = $pr->stock - $value;
                    $pr->save();
                } catch (Exception $er) {
                }
            }
            return redirect()->route("admin.commande.index")->with("success_msg", "la commande N° $id est ajour avec success");
        }
        return back()->with("error_msg", "tu doit choisie au minimum un produit");

    }







    public function print($commande)
    {
        $cmd = Commande::find($commande);
        $total = array_reduce(array_map(fn ($elem) => $elem['quantity'] * $elem['price'], $cmd->items->toArray()), fn ($prev, $next) => $prev + $next);
        $pdf = Pdf::loadView('admin.commandes.commande', compact("cmd", "total"));
        return $pdf->stream("RABSAL COMMANDE N° {$commande}.pdf");
    }



  
}
