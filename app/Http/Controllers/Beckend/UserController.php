<?php

namespace App\Http\Controllers\Beckend;

use App\Models\User;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::get();
        return view('beckend.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beckend.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'is_role' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 400; $height = 400;
            $folder = 'assets/images/profiles/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        return $validated['image'];
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $validated['image'] ?? 'default.png',
            'is_role' => $request->is_role ?? 'user',
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('users.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::findOrFail($id);
        // return redirect()->back()->with('message', 'User ' . $user->status . ' successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('beckend.pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'is_role' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 400; $height = 400;
            $folder = 'assets/images/blogs/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        User::findOrFail($id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $validated['image'],
            'is_role' => $request->is_role ?? 'user',
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('users.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully.');
    }
}
