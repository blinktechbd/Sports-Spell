<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }
    public function categoryWiseContent($category){
        if($category === 'today-sports'){
            return view('frontend.pages.category.ajker_khela');
        }
        return view('frontend.pages.category.category_content');
    }
    public function categoryWiseContentDetails($category,$subcategory,$title){
        return view('frontend.pages.content.content_details');
    }
}
