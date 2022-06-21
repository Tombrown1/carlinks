<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vin',
        'odometer',
        'available_indicator',
        'make',
        'model',
        'year',
        'owner_id',
        'condition_desc',
    ];

    public function owners(){

        return belongsTo(Owner::class);
    }

    public function rental()
    {
        return $this->hasMany(Rental::class, 'vehicle_id');
    }
}
