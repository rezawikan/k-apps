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
        $logs = Logs::createLog('Project', $model->project_name, auth()->user()->email);
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
        $logs = Logs::updateLog('Project', $model->getOriginal('project_name'), $model->project_name, auth()->user()->email);
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
        $logs = Logs::deleteLog('Project', $model->project_name, auth()->user()->email);
        Log::create($logs);
    }
}
