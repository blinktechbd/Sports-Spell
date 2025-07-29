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
            $ogWidth = 1200; $ogHeight = 600;
            $folder = 'assets/images/blogs/';
            $ogFolder = 'assets/images/blogs/og/';
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
            $validated['og'] = $this->services->imageUpload($request->file('image'), $ogFolder,$ogWidth,$ogHeight);
        }
        $title = $validated['title'];
        $title = str_replace([',', '?'], '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $slug = trim($title, '-');
        Content::create([
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $validated['image'],
            'og' => $validated['og'],
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
            $ogWidth = 1200; $ogHeight = 600;
            $folder = 'assets/images/blogs/';
            $ogFolder = 'assets/images/blogs/og/';
            $this->services->imageDestroy($content->image, $folder);
            $this->services->imageDestroy($content->og, $ogFolder);
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
            $validated['og'] = $this->services->imageUpload($request->file('image'), $ogFolder,$ogWidth,$ogHeight);
        }
        $title = $validated['title'];
        $title = str_replace([',', '?'], '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $slug = trim($title, '-');
        $content->update([
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'slug' =>  $slug,
            'image' => !empty($validated['image']) ? $validated['image'] : $content->image,
            'image' => !empty($validated['og']) ? $validated['og'] : $content->og,
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
        $ogFolder = 'assets/images/blogs/og/';
        $this->services->imageDestroy($content->image, $folder);
        $this->services->imageDestroy($content->og, $ogFolder);
        $content->delete();
        return redirect()->back()->with('message', 'Content deleted successfully.');
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');

        $filename = 'image_'.time().'_'.$image->hashName();
        $image = $image->move(public_path('storage/assets/images/blogs'), $filename);

        return json_encode(array(
        'file_path' => url('storage/assets/images/blogs/'.$filename)
       ));

    }
}
