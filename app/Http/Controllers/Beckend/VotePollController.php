<?php

namespace App\Http\Controllers\Beckend;

use App\Http\Controllers\Controller;
use App\Models\TodaySportOption;
use App\Models\VotePoll;
use App\Models\VotePollOption;
use Illuminate\Http\Request;

class VotePollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votePolls = VotePoll::with('votePollOption')->orderBy('id', 'desc')->get();
        return view('beckend.pages.vote_polls.index', compact('votePolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beckend.pages.vote_polls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string',
            'status'   => 'required|string',
            'option'        => 'required|array|min:1',
            'option.*'      => 'required|string|max:255',
        ]);
        $votePoll = VotePoll::create([
            'title'   => $validated['title'],
            'status'   => $validated['status'],
        ]);
        VotePollOption::insert(
            array_map(function ($option) use ($votePoll) {
                return [
                    'vote_poll_id' => $votePoll->id,
                    'option_name'    => $option,
                ];
            }, $validated['option'])
        );
        return redirect()->route('vote-polls.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $votePoll = VotePoll::with('votePollOption')->findOrFail($id);
        return view('beckend.pages.vote_polls.show', compact('votePoll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $votePoll = VotePoll::with('votePollOption')->findOrFail($id);
        return view('beckend.pages.vote_polls.edit', compact('votePoll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'   => 'required|string',
            'status'   => 'required|string',
            'option'        => 'required|array|min:1',
            'option.*'      => 'required|string|max:255',
        ]);
        $votePoll = VotePoll::findOrFail($id);
        $votePoll->update([
            'title'   => $validated['title'],
            'status'   => $validated['status'],
        ]);
        VotePollOption::where('vote_poll_id', $votePoll->id)->delete();
        VotePollOption::insert(
            array_map(function ($option) use ($votePoll) {
                return [
                    'vote_poll_id' => $votePoll->id,
                    'option_name'    => $option,
                ];
            }, $validated['option'])
        );
        return redirect()->route('vote-polls.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $votePoll = VotePoll::findOrFail($id);
        $votePoll->delete();
        return redirect()->back()->with('message', 'Vote poll deleted successfully.');
    }
    /**
     * Submitted the specified resource from storage.
     */
    public function submitVote(Request $request)
    {
        $request->validate([
            'option_id' => 'required|exists:vote_poll_options,id',
        ]);
        $option = VotePollOption::find($request->option_id);
        $option->increment('vote_count');
        $option->votePoll->increment('total_vote');
        return response()->json(['success' => true, 'message' => 'ভোট গ্রহণ করা হয়েছে!','id'=>$option->votePoll->id]);
    }
    /**
     * Ajker Vote Submitted the specified resource from storage.
     */
    public function submitAjkerSportVote(Request $request)
    {
        $option = TodaySportOption::find($request->option_id);
        $option->increment('vote_count');
        $option->todaySport->increment('total_vote');
        return response()->json(['success' => true, 'message' => 'ভোট গ্রহণ করা হয়েছে!','id'=>$option->todaySport->id]);
    }
}
