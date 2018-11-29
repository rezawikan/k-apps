<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTechnologyEditResource extends JsonResource
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
          'technology' => [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->technology_types_id
          ],
          'project_id' => $this->pivot->project_id,
          'pivot_id' => $this->pivot->id,
          'distribution_target_id' => $this->pivot->distribution_target_id,
          'per_unit'  => $this->pivot->per_unit,
          'distribution_unit'  => $this->pivot->distribution_unit,
          'total_reach'  => $this->pivot->total_reach,
          'year'  => $this->pivot->year
        ];
    }
}
