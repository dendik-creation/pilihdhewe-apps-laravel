<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventList;
use App\Http\Resources\SingleEvent;
use App\Models\Candidate;
use App\Models\Event;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::with('candidates')->latest()->get();
        return EventList::collection($events);
    }

    public function show($id){
        $event = Event::findOrFail($id);
        if($id){
            return new SingleEvent($event);
        }
    }

    public function latestEvent(){
        $event = Event::with('candidates')->latest()->first();
        return new SingleEvent($event);
    }

    public function store(Request $request){
        $today = Carbon::now();
        $isStatus = null;
        if($today->between($request->start_date, $request->end_date) || $today == $request->start_date){
            $isStatus = 'Active';
        }elseif($today->greaterThan($request->end_date)){
            $isStatus = 'Selesai';
        }else{
            $isStatus = 'Inactive';
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'candidates' => 'required',
        ]);
        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $isStatus,
        ]);

        foreach ($request->candidates as $candidate){
            $video_url = $candidate['video'];
            preg_match('/\/([A-Za-z0-9_\-]{11})\?/', $video_url, $matches);
            $url_id = $matches[1];
            $embeded = "https://youtube.com/embed/$url_id";
            Candidate::create([
                'user_id' => $candidate['user_id'],
                'event_id' => $event->id,
                'visi' => $candidate['visi'],
                'misi' => $candidate['misi'],
                'video' => $embeded,
            ]);
        }

        return response()->json([
            'message' => 'Berhasil Membuat Event Baru'
        ],200);
    }

    public function update($id, Request $request){
        try {
            $today = Carbon::now();
            $isStatus = null;
            if($today->between($request->start_date, $request->end_date) || $today == $request->start_date){
                $isStatus = 'Active';
            }elseif($today->greaterThan($request->end_date)){
                $isStatus = 'Selesai';
            }else{
                $isStatus = 'Inactive';
            }
            Event::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $isStatus,
            ]);

            return response()->json([
                'message' => 'Event Berhasil Diperbarui'
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => $e,
            ],405);
        }
    }

    public function destroy($id){
        $results = Result::where('event_id', $id)->delete();
        $candidates = Candidate::where('event_id', $id)->delete();
        $event = Event::where('id', $id)->delete();
        return response()->json([
            'message' => 'Event Berhasil Dihapus'
        ],200);
    }

    public function result($id){
        return view('event.show', compact('id'));
    }
}
