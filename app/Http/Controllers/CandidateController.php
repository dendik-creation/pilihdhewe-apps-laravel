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
        $candidate = Candidate::where('event_id', $eventId)->where('user_id', $userId)->first();
        $result = Result::where('candidate_id', $candidate->id)->where('event_id', $eventId)->get();
        if($result){
            foreach ($result as $item){
                $item->delete();
            }
        }
        $candidate->delete();
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
        $video_url = $request->video;

        // URL is for Embed or Not
        if(strpos($video_url, "/embed") !== false){
            $parts = explode('/', parse_url($video_url, PHP_URL_PATH));
            $url_id = end($parts);
        }else{
            preg_match('/\/([A-Za-z0-9_\-]{11})\?/', $video_url, $matches);
            $url_id = $matches[1];
        }
        $embeded = "https://youtube.com/embed/$url_id";
        $candidateUpdate = Candidate::where('event_id', $request->event_id)
        ->where('id', $id)->first();

        $candidateUpdate
            ->update([
                'user_id' => $request->user_id,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'video' => $embeded,
            ]);
        return response()->json($candidateUpdate, 200);
    }
}
