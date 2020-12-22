<?php

namespace Angeloo\Me\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->when($this->email, $this->email),
            'name' => $this->when($this->name, $this->name),
            'email_verified_at' => $this->email_verified_at,
        ];
    }
}
