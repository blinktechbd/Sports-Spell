<?php

namespace App\Http\Controllers\Beckend;

use App\Models\User;
use App\Models\Setting;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }

    public function index(Request $request){
        $setting = Setting::first();
        if ($request->isMethod('post')) {
            if($request->email){
                $setting->email = $request->email;
            }
            if($request->address){
                $setting->address = $request->address;
            }
            if($request->site_title){
                $setting->site_title = $request->site_title;
            }
            if($request->site_desc){
                $setting->site_desc = $request->site_desc;
            }
            if($request->meta_title){
                $setting->meta_title = $request->meta_title;
            }
            if($request->meta_desc){
                $setting->meta_desc = $request->meta_desc;
            }
            if($request->social_fb_icon){
                $setting->social_fb_icon = $request->social_fb_icon;
            }
            if($request->social_fb){
                $setting->social_fb = $request->social_fb;
            }
            if($request->social_tw_icon){
                $setting->social_tw_icon = $request->social_tw_icon;
            }
            if($request->social_tw){
                $setting->social_tw = $request->social_tw;
            }
            if($request->social_ln_icon){
                $setting->social_ln_icon = $request->social_ln_icon;
            }
            if($request->social_ln){
                $setting->social_ln = $request->social_ln;
            }
            if($request->social_yt_icon){
                $setting->social_yt_icon = $request->social_yt_icon;
            }
            if($request->social_yt){
                $setting->social_yt = $request->social_yt;
            }
            if ($request->about) {
                $setting->about = $request->about;
            }
            if ($request->contact) {
                $setting->contact = $request->contact;
            }
            if ($request->privacy_policy) {
                $setting->privacy_policy = $request->privacy_policy;
            }
            if ($request->hasFile('favicon')){
                $width = 32; $height = 32;
                $folder = 'assets/images/logo/';
                $this->services->imageDestroy($setting->favicon, $folder);
                $setting->favicon = $this->services->imageUpload($request->file('favicon'), $folder,$width,$height);
            }
            if ($request->hasFile('logo')){
                $width = 150; $height = 55;
                $folder = 'assets/images/logo/';
                $this->services->imageDestroy($setting->logo, $folder);
                $setting->logo = $this->services->imageUpload($request->file('logo'), $folder,$width,$height);
            }
            if($request->hasFile('meta_img')){
                $metaWidth = 1200; $metaHeight = 600;
                $folder = 'assets/images/logo/';
                $this->services->imageDestroy($setting->meta_img, $folder);
                $setting->meta_img = $this->services->imageUpload($request->file('meta_img'), $folder,$metaWidth,$metaHeight);
            }
            $setting->save();
            return redirect()->back()->with('message', 'Settings updated successfully.');
        }
        return view('beckend.pages.settings.index', compact('setting'));
    }

    public function profile_settings(Request $request){
        $user = User::where(['is_role'=>'admin'])->first();
        if ($request->isMethod('post')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->pin = $request->password;
            $user->save();
            return redirect()->back()->with('message', 'Profile Settings updated.');
        }
        return view('beckend.pages.settings.profile_settings', compact('user'));
    }
}
