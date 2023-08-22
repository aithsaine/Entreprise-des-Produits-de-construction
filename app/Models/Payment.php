<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ["client_id","date","amount"];

    public function check()
    {
        return $this->hasOne(Check::class);
    }
    public function cash()
    {
        return $this->hasOne(Cash::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
