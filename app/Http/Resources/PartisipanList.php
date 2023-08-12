<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PartisipanList extends JsonResource
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
            'id' => $this->user->id,
            'number_card' => $this->user->number_card,
            'name' => $this->user->name,
            'kelas' => $this->user->kelas,
            'gender' => $this->user->gender,
            'role' => $this->user->role,
        ];
    }
}
