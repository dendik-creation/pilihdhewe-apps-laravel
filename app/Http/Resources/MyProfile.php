<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use App\Models\Result;
use Illuminate\Http\Resources\Json\JsonResource;

class MyProfile extends JsonResource
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
            'name' => $this->name,
            'number_card' => $this->number_card,
            'gambar' => $this->gambar,
            'kelas' => $this->kelas,
            'role' => $this->role,
            'gender' => $this->gender,
            'candidate_of' => myVoteProfile::collection(Candidate::where('user_id', $this->id)->get()),
        ];
    }
}
