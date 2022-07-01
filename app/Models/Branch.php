<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
