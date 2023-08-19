<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ["client_id"];
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
        Carbon::setLocale('fr');
        return Carbon::createFromFormat("Y-m-d H:i:s", $this->attributes["created_at"])->format("d/m/Y");
    }
    public function transport()
    {
        return $this->hasOne(Transport::class);
    }
  }
