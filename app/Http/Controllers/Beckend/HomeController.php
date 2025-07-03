<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        return view('beckend.pages.dashboard');
    }
}
