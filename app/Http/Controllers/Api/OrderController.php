<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('products')->get();
        return response()->json([
            'status' => 200,
            'orders' => $orders
        ]);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'product_id.*' => 'required',
            'quantity.*'   => 'required',
            'price'        => 'required',
            'sub_total'    => 'required',
            'total'        => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => 404,
                'message'   => 'Send validate data please'
            ]);
        }

        $order = Order::create([
            'user_id'   => Auth::user()->id,
            'date'      => date('Y-m-d'),
            'total'     => $request->total
        ]);

        $products = [];
        foreach ($request->product_id as $key => $id) {
            $products []=[
                'order_id'  => $order->id,
                'product_id'=> $request['product_id'][$key],
                'quantity'  => $request['quantity'][$key],
                'price'     => $request['price'][$key],
                'sub_total' => $request['sub_total'][$key],
            ];
        }

        $order->products()->attach($products);

        return response()->json([
            'statu'     => 200,
            'message'   => 'Order Create Successfully',
            'order'     => $order,
        ]);

    }
}
