<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ["client_id","date"];

    public function check()
    {
        return $this->hasOne(Check::class);
    }
    public function cash()
    {
        return $this->hasOne(Cash::class);
    }
}
