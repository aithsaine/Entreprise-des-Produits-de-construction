<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $months = array("","janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        $month_number = now()->format("n");
        $month = $months[$month_number];
        $count_clients = Client::whereRaw("last_name not like '%EXTERN'")->count();
        $current_commands = Commande::whereRaw('year(date) = year(current_timestamp)')->whereRaw("month(date)=$month_number")->get();
        $chiffre =0;
        foreach ($current_commands as $cmd)
        {
            $chiffre += $cmd->total();
        }
        return view("admin.dashboard",compact("month","count_clients",'current_commands',"chiffre"));
    }
}
