<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class ProductController extends Controller
{
    /**
     * Display information about chosen resource.
     */
    public function show(string $productId)
    {
        $description = "Informacje o produkcie";
        $product = Product::where('id', $productId)->first();

        $product->averageRating = $product->ratings->avg('rating');

        $opinions = OpinionController::show($productId);

        return view('product', [
            'description' => $description,
            'product' => $product,
            'opinions' => $opinions,
        ]);
    }
}

