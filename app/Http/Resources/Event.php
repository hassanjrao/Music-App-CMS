<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $timeStart=$this->time_start ? date('h:i A',strtotime($this->time_start)) : null;
        $timeEnd=$this->time_end ? date('h:i A',strtotime($this->time_end)) : null;

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'image_url'=>$this->image_url,
            // date in this format: Sunday 1st Aug, 2021, first convert the string to date and then format it
            'date'=>$this->date ? date('l jS M, Y',strtotime($this->date)) : null,
            // time in this format: 12:00 PM
            'time_start'=>$timeStart,
            'time_end'=>$timeEnd,
            'time'=>$timeStart.' - '.$timeEnd,
            'venue'=>$this->venue,
            'location'=>$this->location,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
