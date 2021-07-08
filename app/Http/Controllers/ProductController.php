<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cartproduct;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index(){
        $data = Product::select("*")->where("email",'!=', session('user'))->get();
        return view('product',['products'=>$data]);
    }

    function mypro(){
        $data = Product::select("*")->where("email",'=', session('user'))->get();
        return view('myproduct',['products'=>$data]);
    }

    function info($id){
        $data = Product::select("*")->where("id",'=', $id)->get()->first();
        $owner = User::select("*")->where("email", $data->email)->get()->first();
        return view('product_info',['info'=>$data,'owner'=>$owner]);
    }

    function buyproduct($id){
        $data = Product::select("*")->where("id",'=', $id)->get()->first();
        $owner = User::select("*")->where("email", $data->email)->get()->first();
        return view('buyproduct',['info'=>$data,'owner'=>$owner]);
    }

    function buy(Request $req){
        $data = Product::select("*")->where("id",'=', $req->id)->get()->first();
        $req->validate([
            'quantity' => 'required|lte:q',
        ]);
        $order = new order;
        $order->pid = $req->id;
        $order->custemail = session('user');
        $order->owneremail = $data->email;
        $order->quantity = $req->quantity;
        $order->save();
        $product = Product::find($req->id);
        $product->quantity = $data->quantity-$req->quantity;
        $product->save();
        return redirect('myorders');
    }

    function hist($id){
        $data = Product::select("*")->where("id",'=', $id)->get()->first();
        return view('product_hist',['info'=>$data]);
    }

    function cart(){
        $res = cartproduct::select("*")->where("email",'=', session('user'))->get();
        if($res!=NULL)
        $data=DB::table('cartproducts')->join('products', function ($join) {
        $join->on('cartproducts.pid', '=', 'products.id')->where('cartproducts.email','=',session('user'));
        })->get();
        else 
        $data = [];
        return view('cart',['products'=>$data]);
    }

    function addcart($pid){
        $res = cartproduct::select("*")->where("email",'=', session('user'))->where("pid",'=', $pid)->get();
        $num = count($res);
        if($num==0){
            $product = new cartproduct;
            $product->pid = $pid;
            $product->email = session('user');
            $product->save();
        }
        return redirect('cart');
    }

    function deletecart($id){
        $res = cartproduct::select("*")->where("email",'=', session('user'))->where("pid",'=', $id)->get()->first();
        $data = cartproduct::find($res->id);
        $data->delete();
        return redirect('cart');
    }

    function addpro(Request $req){
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
