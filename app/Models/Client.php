<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["cin", "first_name", "last_name", "tele", 'description'];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
    public function purchases()
    {
        $total = 0;
        foreach ($this->commandes as $commande) {
            foreach ($commande->items as $item) {
                $total += $item->quantity * $item->price;
            }
            if( $commande->transport)
            $total += $commande->transport->amount;
        }
        return $total;
    }

    public function avancements()
    {
        $total = 0;
        $payments = Payment::where("client_id",$this->attributes["id"])->get();
        foreach($payments as $payment){
            $total+=$payment->amount;

        }
        return $total;
    }
    
}
