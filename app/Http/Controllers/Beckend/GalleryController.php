<?php

namespace App\Http\Controllers\Beckend;

use App\Models\Gallery;
use App\Models\Category;
use App\Services\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryItem;

class GalleryController extends Controller
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
        $galleries = Gallery::orderBy('id', 'desc')->get();
        return view('beckend.pages.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where(['status'=>'active'])->get();
        return view('beckend.pages.gallery.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $width = 750; $height = 390;
        $folder = 'assets/images/gallery/';

        if ($request->hasFile('image')){
            $validated['image'] = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
        }
        $gallery = Gallery::create([
            'title' => $validated['title'],
            'image' => $validated['image'],
        ]);

        foreach ($request->file('images') as $index => $file) {
            $imagePath = $this->services->imageUpload($file, $folder, $width, $height);
            $gallery->galleryItems()->create([
                'gallery_id'   => $gallery->id,
                'image_name'   => $imagePath,
                'caption' => $request->caption[$index] ?? null,
            ]);
        }
        return redirect()->route('galleries.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::with('galleryItems')->findOrFail($id);
        return view('beckend.pages.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::with('galleryItems')->findOrFail($id);
        return view('beckend.pages.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::with('galleryItems')->findOrFail($id);
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        $width = 750; $height = 390;
        $folder = 'assets/images/gallery/';
        if ($request->hasFile('image')){
            $this->services->imageDestroy($gallery->image, $folder);
            $gallery->image = $this->services->imageUpload($request->image, $folder,$width,$height);
        }
        $gallery->title = $validated['title'];
        $gallery->save();

        if($request->file('images')){
            foreach ($request->file('images') as $index => $file) {
                $imagePath = $this->services->imageUpload($file, $folder, $width, $height);
                GalleryItem::create([
                    'gallery_id'   => $gallery->id,
                    'image_name'   => $imagePath,
                    'caption' => $request->caption[$index] ?? null,
                ]);
            }
        }
        return redirect()->route('galleries.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $folder = 'assets/images/gallery/';

        $this->services->imageDestroy($gallery->image, $folder);
        foreach($gallery->galleryItems as $item){
            $this->services->imageDestroy($item->image_name, $folder);
            $item->delete();
        }
        $gallery->delete();
        return redirect()->back()->with('message', 'Gallery deleted successfully.');
    }
    public function deleteGalleryItem($item_id){
        $folder = 'assets/images/gallery/';
        $item = GalleryItem::find($item_id);
        $this->services->imageDestroy($item->image_name, $folder);
        $item->delete();
        return back()->with('message','Item Deleted Successfully');
    }
}
