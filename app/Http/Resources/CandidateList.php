<?php

namespace App\Http\Resources;

use App\Models\Result;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'event_id' => $this->event_id,
            'user' => $this->user->loadMissing('kelas'),
            'visi' => $this->visi,
            'misi' => $this->misi,
            'total_vote' => Result::where('candidate_id', $this->id)->where('event_id', $this->event_id)->count(),
        ];
    }
}
