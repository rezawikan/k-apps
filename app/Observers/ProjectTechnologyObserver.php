<?php

namespace App\Observers;

use App\Models\ProjectTechnology;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Log;
use App\Traits\Log\Logs;

class ProjectTechnologyObserver
{

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(ProjectTechnology $model)
    {
        $project     = Project::find($model->project_id);
        $technology  = Technology::find($model->technology_id);

        $data = [
          'project'             => $project->project_name,
          'technology'          => $technology->name,
          'distribution target' => $model->distribution_target,
          'distribution unit'   => $model->distribution_unit,
          'per unit'            => $model->per_unit,
          'total reach'         => $model->total_reach,
          'year'                => $model->year
        ];

        $logs = Logs::createLog('Project Technology', $data, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(ProjectTechnology $model)
    {
        $project_new     = Project::find($model->project_id);
        $technology_new  = Technology::find($model->technology_id);

        $project_old     = Project::find($model->getOriginal('project_id'));
        $technology_old  = Technology::find($model->getOriginal('technology_id'));

        $old = [
          'project'             => $project_old->project_name,
          'technology'          => $technology_old->name,
          'distribution target' => $model->getOriginal('distribution_target'),
          'distribution unit'   => $model->getOriginal('distribution_unit'),
          'per unit'            => $model->getOriginal('per_unit'),
          'total reach'         => $model->getOriginal('total_reach'),
          'year'                => $model->getOriginal('year'),
        ];

        $new = [
          'project'             => $project_new->project_name,
          'technology'          => $technology_new->name,
          'distribution target' => $model->distribution_target,
          'distribution unit'   => $model->distribution_unit,
          'per unit'            => $model->per_unit,
          'total reach'         => $model->total_reach,
          'year'                => $model->year
        ];
        $diff_old = array_diff($old, $new); //before
        $diff_new = array_diff($new, $old); // new
        $logs = Logs::updateLog('Project Technology', $diff_old, $diff_new, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(ProjectTechnology $model)
    {
        $project     = Project::find($model->project_id);
        $technology  = Technology::find($model->technology_id);

        $data = [
          'project'             => $project->project_name,
          'technology'          => $technology->name,
          'distribution target' => $model->distribution_target,
          'distribution unit'   => $model->distribution_unit,
          'per unit'            => $model->per_unit,
          'total reach'         => $model->total_reach,
          'year'                => $model->year
        ];
        $logs = Logs::deleteLog('Project Technology', $data, auth()->user()->email);
        Log::create($logs);
    }
}
