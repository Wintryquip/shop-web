<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $description = "Oferowane produkty";
        $products = Product::with('ratings')->get();
        foreach($products as $product)
        {
            if($product->ratings->isNotEmpty())
            {
                $product->averageRating = $product->ratings->avg('rating');
            }
            else
            {
                $product->averageRating = 0;
            }
        }
        return view('products',[
            'description'=>$description,
            'products'=>$products]);
    }
    /**
     * Display a listing of the latest resources.
     */
    public function showNewArrivals()
    {
        $description = "Nowości";
        $products = Product::where('ReleaseDate', '>', '2024-01-01')->get();

        foreach ($products as $product) {
            if ($product->ratings->isNotEmpty()) {
                $product->averageRating = $product->ratings->avg('rating');
            } else {
                $product->averageRating = 0;
            }
        }

        return view('products', [
            'description' => $description,
            'products' => $products
        ]);
    }
    /**
     * Display a listing of the popular resources.
     */
    public function showPopular()
    {
        $description = "Popularne";
        $products = Product::has('ratings', '>', 3)->get();

        // Dodanie średniej oceny do każdego produktu
        foreach ($products as $product) {
            if ($product->ratings->isNotEmpty()) {
                $product->averageRating = $product->ratings->avg('rating');
            } else {
                $product->averageRating = 0;
            }
        }

        return view('products', [
            'description' => $description,
            'products' => $products
        ]);
    }
    /**
     * Display for searched listing of the resource.
     */
    public function search(Request $request)
    {
        $name = $request->input('productName');

        if (empty($name)) {
            $description = "Oferowane produkty";
            $products = Product::with('ratings')->get();
        } else {
            $description = "Szukane produkty";
            $products = Product::where('ProductName', 'like', '%' . $name . '%')->get();
        }

        // Dodanie średniej oceny do każdego produktu
        foreach ($products as $product) {
            if ($product->ratings->isNotEmpty()) {
                $product->averageRating = $product->ratings->avg('rating');
            } else {
                $product->averageRating = 0;
            }
        }

        return view('products', [
            'description' => $description,
            'products' => $products
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
