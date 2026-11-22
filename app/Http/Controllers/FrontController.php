<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function shop()
    {
        $items = Item::orderBy('id', 'DESC')->paginate(8);

        return view('front.shops', compact('items'));
    }

    public function shopItem($id)
    {
        $item = Item::findOrFail($id);

        return view('front.shop-item', compact('item'));
    }

    public function carts()
    {
        $payments = Payment::all();

        return view('front.carts', compact('payments'));
    }
    

    public function orderNow(Request $request)
    {
        // Check received cart data
        $data = json_decode($request->data, true);

        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty!'
            ], 422);
        }

        // Debug received data temporarily
        return response()->json([
            'success' => true,
            'message' => 'Order data received successfully!',
            'data' => $data
        ]);
    }
}