<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ["cin","first_name","last_name","tele",'description'];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
