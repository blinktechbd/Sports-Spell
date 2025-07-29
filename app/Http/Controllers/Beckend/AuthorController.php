<?php

namespace App\Http\Controllers\Beckend;

use App\Models\Author;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
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
        $authors = Author::get();
        return view('beckend.pages.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beckend.pages.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $author = new Author();
        if ($request->hasFile('image')){
            $width = 64; $height = 64;
            $folder = 'assets/images/author/';
            $author->image = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        $author->name = $validated['name'];
        $author->save();
        return redirect()->route('authors.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::findOrFail($id);
        return view('beckend.pages.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('image')){
            $width = 64; $height = 64;
            $folder = 'assets/images/author/';
            $this->services->imageDestroy($author->image, $folder);
            $author->image = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        $author->name = $validated['name'];
        $author->save();
        return redirect()->route('authors.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $folder = 'assets/images/author/';
        $this->services->imageDestroy($author->image, $folder);
        $author->delete();
        return redirect()->back()->with('message', 'Author deleted successfully.');
    }
}
