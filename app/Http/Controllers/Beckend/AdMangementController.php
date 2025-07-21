<?php

namespace App\Http\Controllers\Beckend;

use App\Services\Services;
use App\Models\AdMangement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdMangementController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }
    /**
     * Display a listing of the resource.
     */
    public function ad_managements(Request $request)
    {
       $adManagement = AdMangement::first();
       if($request->isMethod('post')){
            if ($request->hasFile('home_special_header_top')){
                $width = 728; $height = 75;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_special_header_top, $folder);
                $adManagement->home_special_header_top = $this->services->imageUpload($request->file('home_special_header_top'), $folder,$width,$height);
            }
            if ($request->hasFile('home_special_header_bottom')){
                $width = 728; $height = 75;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_special_header_bottom, $folder);
                $adManagement->home_special_header_bottom = $this->services->imageUpload($request->file('home_special_header_bottom'), $folder,$width,$height);
            }
            if ($request->hasFile('home_category_bottom')){
                $width = 728; $height = 75;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_category_bottom, $folder);
                $adManagement->home_category_bottom = $this->services->imageUpload($request->file('home_category_bottom'), $folder,$width,$height);
            }
            if ($request->hasFile('home_double_category_bottom')){
                $width = 728; $height = 75;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_double_category_bottom, $folder);
                $adManagement->home_double_category_bottom = $this->services->imageUpload($request->file('home_double_category_bottom'), $folder,$width,$height);
            }
            if ($request->hasFile('home_sidebar_ad_one')){
                $width = 1080; $height = 1080;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_sidebar_ad_one, $folder);
                $adManagement->home_sidebar_ad_one = $this->services->imageUpload($request->file('home_sidebar_ad_one'), $folder,$width,$height);
            }
            if ($request->hasFile('home_sidebar_ad_two')){
                $width = 1080; $height = 1080;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_sidebar_ad_two, $folder);
                $adManagement->home_sidebar_ad_two = $this->services->imageUpload($request->file('home_sidebar_ad_two'), $folder,$width,$height);
            }
            if ($request->hasFile('home_sidebar_ad_three')){
                $width = 1080; $height = 1080;
                $folder = 'assets/images/ads/';
                $this->services->imageDestroy($adManagement->home_sidebar_ad_three, $folder);
                $adManagement->home_sidebar_ad_three = $this->services->imageUpload($request->file('home_sidebar_ad_three'), $folder,$width,$height);
            }
            $adManagement->save();
       }
       return view('beckend.pages.ad_management.index',compact('adManagement'));
    }
}
