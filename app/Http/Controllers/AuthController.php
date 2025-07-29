<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Exception;

class AuthController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }
    public function userLogin(Request $request){
        if(Auth::check() && Auth::user()->is_role == 'user'){
            return redirect()->route('home')->with('Login successfully');
        }
        if($request->isMethod('post')){
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'is_role' => 'user'])) {
                return redirect()->route('home')->with('Login successfully');
            } else {
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->withInput();
            }
        }
        return view('auth.user_login');
    }
    public function userSignUp(Request $request){
        if($request->isMethod('post')){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'password' => 'required',
            ]);
            $width = 250; $height = 250;
            $folder = 'assets/images/profile/';
            $user = new User();
            if ($request->hasFile('image')){
                $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
            }
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->image = $validated['image'] ?? 'profile.png';
            $user->pin = $validated['password'];
            $user->password = Hash::make($validated['password']);
            $user->save();
            if (Auth::attempt(['email' => $user->email, 'password' => $user->pin, 'is_role' => 'user'])) {
                return redirect()->route('home')->with('Login successfully');
            }
            return redirect()->route('login')->with('message','Please Login');
        }
        return view('auth.user_signup');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Logged out successfully');
    }


    // google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            Log::error('Facebook login error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Facebook login canceled or failed.');
        }
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'image' => $googleUser->getAvatar() ?? 'profile.png',
                'pin' => 'SportsSpell' . $googleUser->getId() . '@',
                'password' => Hash::make('SportsSpell' . $googleUser->getId() . '@'),
                'google_id' => $googleUser->getId(),
            ]
        );
        if($user){
            Auth::login($user);
            return redirect()->route('home')->with('message','Login successfully');
        }
        return redirect()->route('home')->with('error','Login Failed! Try Again');
    }

    //facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            Log::error('Facebook login error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Facebook login canceled or failed.');
        }

        $user = User::updateOrCreate(
            ['facebook_id' => $facebookUser->getId()],
            [
                'name' => $facebookUser->getName() ?? ' ',
                'email' => $facebookUser->getEmail() ?? ' ',
                'image' => $facebookUser->getAvatar() ?? 'profile.png',
                'pin' => 'SportsSpell' . $facebookUser->getId() . '@',
                'password' => Hash::make('SportsSpell' . $facebookUser->getId() . '@'),
                'facebook_id' => $facebookUser->getId(),
            ]
        );
        if($user){
            Auth::login($user);
            return redirect()->route('home')->with('message','Login successfully');
        }
        return redirect()->route('home')->with('error','Login Failed! Try Again');
    }


    // admin function
    public function adminLogin(Request $request)
    {
        if(Auth::check() && in_array(Auth::user()->is_role, ['superadmin', 'admin', 'editor'])){
            return redirect()->route('dashboard');
        }
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
                if (in_array(Auth::user()->is_role, ['admin', 'superadmin', 'editor'])) {
                    return redirect()->route('dashboard');
                }
                Auth::logout();
            } else {
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->withInput();
            }
        }
        return view('auth.admin_login');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message', 'Logged out successfully');
    }
}
