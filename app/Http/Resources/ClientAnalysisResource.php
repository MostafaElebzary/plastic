<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientAnalysisResource extends JsonResource
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
            'client_name' => $this->subscriber->name,
            'file' => $this->getFile(),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
