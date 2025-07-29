<?php

namespace App\Http\Controllers\Beckend;

use voku\helper\ASCII;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('beckend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beckend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            'type' => 'required',
        ]);
        $category = new Category;
        if($validated['type'] == 'special'){
           Category::where(['type'=>'special','status'=>'active'])->update(['status' => 'inactive']);
           $category->sort_order = 1;
        }else {
            $category->sort_order = Category::where('type', $validated['type'])->max('sort_order') + 1;
        }
        $category->name = $validated['name'];
        $category->type = $validated['type'];
        $category->slug = str_replace(' ', '-', $validated['name']);
        $category->save();
        return redirect()->route('categories.index')->with('message','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $category->status = $category->status === 'active' ? 'inactive' : 'active';
        $category->save();
        return redirect()->back()->with('message', 'Category '.$category->status.' successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('beckend.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'type' => 'required',
            'sort_order' => 'required',
        ]);
        $category = Category::findOrFail($id);
        if($validated['type'] == 'special'){
           Category::where(['type'=>'special','status'=>'active'])->update(['status' => 'inactive']);
           $category->sort_order = $validated['sort_order'];
        }else{
            $category->sort_order = $validated['sort_order'];
        }

        $category->name = $validated['name'];
        $category->type = $validated['type'];
        $category->slug = str_replace(' ', '-', $validated['name']);
        $category->save();
        return redirect()->route('categories.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully.');
    }
}
