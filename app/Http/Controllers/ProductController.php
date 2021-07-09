<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cartproduct;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use PaytmWallet;
use Session;

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
        $order->quantity_purchased = $req->quantity;
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

    public function paytmPayment(Request $req)
    {
        $req->validate([
            'quantity' => 'required|lte:q',
        ]);
        $a = $req->input();
        $req->session()->put('order',$a);
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => rand(),
          'user' => rand(10,1000),
          'mobile_number' => '123456789',
          'email' => 'paytmtest@gmail.com',
          'amount' => ($req->price)*($req->quantity),
          'callback_url' => route('paytm.callback'),
        ]);
        return $payment->receive();
    }

    public function paytmCallback()
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){
            $a = session('order');
            Session::forget('order');
            $data = Product::select("*")->where("id",'=', $a['id'])->get()->first();
            $order = new order;
            $order->pid = $a['id'];
            $order->custemail = session('user');
            $order->owneremail = $data->email;
            $order->quantity_purchased = $a['quantity'];
            $order->save();
            $product = Product::find($a['id']);
            $product->quantity = $data->quantity-$a['quantity'];
            $product->save();
            return redirect('myorders');
        }else if($transaction->isFailed()){
          //Transaction Failed
          return view('paytm.paytm-fail');
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
          return view('paytm.paytm-fail');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }
}
