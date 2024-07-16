<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();

        $data = [
            'status'=>200,
            'product'=>$product
        ];

        return response()->json($data,200);
    }
}
