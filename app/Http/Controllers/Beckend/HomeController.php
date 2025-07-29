<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Subcategory;
use App\Models\TodaySport;
use App\Models\User;
use App\Models\VotePoll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $categories = Category::where(['status'=>'active'])->count();
        $subcategories = Subcategory::count();
        $contents = Content::count();
        $galleries = Gallery::count();
        $todaySports = TodaySport::whereDate('match_time', today())->where(['status'=>'active'])->count();
        $onlinePolls = VotePoll::where(['status'=>'active'])->count();
        $users = User::where('is_role','!=','user')->count();
        $authenticators = User::where('is_role','user')->count();
        $authors = Author::count();
        $comments = Comment::count();
        $totalVisitors = Content::sum('visitor_count');
        return view('beckend.pages.dashboard',compact('categories','subcategories','contents','galleries','todaySports','onlinePolls','users','authenticators','authors','comments','totalVisitors'));
    }
}
