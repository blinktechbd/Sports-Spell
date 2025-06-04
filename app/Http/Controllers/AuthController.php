<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function userLogin(Request $request){
    //     if($request->isMethod('post')){
    //         return $request->all();
    //     }
    //     return view('auth.user_login');
    // }
    public function adminLogin(Request $request){
        if($request->isMethod('post')){
            return $request->all();
        }
        return view('auth.admin_login');
    }
}
