<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Rating extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
