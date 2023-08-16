<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Resources\Json\JsonResource;

class myVoteProfile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $total_partisipan = User::where('role', 'siswa')->count();
        $excCandidate = $this->event->candidates->count();
        return [
            'id' => $this->id,
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'visi' => $this->visi,
            'misi' => $this->misi,
            'event' => [
                'id' => $this->event->id,
                'name' => $this->event->name,
                'description' => $this->event->description,
                'start_date' => date_format(date_create($this->event->start_date), 'd F Y'),
                'end_date' => date_format(date_create($this->event->end_date), 'd F Y'),
                'status' => $this->event->status,
                'total_partisipan' => $total_partisipan - $excCandidate,
            ],
            'my_total_vote' => Result::where('event_id', $this->event->id)->where('candidate_id', $this->id)->count()
        ];
    }
}
