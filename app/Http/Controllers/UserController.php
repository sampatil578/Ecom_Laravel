<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where(["email"=>$req->email])->first();
        $a = $req->input();
        if($user && Hash::check($req->password,$user->password)){
            $req->session()->put('user',$a['email']);
            return redirect("/");
        }
        else{
            return "<h3>Email and Password does not match. <br><br><button onclick=\"window.location.href='login';\">Back to login</button></h3>";
        }
    }

    function signup(Request $req){
        $req->validate([
            'name' => 'required',
            'email'=>'required',
            'password'=>'required|min:8',
            'cpassword'=>'required_with:password|same:password|min:8',
            'contact' => 'required',
            'hostel' => 'required',
        ]);
        $user = new user;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->contact = $req->contact;
        $user->hostel = $req->hostel;
        $user->save();
        return redirect('login');
    }

    function userprofile(){
        $user = User::select("*")->where("email",'=', session('user'))->get()->first();
        return view('profile',['user'=>$user]);
    }

    function profile($id){
        $user = User::select("*")->where("id",'=', $id)->get()->first();
        return view('profile',['user'=>$user]);
    }
}

