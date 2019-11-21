<?php

namespace App\Http\Middleware;

use Closure;

class LoginToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        session(['user'=>'张三']);
        // $user = session('user');
        // echo "ppp";
        // dd($user);
        // if(!$user){
        // dd($request->session()->has('user'));
        if(!$request->session()->has('user')){ 
            return redirect('/login/add');
        }
        return $next($request);
    }
}
