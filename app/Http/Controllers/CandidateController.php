<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = User::with('kelas')
            ->where('role', 'siswa')
            ->where('ready_candidate', 'yes')
            ->select(['id', 'number_card', 'name', 'role', 'gender', 'kelas_id', 'gambar', 'ready_candidate'])
            ->get();
        return response()->json($candidates, 200);
    }

    public function destroy($eventId, $userId, Request $request)
    {
        $candidate = Candidate::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->first();
        $result = Result::where('candidate_id', $candidate->id)
            ->where('event_id', $eventId)
            ->first();
        if($result){
            $result->delete();
            $candidate->delete();
        }else{
            $candidate->delete();
        }
    }

    public function store(Request $request)
    {
        foreach ($request->candidates as $candidate) {
            Candidate::create([
                'user_id' => $candidate['user_id'],
                'event_id' => $candidate['event_id'],
                'visi' => $candidate['visi'],
                'misi' => $candidate['misi'],
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $candidateUpdate = Candidate::where('event_id', $request->event_id)
            ->where('id', $id)
            ->update([
                'user_id' => $request->user_id,
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);

        return response()->json($candidateUpdate, 200);
    }
}
