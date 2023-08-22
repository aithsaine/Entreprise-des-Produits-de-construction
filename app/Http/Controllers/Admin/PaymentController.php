<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Check;
use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $clients = Client::all();
        return view("admin.payments.index",compact("clients","payments"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "client"=>"required",
            "amount"=>"required|gt:0",
            "date"=>'required|date',
            "type"=>"required",
        ]);
        $payment = new Payment();
        $payment->date = $request->date;
        $payment->client_id = $request->client;
        $payment->amount = $request->amount;
        $payment->save();
        if($request->type=="check")
        {
            $request->validate([
                "check_number"=>'required'
            ]);
            Check::create([
                "payment_id"=>$payment->id,
                "number"=>$request->check_number
            ]);
            return back()->with("success_msg","le verment cheque est enregistrer");
        }
        Cash::create([
            "payment_id"=>$payment->id,
        ]);
        return back()->with("success_msg","le verment espece est enregistrer");
    }
}
