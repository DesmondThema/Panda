<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function form()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        if (Auth::check()) {
            return $next($request);
        }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = Http::post(config('panda.login_url'), $credentials);

        if ($response->successful()) {
            Cookie::queue(Cookie::make('api_token', $response->json('key'), 720));
            return redirect()->intended('dashboard')->with('status', 'You are logged in!');
        } else {
            return back()->withErrors($response->json());
        }
    }
}
