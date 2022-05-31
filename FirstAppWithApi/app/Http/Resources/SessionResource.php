<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'start_time' => $this->start_time,
            'start_date' => $this->start_date,
            'session_type' => $this->session_type,
            'u_id'  => $this->u_id,
            'is_ended'  => $this->is_ended,
            'sess_token'  => $this->sess_token,
            'video_link'  => $this->video_link,
            'total_number'  => $this->total_number,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
