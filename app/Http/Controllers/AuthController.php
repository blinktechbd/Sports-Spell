<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function userLogin(Request $request){
    //     if($request->isMethod('post')){
    //         return $request->all();
    //     }
    //     return view('auth.user_login');
    // }
    public function adminLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'is_role' => 'admin'])) {
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->withInput();
            }
        }
        return view('auth.admin_login');
    }
}
