<?php

namespace App\Http\Controllers\Beckend;

use App\Models\User;
use App\Models\Comment;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $users = User::where('is_role', '!=', 'user')->get();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'is_role' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 225; $height = 225;
            $folder = 'assets/images/profile/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $validated['image'] ?? 'profile.png',
            'is_role' => $request->is_role ?? 'user',
            'pin' => $validated['password'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('users.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('beckend.pages.user.show', compact('user'));
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
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'is_role' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 225; $height = 225;
            $folder = 'assets/images/profile/';
            if ($user->image && $user->image != 'profile.png') {
                $this->services->imageDestroy($user->image, $folder);
            }
            $validated['image'] = $this->services->imageUpload($request->image, $folder,$width,$height);
            $user->image = $validated['image'];
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->is_role = $validated['is_role'];
        $user->pin = $validated['password'];
        $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect()->route('users.index')->with('message', 'Updated Successfully');
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
    public function comment_lists(){
        $comments = Comment::latest()->paginate(25);
        return view('beckend.pages.user.comments',compact('comments'));
    }
    public function comment_delete($id){
        $comments = Comment::findOrFail($id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
}
