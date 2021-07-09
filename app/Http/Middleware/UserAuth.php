<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect("/");
        }
        if($request->path()=="signup" && $request->session()->has('user')){
            return redirect("/");
        }
        if($request->path()=="product_form" && !$request->session()->has('user')){
            return redirect("/login");
        }
        if($request->path()=="buy" && !$request->session()->has('user')){
            return redirect("/login");
        }
        if($request->path()=="myproducts" && !$request->session()->has('user')){
            return redirect("/login");
        }
        if($request->path()=="cart" && !$request->session()->has('user')){
            return redirect("/login");
        }
        if($request->path()=="profile" && !$request->session()->has('user')){
            return redirect("/login");
        }
        if($request->path()=="myorders" && !$request->session()->has('user')){
            return redirect("/login");
        }
        return $next($request);
    }
}
