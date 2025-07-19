<?php

use App\Models\Content;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\VotePoll;

function getSetting(){
    return Setting::first();
}
function topMenus(){
    return Category::where(['status'=>'active'])->orderBy('sort_order','asc');
}
function votting_polls(){
    return VotePoll::with('votePollOption')->where(['status'=>'active'])->orderBy('id','desc');
}
function convertEnToBnNum($number) {
    $formatted = number_format($number);
    $enDigits = ['0','1','2','3','4','5','6','7','8','9'];
    $bnDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
    return str_replace($enDigits, $bnDigits, $formatted);
}
function bangla_date($date = null, $format = 'F j, Y'){
    $date = $date ? \Carbon\Carbon::parse($date) : \Carbon\Carbon::now();
    $english = ['January','February','March','April','May','June','July','August','September','October','November','December',
                '0','1','2','3','4','5','6','7','8','9'];
    $bangla  = ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',
                '০','১','২','৩','৪','৫','৬','৭','৮','৯'];
    return str_replace($english, $bangla, $date->format($format));
}
function ltst_post(){
    return Content::latest()->take(6)->select('id','category_id','subcategory_id','title','slug','image','details','created_at')->get();
}
function trdng_post(){
    return Content::orderBy('visitor_count', 'desc')->limit(6)->select('id','category_id','subcategory_id','title','slug','image','details','visitor_count','created_at')->get();
}
function galleryLtstPost($id){
    return Gallery::where('id', '!=', $id)->orderBy('id','desc')->limit(6)->get();
}
