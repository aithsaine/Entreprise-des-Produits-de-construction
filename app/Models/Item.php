<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ["product_id","price","quantity","commande_id"];
    public function commande() 
    {
        return $this->belongsTo(Commande::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
