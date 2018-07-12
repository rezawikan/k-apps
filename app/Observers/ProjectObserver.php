<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Logging;
use App\Traits\Logging\Logs;

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
        $logs = Logs::createLog('Project', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(Project $model)
    {
        $logs = Logs::updateLog('Project', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(Project $model)
    {
        $logs = Logs::deleteLog('Project', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
