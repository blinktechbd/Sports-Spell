<?php

namespace App\Http\Controllers\Beckend;

use App\Models\Content;
use App\Models\Category;
use App\Services\Services;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $contents = Content::with('category','subcategory')->orderBy('id','desc')->get();
        return view('beckend.pages.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where(['status'=>'active'])->get();
        return view('beckend.pages.content.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'image' => 'required',
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
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'image' => $validated['image'],
            'details' => $validated['details'],
            'tags' => json_encode(explode(',', $validated['tags']))
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
        $content = Content::with('category','subcategory')->findOrFail($id);
        return view('beckend.pages.content.show',compact('content','categories','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where(['status'=>'active'])->get();
        $subcategories = Subcategory::get();
        $content = Content::with('category','subcategory')->findOrFail($id);
        return view('beckend.pages.content.edit',compact('content','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'details' => 'required',
            'tags' => 'required',
        ]);
        if ($request->hasFile('image')){
            $width = 750; $height = 390;
            $folder = 'assets/images/blogs/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        Content::findOrFail($id)->update([
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'title' => $validated['title'],
            'image' => $validated['image'],
            'details' => $validated['details'],
            'tags' => $validated['tags'],
        ]);
        return redirect()->route('categories.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->back()->with('message', 'Content deleted successfully.');
    }
}
