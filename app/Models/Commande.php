<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ["client_id","date"];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function dateCommande()
    {
        return $this->attributes["date"];
    }
    public function transport()
    {
        return $this->hasOne(Transport::class);
    }
  }
