<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function getAllProduct(){
        $product = Product::all();

        $data = [
            'status'=>200,
            'product'=>$product
        ];

        return response()->json($data,200);
    }

    public function findProduct($id){
        $product = Product::find($id);

        if(!$product){
            $data = [
                'status'=>422,
                'message'=> "Product not found"
            ];

            return response()->json($data,422);
        } else {
            $data = [
                'response'=>200,
                'product'=>$product
            ];

            return response()->json($data,200);
        }
    }

    public function addProduct(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name'=>'required|string',
            'price'=>'required|numeric',
            'stock'=>'required|int',
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

    public function updateProduct(Request $request,$id){
        $validator = Validator::make($request->all(),
        [
            'name'=>'required|string',
            'price'=>'required|numeric',
            'stock'=>'required|int',
        ]);

        if($validator->fails()){

            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            
            return response()->json($data,422);
        } else {
            $product = Product::find($id);

            $product->name=$request->name;
            $product->price=$request->price;
            $product->stock=$request->stock;

            $product->save();

            $data=[
                'status'=>200,
                'message'=>'Product Updated Successfully'
            ];

            return response()->json($data,200);
        }
    }

    public function deleteProduct($id){
        $product = Product::find($id);

        if(!$product){
            $data = [
                'status' => 422,
                'message' => "Product id not found"
            ];

            return response()->json($data,422);
        } else{
            $data = [
                'status' => 200,
                'message' => "Product deleted successfully"
            ];
            $product->delete();
            return response()->json($data,200);
        }

        
    }
}
