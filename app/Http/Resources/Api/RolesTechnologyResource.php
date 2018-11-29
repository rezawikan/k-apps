<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RolesTechnologyResource extends JsonResource
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
          'technology_type_id' => $this->technology_type_id,
          'distribution_target_id' => $this->distribution_target_id,
          'multiplier' => $this->multiplier
        ];
    }
}
