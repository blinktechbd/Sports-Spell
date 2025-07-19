<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
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
        ]);
        Author::create([
            'name' => $validated['name'],
        ]);
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
        ]);
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
        $author->delete();
        return redirect()->back()->with('message', 'Author deleted successfully.');
    }
}
