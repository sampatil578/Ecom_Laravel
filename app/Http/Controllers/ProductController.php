<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function signup(Request $req){
        $req->validate([
            'product' => 'required',
            'email'=>'required',
            'price'=>'required',
            'category'=>'required',
            'quantity' => 'required',
            'gallery' => 'required',
            'description' => 'required',
        ]);
        $product = new product;
        $product->product = $req->product;
        $product->email = $req->email;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->quantity = $req->quantity;
        $product->gallery = $req->gallery;
        $product->description = $req->description;
        $product->save();
        return redirect('login');
    }

}
