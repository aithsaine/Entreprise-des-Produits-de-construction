<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6)->format("Y-m-d");
        $earningsByMonth = DB::table("commandes")->leftJoin("transports","commandes.id","transports.commande_id")->leftJoin("items","commandes.id","=","items.commande_id")->where("commandes.date",">=",$sixMonthsAgo)->select( DB::raw("year(commandes.date) as year"), DB::raw("month(commandes.date) as month"),DB::raw("sum(items.price*items.quantity) as amount"),DB::raw("sum(transports.amount) as trans"))->groupBy("year")->groupBy("month")->orderByRaw("year(commandes.date)")->orderByRaw("month(commandes.date)")->get();
            
        $values = [];
        foreach ($earningsByMonth as $earning) {
            Carbon::setLocale("fr");
            $monthLabel = Carbon::createFromDate($earning->year, $earning->month)->format('F Y');
            $values[$monthLabel] = $earning->amount ;
        }


        $months = array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        
        $month_number = now()->format("n");
        $month = $months[$month_number];
        $count_clients = Client::whereRaw("last_name not like '%EXTERN'")->count();
        $current_commands = Commande::whereRaw('year(date) = year(current_timestamp)')->whereRaw("month(date)=$month_number")->get();
        $chiffre = 0;
        foreach ($current_commands as $cmd) {
            $chiffre += $cmd->total();
        }
        return view("admin.dashboard", compact("month", "count_clients", 'current_commands', "chiffre", "values"));
    }
}
