<?php

namespace App\Http\Controllers\Beckend;

use App\Models\Content;
use App\Models\Category;
use App\Services\Services;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;

class ContentController extends Controller
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
        $contents = Content::with('category','subcategory','author')->orderBy('id','desc')->get();
        return view('beckend.pages.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where(['status'=>'active'])->get();
        $authors = Author::latest()->get();
        return view('beckend.pages.content.create',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'author_id' => 'required',
            'title' => 'required|unique:contents,title',
            'image' => 'required',
            'caption' => 'nullable',
            'details' => 'required',
            'tags' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 750; $height = 390;
            $folder = 'assets/images/blogs/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        Content::create([
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'slug' => str_replace(' ', '-', $validated['title']),
            'image' => $validated['image'],
            'caption' => $validated['caption'],
            'details' => $validated['details'],
            'tags' => json_encode(explode(',', $validated['tags'])),
        ]);
        return redirect()->route('contents.index')->with('message','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::where(['status'=>'active'])->get();
        $subcategories = Subcategory::get();
        $content = Content::with('category','subcategory','author')->findOrFail($id);
        return view('beckend.pages.content.show',compact('content','categories','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where(['status'=>'active'])->get();
        $subcategories = Subcategory::get();
        $authors = Author::latest()->get();
        $content = Content::with('category','subcategory')->findOrFail($id);
        return view('beckend.pages.content.edit',compact('content','categories','subcategories','authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content = Content::findOrFail($id);
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'author_id' => 'required',
            'title' => 'required|unique:contents,title,' . $content->id,
            'image' => 'nullable',
            'caption' => 'nullable',
            'details' => 'required',
            'tags' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 750; $height = 390;
            $folder = 'assets/images/blogs/';
            $this->services->imageDestroy($content->image, $folder);
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        $content->update([
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'slug' => str_replace(' ', '-', $validated['title']),
            'image' => !empty($validated['image']) ? $validated['image'] : $content->image,
            'caption' => $validated['caption'],
            'details' => $validated['details'],
            'tags' => json_encode(explode(',', $validated['tags'])),
        ]);
        return redirect()->route('contents.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $folder = 'assets/images/blogs/';
        $this->services->imageDestroy($content->image, $folder);
        $content->delete();
        return redirect()->back()->with('message', 'Content deleted successfully.');
    }
}
