<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Log;
use App\Traits\Log\Logs;

class ProjectObserver
{

    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(Project $model)
    {
        $data = [
          'project name' => $model->project_name,
          'start date'   => $model->start_date,
          'country'      => $model->country,
          'price type'   => $model->price_type,
          'project type' => $model->project_type,
          'officer'      => $model->officer,
          'year'         => $model->year
        ];

        $logs = Logs::createLog('Project', $data, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Project $model)
    {
        $old = [
          'project name' => $model->getOriginal('project_name'),
          'start date'   => $model->getOriginal('start_date'),
          'country'      => $model->getOriginal('country'),
          'price type'   => $model->getOriginal('price_type'),
          'project type' => $model->getOriginal('project_type'),
          'officer'      => $model->getOriginal('officer'),
          'year'         => $model->getOriginal('year')
        ];

        $new = [
          'project name' => $model->project_name,
          'start date'   => $model->start_date,
          'country'      => $model->country,
          'price type'   => $model->price_type,
          'project type' => $model->project_type,
          'officer'      => $model->officer,
          'year'         => $model->year
        ];
        $diff_old = array_diff($old,$new); //before
        $diff_new = array_diff($new,$old); // new
        $logs = Logs::updateLog('Project', $diff_old, $diff_new, auth()->user()->email);
        Log::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Project $model)
    {
        $data = [
          'project name' => $model->project_name,
          'start date'   => $model->start_date,
          'country'      => $model->country,
          'price type'   => $model->price_type,
          'project type' => $model->project_type,
          'officer'      => $model->officer,
          'year'         => $model->year
        ];
        $logs = Logs::deleteLog('Project', $data, auth()->user()->email);
        Log::create($logs);
    }
}
