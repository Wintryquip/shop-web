<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;
use App\Models\Opinion;

class Product extends Model
{
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
