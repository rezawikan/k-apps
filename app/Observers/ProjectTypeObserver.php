<?php

namespace App\Observers;

use App\Models\ProjectType;
use App\Models\Logging;
use App\Traits\Logging\Logs;

class ProjectTypeObserver
{

  /**
   * Listen to the Project Type creating event.
   *
   * @param  ProjectType  $categories
   * @return void
   */
    public function saving(ProjectType $model)
    {
        $model->slug = str_slug($model->name);
    }
    /**
     * Listen to the Category creating event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function created(ProjectType $model)
    {
        $logs = Logs::createLog('Project Type', $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function updated(ProjectType $model)
    {
        $logs = Logs::updateLog('Project Type', $model->getOriginal('name'), $model->name, auth()->user()->email);
        Logging::create($logs);
    }

    /**
     * Listen to the Category deleting event.
     *
     * @param  Category  $categories
     * @return void
     */
    public function deleted(ProjectType $model)
    {
        $logs = Logs::deleteLog('Project Type', $model->name, auth()->user()->email);
        Logging::create($logs);
    }
}
