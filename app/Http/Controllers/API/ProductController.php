<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json(['status' => 200, 'data' => compact('products')]);
    }

    public function store(Request $request)
    {
        $insert = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'qty' => $request->qty,
            'status' => $request->status,
        ]);

        if ($insert) {
            $status = 200;
        } else {
            $status = 500;
            $insert = 'Insert data failed';
        }

        return response()->json(['status' => 200, 'data' => compact('insert')]);
    }
}
