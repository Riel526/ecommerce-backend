<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use validator;

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

    public function addProduct(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ]);

        if($validator->fails()){

            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            
            return response()->json($data,422);
        } else {
            $product = new Product;

            $product->name=$request->name;
            $product->price=$request->price;
            $product->stock=$request->stock;

            $product->save();

            $data=[
                'status'=>200,
                'message'=>'Product Added Successfully'
            ];

            return response()->json($data,200);
        }
    }
}
