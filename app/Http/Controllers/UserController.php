<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where(["email"=>$req->email])->first();
        if($user && Hash::check($req->password,$user->password)){
            $req->session()->put('user',$user);
            return redirect("/");
        }
        else{
            return "<h3>Email and Password does not match. <br><br><button onclick=\"window.location.href='login';\">Back to login</button></h3>";
        }
    }
}

