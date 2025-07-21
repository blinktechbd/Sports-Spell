<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TodaySport;
use App\Models\TodaySportOption;
use Illuminate\Http\Request;

class TodaySportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $todaySports = TodaySport::with('category', 'todaySportOption')->where(['status'=>'active'])->orderBy('id', 'desc')->get();
        return view('beckend.pages.today_sports.index', compact('todaySports'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create(){
        $categories = Category::where('status', 'active')->get();
        return view('beckend.pages.today_sports.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|integer',
            'match_type'    => 'required|string',
            'match_title'   => 'required|string',
            'match_stadium' => 'required|string',
            'match_time'    => 'required|date',
            'status'    => 'required|string',
            'option'        => 'required|array|min:1',
            'option.*'      => 'required|string|max:255',
        ]);
        $todaySport = TodaySport::create([
            'category_id'   => $validated['category_id'],
            'match_type'    => $validated['match_type'],
            'match_title'   => $validated['match_title'],
            'match_stadium' => $validated['match_stadium'],
            'match_time'    => $validated['match_time'],
            'status'    => $validated['status'],
        ]);
        TodaySportOption::insert(
            array_map(function ($option) use ($todaySport) {
                return [
                    'today_sport_id' => $todaySport->id,
                    'option_name'    => $option,
                ];
            }, $validated['option'])
        );
        return redirect()->route('today-sports.index')->with('message','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todaySport = TodaySport::with('category', 'todaySportOption')->findOrFail($id);
        return view('beckend.pages.today_sports.show', compact('todaySport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('status', 'active')->get();
        $todaySport = TodaySport::with('category', 'todaySportOption')->findOrFail($id);
        return view('beckend.pages.today_sports.edit', compact('categories', 'todaySport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id'   => 'required|integer',
            'match_type'    => 'required|string',
            'match_title'   => 'required|string',
            'match_stadium' => 'required|string',
            'match_time'    => 'required|date',
            'status'    => 'required|string',
            'option'        => 'required|array|min:1',
            'option.*'      => 'required|string',
        ]);
        $todaySport = TodaySport::findOrFail($id);
        $todaySport->update([
            'category_id'   => $validated['category_id'],
            'match_type'    => $validated['match_type'],
            'match_title'   => $validated['match_title'],
            'match_stadium' => $validated['match_stadium'],
            'match_time'    => $validated['match_time'],
            'status'    => $validated['status'],
        ]);
        TodaySportOption::where('today_sport_id', $todaySport->id)->delete();
        TodaySportOption::insert(
            array_map(function ($option) use ($todaySport) {
                return [
                    'today_sport_id' => $todaySport->id,
                    'option_name'    => $option,
                ];
            }, $validated['option'])
        );
        return redirect()->route('today-sports.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todaySport = TodaySport::findOrFail($id);
        $todaySport->delete();
        return redirect()->back()->with('message', 'Today Sport deleted successfully.');
    }
}
