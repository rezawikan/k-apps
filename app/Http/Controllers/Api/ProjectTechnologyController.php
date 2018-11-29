<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Resources\Api\ProjectTechnologyEditResource;
use App\Http\Requests\ProjectTechnologyRequest;

class ProjectTechnologyController extends Controller
{
    public function store(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $result = $project->technologies()->attach([
                  $request->technology_id => $request->only([
                    'distribution_target_id',
                    'per_unit',
                    'distribution_unit',
                    'total_reach',
                    'year'
                  ])
                ]);

        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idp, $idt)
    {
        $project    = Project::findOrFail($idp);

        $technology = $project->technologies()->wherePivot('technology_id', $idt)->get();
        return ProjectTechnologyEditResource::collection($technology);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idp, $idt)
    {
        $project  = Project::findOrFail($idp);
        $project->technologies()->updateExistingPivot(
            $idt,
            $request->only([
            'distribution_target_id',
            'per_unit',
            'distribution_unit',
            'total_reach',
            'year'
          ])
        );

        $result = $project->fresh()->technologies()->wherePivot('technology_id', $idt)->get();
        return ProjectTechnologyEditResource::collection($result);
    }
}
