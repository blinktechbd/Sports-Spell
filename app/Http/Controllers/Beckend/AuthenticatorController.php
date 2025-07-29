<?php

namespace App\Http\Controllers\Beckend;

use App\Models\User;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticatorController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticators = User::where('is_role', 'user')->get();
        return view('beckend.pages.authenticator.index', compact('authenticators'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $folder = 'assets/images/profile/';
        if ($user->image && $user->image != 'profile.png') {
            $this->services->imageDestroy($user->image, $folder);
        }
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully.');
    }
}
