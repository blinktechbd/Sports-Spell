<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\TodaySport;
use App\Services\Services;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }
    public function home(){
        $specialConts = [];
        $specialCat = "";
        $specialCat = Category::where(['status'=>'active','type'=>'special','sort_order'=>1])->select('id','name','slug','status','sort_order','type')->first();
        if($specialCat){
            $specialConts = Content::where(['category_id'=>$specialCat->id])->get() ?? [];
        }
        $contents = Content::with('category:id,name,slug','subcategory:id,category_id,name')->latest()->take(6)->select('id','category_id','subcategory_id','title','slug','image','details','created_at')->get();
        $categoriesContents = Category::with(['subcategories','contents' => function($query) {
            $query->latest()->select('id','category_id','subcategory_id','title','slug','image','details','created_at')->take(3);
        }])->where(['status'=>'active'])->where('type', '!=', 'special')->orderBy('sort_order')->select('id','name','slug','status','sort_order','created_at')
        ->get();
        $topHomeCatData = $categoriesContents->take(3);
        $bottomHomeCatData = $categoriesContents->slice(3)->values();
        $chunkedBottomCatData = $bottomHomeCatData->chunk(2)->map->values();
        $gallaries = Gallery::orderBy('id','desc')->limit(5)->get();
        return view('frontend.pages.home', compact('contents','topHomeCatData','chunkedBottomCatData','gallaries','specialConts','specialCat'));
    }
    public function categoryWiseContent($catSlug){
        if($catSlug === 'today-sports'){
            $todaySports = TodaySport::with('category','todaySportOption')->where(['status'=>'active'])->orderBy('id','desc')->paginate(8);
            return view('frontend.pages.category.ajker_khela',compact('todaySports'));
        }
        $category= Category::with('subcategories')->where(['slug'=>$catSlug])->select('id','name','slug')->first();
        $catContents = Content::where(['category_id'=>$category->id])->orderBy('id','desc')->paginate(18);
        return view('frontend.pages.category.category_content',compact('category','catContents'));
    }
    public function catWiseSubContent($category,$subcategory){
        $subcategory = Subcategory::with(['category'])->whereRelation('category', 'slug', $category)->where(['name'=>$subcategory])->first();
        $catSubContents = Content::with(['category', 'subcategory'])->where(['category_id'=>$subcategory->category_id,'subcategory_id'=>$subcategory->id])->paginate(18);
        return view('frontend.pages.category.cat_subcat_content',compact('catSubContents','subcategory'));
    }
    public function categoryWiseContentDetails($category_slug,$subcategory_name,$title_slug){
        $content = Content::with(['category', 'subcategory'])->whereRelation('category', 'slug', $category_slug)->whereRelation('subcategory', 'name', $subcategory_name)->where('slug', $title_slug)->firstOrFail();
        $content->increment('visitor_count');
        $moreContents = Content::with(['category', 'subcategory'])->whereRelation('category', 'slug', $category_slug)->whereRelation('subcategory', 'name', $subcategory_name)->where('slug', '!=', $title_slug)->limit(6)->get();
        return view('frontend.pages.content.content_details',compact('content','moreContents'));
    }
    public function today_cat_sports($slug){
        $category = Category::where(['slug'=>$slug,'status'=>'active'])->select('id','name','slug','status')->first();
        $todaySports = TodaySport::with('category','todaySportOption')->where(['category_id'=>$category->id,'status'=>'active'])->orderBy('id','desc')->paginate(8);
        return view('frontend.pages.category.ajker_category_khela',compact('todaySports','category'));
    }
    public function photoGalleries(){
       $gallaries = Gallery::orderBy('id','desc')->orderBy('id','desc')->paginate(12);
       return view('frontend.pages.gallery.gallery_content',compact('gallaries'));
    }
    public function photoGalleryDetails($id){
        $gallery = Gallery::with('galleryItems')->findOrFail($id);
       return view('frontend.pages.gallery.gallery_content_details',compact('gallery'));
    }

    public function contentSearch(Request $request){
        $searchTerm = $request->input('search');
        $contents = Content::query()
            ->select('id', 'category_id', 'subcategory_id', 'title', 'slug', 'image', 'details', 'created_at')
            ->with([
                'category:id,name,slug',
                'subcategory:id,category_id,name',
            ])
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', '%' . $searchTerm . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
        return view('frontend.pages.search.search_result', compact('contents', 'searchTerm'));
    }
    public function tagSearch(Request $request){
        $searchTerm = $request->input('search');
        $contents = Content::query()
            ->select('id', 'category_id', 'subcategory_id', 'title', 'slug', 'image', 'details', 'created_at')
            ->with([
                'category:id,name,slug',
                'subcategory:id,category_id,name',
            ])
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('details', 'LIKE', '%' . $searchTerm . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
        return view('frontend.pages.search.search_result', compact('contents', 'searchTerm'));
    }

    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function privacy_policy(){
        return view('frontend.pages.privacy_policy');
    }
    public function comment(Request $request){
        $validated = $request->validate([
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content_id = $request->content_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('success', 'মন্তব্য সফলভাবে সংরক্ষণ হয়েছে!');
    }
    public function profile(Request $request){
        $user = User::with('comments')->findOrFail(Auth::id());
        if($request->isMethod('post')){
            if($request->name){
                $user->name = $request->name;
            }
            if($request->email){
                $validated = $request->validate([
                    'email' => 'required|email|unique:users,email,' . $user->id,
                ]);
                $user->email = $validated['email'];
            }
            if($request->pin){
                $user->pin = $request->pin;
                $user->password = Hash::make($request->pin);
            }
            if ($request->hasFile('image')){
                $width = 250; $height = 250;
                $folder = 'assets/images/profile/';
                $this->services->imageDestroy($user->image, $folder);
                $user->image = $this->services->imageUpload($request->file('image'), $folder,$width,$height);
            }
            $user->save();
            return redirect()->back()->with('message', 'Updated successfully.');
        }
        return view('auth.user_profile',compact('user'));
    }
}
