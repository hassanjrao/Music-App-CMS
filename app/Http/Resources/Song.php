<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Song extends JsonResource
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
            'id' => (string)$this->id,
            'song_url' => $this->streaming_url,
            'title' => $this->title,
            'cover_image' => $this->artwork_url,
            'dj' => $this->relationLoaded('dj') ? $this->dj : null,
            'published_at' => $this->published_at,
        ];
    }
}
