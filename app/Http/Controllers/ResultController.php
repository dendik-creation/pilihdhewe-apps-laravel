<?php

namespace App\Http\Controllers;

use App\Http\Resources\IsIVoted;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'event_id' => 'required',
            'candidate_id' => 'required',
        ]);
        Result::create([
            'user_id' => auth()->user()->id,
            'event_id' => $request->event_id,
            'candidate_id' => $request->candidate_id
        ]);
        return response()->json([
            'message' => 'Voting Berhasil, Terima Kasih Telah Berpatisipasi'
        ],200);
    }

    public function index(){
        $myVote = Result::where('user_id', auth()->user()->id)->get();
        return response()->json($myVote, 200);
    }

    public function show($id){
        $myVoteID = Result::with('candidate')->where('user_id', auth()->user()->id)->where('event_id', $id)->first();
        return new IsIVoted($myVoteID);
    }
}
