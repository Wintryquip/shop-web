<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display order form.
     */
    public function index()
    {
        return view('orderForm');
    }
    /**
     * Submiting order
     */
    public function submit(Request $request)
    {
        $cartData = json_decode($request->input('cartData'), true);
        $paymentMethod = $request->input('paymentMethod');
        $deliveryMethod = $request->input('deliveryMethod');
        $user_id = \Auth::user()->id;
        $order = Order::create([
            'OrderDate' => now(),
            'PaymentMethod' => $paymentMethod,
            'DeliveryMethod' => $deliveryMethod,
            'OrderStatus' => 'Złożone',
            'DeliveryDate' => now()->addDays(3),
            'user_id' => $user_id,
        ]);
        foreach ($cartData as $productData) {
            $product = Product::where('productName', $productData['productName'])->first();

            if ($product) {
                OrderDetail::create([
                    'quantity' => $productData['quantity'],
                    'price' => $productData['discountPrice'],
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                ]);
            }
        }
        return view('orderSuccess', compact('cartData', 'paymentMethod', 'deliveryMethod', 'user_id'));
    }
    /**
     * Listing of all resources that belong to current user.
     */
    public function show()
    {
        $user_id = \Auth::id();
        $orders = Order::where('user_id', $user_id)
            ->with('orderDetails.product')
            ->get();

        //dd($orders->toArray());
        return view('orders', compact('orders'));
    }
}
