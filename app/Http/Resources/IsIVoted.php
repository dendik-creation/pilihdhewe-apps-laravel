<?php

namespace App\Http\Resources;

use App\Models\Candidate;
use Illuminate\Http\Resources\Json\JsonResource;

class IsIVoted extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $candidate = Candidate::where('id', $this->candidate_id)->first();
        return new CandidateList($candidate->loadMissing('user:id,name,kelas_id,gender,role,gambar'));
    }
}
