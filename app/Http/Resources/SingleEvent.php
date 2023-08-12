<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\Result;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleEvent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $partisipan_data = Result::where('event_id', $this->id)->get();
        $total_partisipan = User::where('role', 'siswa')->count();
        $excCandidate = $this->candidates->count();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => date_format(date_create($this->start_date), 'd F Y'),
            'end_date' => date_format(date_create($this->end_date), 'd F Y'),
            'status' => $this->status,
            'partisipan' => PartisipanList::collection($partisipan_data->loadMissing('user')),
            'total_partisipan' => $total_partisipan - $excCandidate,
            'candidates' => CandidateList::collection($this->candidates->loadMissing('user:id,number_card,name,role,gender,gambar,kelas_id')),
        ];
    }
}
