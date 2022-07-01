<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function rentals(){

        return $this->hasMany(Rental::class);
    }

    public function CustomerAddresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function branch()
    {
        return $this->hasOne(Branch::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    
}
